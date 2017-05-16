var config = require('./Config');
var nodemailer = require('nodemailer');
var mysql = require('mysql');

var connection = mysql.createConnection({
    host: config.dbhost,
    user: config.dbuser,
    password: config.dbpassword
});

var transporter = nodemailer.createTransport({
    host: config.host,
    port: config.post,
    secure: config.secure, // whether to use TLS
    service: config.service,
    auth: {
        user: config.auth.user,
        pass: config.auth.pass
    }
});

var email_options = {
    checkin_options: {
        from: 'Not Dead Yet Team', // sender address
        to: '<Change to person who needs to checkin>', // list of receivers
        subject: 'Not-Dead-Yet...Time to Check-in!', // Subject line
        text: 'Dear some_user@somewhere.com: Please click the link below or copy it into your browser to check-in with us and update your notify list. check_in_url Best regards, Not-Dead-Yet Team', // plain text body
        html: '<p>Dear some_user@somewhere.com: Please click the link below or copy it into your browser to check-in with us and update your notify list. </br> check_in_url </br> Best regards, Not-Dead-Yet Team </p>' // html body
    },
    notify_options: {
        from: '<Change To Person that handles the dead>', // sender address
        to: '<Change To List of Recievers based on query>', // list of receivers
        subject: 'Notify Let-Know', // Subject line
        text: 'Dear to_notify_person@notify-place.com: some_user@somewhere.com has not checked-in with us during their check-in period. We are sending you the message below that was requested to be sent by some_user@somewhere.com if this happened. ...Message that some_user@somewhere.com left...', // plain text body
        html: '<p>Dear to_notify_person@notify-place.com: some_user@somewhere.com has not checked-in with us during their check-in period. We are sending you the message below that was requested to be sent by some_user@somewhere.com if this happened. ...Message that some_user@somewhere.com left...</p>' // html body    
    }
}

var loggedinUser = {};


var emailJob = function () {

    connection.query('USE CS174', function (error, results, fields) {
        if (error) throw error;
    });

    var time = parseInt(Date.now(), 10);
    var dateEscape = connection.escape(time);
    var checkinEscape = connection.escape(parseInt(config.check_in_frequency, 10));
    var notifyDelay = connection.escape(parseInt(config.notify_delay, 10));

    //m
    connection.query('SELECT * FROM USER WHERE LAST_CHECK_IN < LAST_EMAIL_SENT AND ' + dateEscape + ' - LAST_EMAIL_SENT > ' + notifyDelay,
        function (error, results, fields) {
            if (error) throw error;
            if (results[0] != void 0) {
                var users_email = results[0].EMAIL;
                if (results[0].NOTIFY_LIST != null) {
                    var notify_list = results[0].NOTIFY_LIST.trim().split(',');
                    var message = results[0].MESSAGE;
                    email_options.notify_options.from = users_email;
                    notify_list.forEach(function (email) {
                        email_options.notify_options.to = email;
                        email_options.notify_options.text = 'Dear ' + email + ': ' + users_email + ' has not checked-in with us during their check-in period. We are sending you the message below that was requested to be sent by ' + users_email + ' if this happened. ' + message + 'Best regards, Not-Dead-Yet Team';
                        email_options.notify_options.html = '<p>Dear ' + email + ': ' + users_email + ' has not checked-in with us during their check-in period. We are sending you the message below that was requested to be sent by ' + users_email + ' if this happened. ' + message + 'Best regards, Not-Dead-Yet Team</p>';
                        transporter.sendMail(email_options.notify_options, function (error, info) {
                            if (error) {
                                return console.log(error);
                            }
                            console.log('Message Sent. Id: %s Res: %s', info.messageId, info.response);
                        });
                    });
                    console.log('Sending email to people to notify you are dead');
                }
            }
        }
    );

    //n
    connection.query('SELECT * FROM USER WHERE LAST_EMAIL_SENT < LAST_CHECK_IN AND ' + dateEscape + ' - LAST_CHECK_IN > ' + checkinEscape,
        function (error, results, fields) {
            if (error) throw error;
            if (results[0] != void 0) {
                var users_email = results[0].EMAIL;
                email_options.checkin_options.to = users_email;
                var escapeUserEmail = connection.escape(users_email);
                console.log(users_email);
                var time = parseInt(Date.now(), 10);
                var dateEscape = connection.escape(time);
                email_options.checkin_options.text = 'Dear ' + users_email + ': Please click the link below or copy it into your browser to check-in with us and update your notify list. check_in_url Best regards, Not-Dead-Yet Team';
                email_options.checkin_options.html = '<p>Dear ' + users_email + ': Please click the link below or copy it into your browser to check-in with us and update your notify list. </br> check_in_url </br> Best regards, Not-Dead-Yet Team </p>';
                connection.query('UPDATE USER SET LAST_EMAIL_SENT= ' + dateEscape + ' WHERE EMAIL=' + escapeUserEmail, function (error, results, fields) {
                    if (error) throw error;
                    console.log('Inserted last email sent for user');
                });
                transporter.sendMail(email_options.checkin_options, function (error, info) {
                    if (error) {
                        return console.log(error);
                    }
                    console.log('Message Sent. Id: %s Res: %s', info.messageId, info.response);
                });
                console.log('Sending emails to people so that they will check in');
            }
        }
    );
}

