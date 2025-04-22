# SMTP Express PHP SDK


The **SMTP Express PHP SDK** provides a simple, extensible way to send emails using the [SMTP Express](https://smtpexpress.com) API from any PHP application.

> 🚀 Lightweight, flexible, and built with Guzzle for efficient HTTP communication.

---

## ✨ Features

- Send standard HTML emails: You can compose and send emails with HTML content to make them visually appealing.
- Send emails using templates with dynamic variables: This feature lets you create reusable email templates where specific parts of the email can be customized with different information each time you send it. For example, you can personalize greetings or include order details.
- Add calendar event invites: You can easily include calendar invites directly within your emails, making it convenient for recipients to add events to their calendars.
- Built-in support for sender and recipient metadata: The SDK helps manage information about who is sending the email and who is receiving it.
- PSR-4 autoloading: This is a technical detail that ensures the SDK's components are automatically loaded when needed in your PHP project, making it easier to use.

---

## 📦 Installation

To start using the SMTP Express PHP SDK in your project, you need to install it using Composer, a common dependency management tool for PHP. Open your project's terminal and run the following command:

```bash
composer require benjosiah/smtp-express-php
```

## 🔧 Configuration
Before you can send emails, you need to configure the SDK with your SMTP Express project secret. This secret authenticates your application with the SMTP Express API. In your PHP code, you'll need to include the autoloader (which was set up during installation) and then create an instance of the SmtpExpress class, providing your project secret:

```php

use SmtpExpress\SmtpExpress;
require 'vendor/autoload.php';

$smtp = new SmtpExpress('your-project-secret');

```
Make sure to replace 'your-project-secret' with the actual secret key from your SMTP Express account.

## 🚀 Usage

```php

```

### 1. 📄 Send Plain Text or HTML Message
You can create a new SendMail object, set the subject, the email content (which can be plain text or HTML), the sender's email and name, and the recipient's email and name. 
Then, use the $smtp->sendEmail() method to send the email

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
If you have custom HTML templates for your emails, you can load these templates, replace placeholders (like {{ name }}) with actual data, and then send the resulting HTML as the email body. In this example, the email.html file would contain your HTML template with placeholders like {{ name }}.

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
If you are using templates stored directly within your SMTP Express account, you can refer to them by their ID and provide the necessary data for the dynamic parts of the template.
 
Replace 'template-id' with the actual ID of your SMTP Express template.
 
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
To send an email with a calendar event invite, you can use the calendarEvent() method, providing the event title, start time, and end time.
The date and time should be provided in ISO 8601 format (e.g., YYYY-MM-DDTHH:MM:SS.SSSZ).

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
The SDK provides a SmtpExpressException that you can catch to manage these situations.

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
The SMTP Express PHP SDK is released under the MIT license © Josiah

## 💬 Feedback or Support?
Email benjosiah90@gmail.com



