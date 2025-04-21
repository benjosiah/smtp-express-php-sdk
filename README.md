# SMTP Express PHP SDK


The **SMTP Express PHP SDK** provides a simple, extensible way to send emails using the [SMTP Express](https://smtpexpress.com) API from any PHP application.

> 🚀 Lightweight, flexible, and built with Guzzle for efficient HTTP communication.

---

## ✨ Features

- Send standard HTML emails
- Send emails using templates with dynamic variables
- Add calendar event invites
- Built-in support for sender and recipient metadata
- PSR-4 autoloading

---

## 📦 Installation

Install via Composer:

```bash
composer require benjosiah/smtp-express-php
```

## 🔧 Configuration

```php

use SmtpExpress\SmtpExpress;
require 'vendor/autoload.php';

$smtp = new SmtpExpress('your-project-secret');

```

## 🚀 Usage

```php

```

### 1. 📄 Send Plain Text or HTML Message

```php
use SmtpExpress\Mail\SendMail;

$email = (new SendMail())
    ->subject('Welcome To Express')
    ->message('<h1>Hello from SMTP Express</h1><p>Enjoy fast email delivery!</p>')
    ->sender('josiah@smtpexpress.email', 'SMTP SERVER')
    ->recipients('recipient@example.com', 'Ben Josiah');

$response = $smtp->sendEmail($email);

```

### 2. 🧩 Send Custom HTML Template

```html

<!-- email.html -->
<h1>Welcome, {{ name }}!</h1>
<p>We're excited to have you at {{ company }}.</p>
<p>Click <a href="{{ url }}">here</a> to reset your password.</p>

```

```php

use SmtpExpress\Mail\SendMail;
use SmtpExpress\Templates\Template;
use SmtpExpress\Templates\TemplateRenderer;

// Load HTML template
$template = new Template(file_get_contents('email.html'));

// Render with variables
$renderer = new TemplateRenderer();
$html = $renderer->render($template, [
    'name' => 'Josiah',
    'company' => 'SMTPExpress Inc.',
    'url' => 'https://yourapp.com/reset-password'
]);

// Build email
$email = (new SendMail())
    ->subject('Welcome To Express')
    ->message($html)
    ->sender('josiah@smtpexpress.email', 'SMTP SERVER')
    ->recipients('recipient@example.com', 'Ben Josiah');

$response = $smtp->sendEmail($email);

```


### 3. 🧠 Send SMTP Express Template

```php

use SmtpExpress\Mail\SendMail;

$templateEmail = (new SendMail())
    ->subject('A Template message from the express')
    ->template('template-id', [
        'name' => 'Josiah',
        'company' => 'SMTP Express',
        'url'=> 'https://yourapp.com/reset-password'
    ])
    ->sender('josiah@smtpexpress.email', 'SMTP SERVER')
    ->recipients('recipient@example.com', 'Ben Josiah');

$response = $smtp->sendEmail($templateEmail);

```


### 4. 📅 Send Calendar Event Email

```php

use SmtpExpress\Mail\SendMail;

$calendarEmail = (new SendMail())
    ->subject('Strategy Sync-up')
    ->message('<p>Let’s meet to discuss our project roadmap.</p>')
    ->sender('josiah@smtpexpress.email', 'SMTP SERVER')
    ->recipients('recipient@example.com', 'Ben Josiah')
    ->calendarEvent(
        'Strategy Sync-up',
        '2024-01-18T23:00:00.000Z',
        '2024-01-19T23:00:00.000Z'
    );

$response = $smtp->sendEmail($calendarEmail);

```

## ❗ Error Handling

```php
use SmtpExpress\Exception\SmtpExpressException;

try {
    $smtp->sendEmail($email);
} catch (SmtpExpressException $e) {
    echo 'Failed to send: ' . $e->getMessage();
}

```

## 📁 Project Structure

```
.
├── src/
│   ├── Mail/
│   │   └── SendMail.php
│   ├── Templates/
│   │   ├── Template.php
│   │   └── TemplateRenderer.php
│   ├── Exception/
│   │   └── SmtpExpressException.php
│   └── SmtpExpress.php


```

## 📝 License
MIT © Josiah

## 💬 Feedback or Support?
Email benjosiah90@gmail.com



