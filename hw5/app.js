var express = require('express');
var app = express();
var path = require('path');
var email = require('./email.js');
var config = require('./Config');
var stripe = require('stripe')(config.SECRET_KEY);
var bodyParser = require('body-parser');
var pug = require('pug');
var user = '';

stripe.setTimeout(20000);

app.set('view engine', 'pug')

app.use(bodyParser.json({ limit: '50mb' }));

app.use(express.static(path.join(__dirname, 'public')));

app.get('/', function (req, res) {
  res.render('landingpage.pug');
});

app.use((req, res, next) => {
  res.status = req.status;
  next();
});

app.post('/sent', function (req, res) {
  var customer = req.body;
  stripe.customers.create({
    email: req.body.formData.email
  }).then(function (customer) {
    return stripe.customers.createSource(customer.id, {
      source: {
        object: 'card',
        exp_month: req.body.formData.expiry_month,
        exp_year: req.body.formData.expiry_year,
        number: req.body.formData.creditcard,
        cvc: req.body.formData.cvc
      }
    });
  }).then(function (source) {
    return stripe.charges.create({
      amount: req.body.formData.cost,
      currency: 'usd',
      customer: source.customer
    });
  }).then(function (charge) {
    res.send(charge);
    email.sendInitialEmail(req.body.formData);
    setInterval(function () {
      email.emailJob();
    }, config.email_job_frequency);
  }).catch(function (err) {
    res.send(JSON.stringify(err));
  });
});

app.post('/checked', function (req, res) {
  var checkedinUser = req.body;
  var checkinPromise = email.checkinUser(req.body.formData).then(function () {
    res.render('checkin.pug');
  });
});

app.get('/checkin*', function (req, res) {
  user = req.query.user;
  res.render('checkin.pug');
});

app.get('/db', function (req, res) {
  email.getUser(user).then(function (results) {
    res.json(results);
  });
});


app.listen(3000, function () {
  console.log('Example app listening on port 3000!')
});

