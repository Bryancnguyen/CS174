var mysql = require('mysql')
var config = require('./Config.js');

var connection = mysql.createConnection({
    host: config.dbhost,
    user: config.dbuser,
    password: config.dbpassword
});

connection.connect();

connection.query('DROP DATABASE IF EXISTS CS174',
    function (error, results, fields) {
        if (error) throw error;
    }
);

connection.query('CREATE DATABASE CS174',
    function (error, results, fields) {
        if (error) throw error;
    }
);

connection.query('USE CS174', function (error, results, fields) {
    if (error) throw error;
});

connection.query('CREATE TABLE IF NOT EXISTS `USER`(`ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `EMAIL` VARCHAR(40), `LAST_CHECK_IN` BIGINT DEFAULT 0, `LAST_EMAIL_SENT` BIGINT DEFAULT 0, `NOTIFY_LIST` VARCHAR(255),`MESSAGE` VARCHAR(255))',
    function (error, results, fields) {
        if (error) throw error;
    }
);

connection.end(function (err) {
});

console.log("Database Created!");

module.exports = connection;