var sendInitialEmail = function (user) {

    connection.query('USE CS174', function (error, results, fields) {
        if (error) throw error;
    });

    var escapeUser = connection.escape(user.email);

    connection.query('INSERT INTO `USER`(`EMAIL`) VALUES (' + escapeUser + ')',
        function (error, results, fields) {
            if (error) throw error;
            console.log('USER ADDED TO DB');
        }
    )

    connection.query('SELECT * FROM USER WHERE LAST_CHECK_IN = 0 AND LAST_EMAIL_SENT = 0;',
        function (error, results, fields) {
            if (error) throw error;
            var users_email = results[0].EMAIL;
            email_options.checkin_options.to = users_email;
            var checkinURL = '/checkin?user=' + users_email;
            var lastEmailTimeEscape = parseInt(Date.now(), 10);
            var lastEmailEscape = connection.escape(lastEmailTimeEscape);
            email_options.checkin_options.text = 'Dear ' + users_email + ': Please click the link below or copy it into your browser to check-in with us and update your notify list.' + checkinURL + ' Best regards, Not-Dead-Yet Team';
            email_options.checkin_options.html = '<p>Dear ' + users_email + ': Please click the link below or copy it into your browser to check-in with us and update your notify list. </br>' + checkinURL + '</br> Best regards, Not-Dead-Yet Team </p>';
            transporter.sendMail(email_options.checkin_options, function (error, info) {
                if (error) {
                    return console.log(error);
                }
                console.log('Message Sent. Id: %s Res: %s', info.messageId, info.response);
            });
            console.log('Send initial checkin email');
        }
    );
}

var getUser = function (user) {
    return new Promise(function (resolve, reject) {
        connection.query('USE CS174', function (error, results, fields) {
            if (error) throw error;
        });
        connection.query('SELECT EMAIL, LAST_EMAIL_SENT, LAST_CHECK_IN, NOTIFY_LIST, MESSAGE FROM USER WHERE EMAIL= \'' + user.toString() + '\'', function (error, results, fields) {
            if (error) throw error;
            resolve(results[0]);
            console.log('getting user from DB');
        });
    });
}

var checkinUser = function (user) {
    return new Promise(function (resolve, reject) {
        var escapeCheckinEmail = user.currentEmail;
        var escapeletKnowList = user.letKnowList;
        var escapeMessage = user.message;
        var time = parseInt(Date.now(), 10);
        var dateEscape = connection.escape(time);
        connection.query('USE CS174', function (error, results, fields) {
            if (error) throw error;
        });
        connection.query('UPDATE USER SET LAST_CHECK_IN=' + dateEscape + ',NOTIFY_LIST=' + '\'' + escapeletKnowList + '\'' + ',MESSAGE=' + '\'' + escapeMessage + '\'' + 'WHERE EMAIL=' + '\'' + escapeCheckinEmail + '\'', function (error, results, fields) {
            if (error) throw error;
            resolve(results);
            console.log('Checking in user');
        });
    });
}

module.exports = { emailJob, getUser, loggedinUser, checkinUser, sendInitialEmail }

