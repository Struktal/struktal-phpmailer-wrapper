# Struktal-PHPMailer-Wrapper

This is a PHP wrapper library to extract common settings for a [PHPMailer](https://github.com/PHPMailer/PHPMailer) object instance

## Installation

To install this library, include it in your project using Composer:

```bash
composer require struktal/struktal-phpmailer-wrapper
```

## Usage

Before you can use this library, you need to customize a few parameters.
You can do this in the startup of your application:

```php
\struktal\MailWrapper\MailWrapper::setSetupFunction(function(\struktal\MailWrapper\MailWrapper $mailer) {
    // Set up the mailer instance here
});
```

Furthermore, you can specify to redirect all mails to a specific address instead of the real recipients for testing purposes:

```php
\struktal\MailWrapper\MailWrapper::setRedirectAllMails(
    true,
    "email@domain.com" // The email address to redirect all mails to
);
```

Then, you can instantiate an instance of the `MailWrapper` class and use it just like a regular `PHPMailer` object for sending mails.

## Dependencies

- **PHPMailer** - GitHub: [PHPMailer/PHPMailer](https://github.com/PHPMailer/PHPMailer), licensed under [LGPL-2.1 license](https://github.com/PHPMailer/PHPMailer/blob/master/LICENSE)

## License

This software is licensed under the LGPL-2.1 license.
See the [LICENSE](LICENSE) file for more information.
