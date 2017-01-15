# Smtp Mailer

Magento 2.x CE module for utilizing custom SMTP server to send transactional and bulk emails.

## Features

1. Proper support for multistore mode.

2. Separate configuration settings for bulk emails.

## Installation Instructions

1. Use composer to download the module:

   ```
   composer require mageware/magento2-smtp-mailer
   ```

2. Enable downloaded module:

   ```
   php bin/magento module:enable MageWare_Common MageWare_SmtpMailer
   ```

3. Upgrade your database:

   ```
   php bin/magento setup:upgrade
   ```
