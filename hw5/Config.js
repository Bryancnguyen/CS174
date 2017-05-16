var config = {
    check_in_frequency: 5,
    notify_delay: 5,
    email_job_frequency: 3000,
    host: '',
    port: '',
    service: 'gmail', //configured with gmail
    secure: false, // whether to use TLS
    auth: {
        user: '', //added only gmail
        pass: ''
    },
    "SECRET_KEY": "",
    "PUBLISHABLE_KEY": "",
    "CHARGE_URL": "https://api.stripe.com/v1/charges",
    "CHARGE_CURRENCY": "usd",
    "CHARGE_DESCRIPTION": "Not Dead Yet",
    "CHARGE_USERAGENT": "CreditCardTester",
    "TIMEOUT": 20,
    dbuser: '',  //SQL CONFIGS
    dbhost: '',
    dbpassword: ''
}

module.exports = config;