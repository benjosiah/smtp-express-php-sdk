<?php

namespace SmtpExpress;

use GuzzleHttp\Exception\GuzzleException;
use SmtpExpress\Actions\SendEmail;
use SmtpExpress\Mail\SendMail;
use SmtpExpress\Mail\TemplateMail;
use SmtpExpress\Exception\SmtpExpressException;

class SMTPExpress
{
    protected HttpClient $client;

    public function __construct(string $apiKey)
    {
        $this->client = new HttpClient($apiKey);
    }

    /**
     * @throws GuzzleException
     * @throws SmtpExpressException
     */
    public function sendEmail(SendMail $email): array
    {
        return (new SendEmail($this->client))->execute($email);
    }

}