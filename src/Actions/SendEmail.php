<?php

namespace SmtpExpress\Actions;

use GuzzleHttp\Exception\GuzzleException;
use SmtpExpress\Mail\SendMail;
use SmtpExpress\Mail\TemplateMail;
use SmtpExpress\Exception\SmtpExpressException;
use SmtpExpress\HttpClient;

class SendEmail
{
    protected HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * @throws GuzzleException
     * @throws SmtpExpressException
     */
    public function execute(SendMail $message): array
    {
        return $this->client->post('send', $message->toArray());
    }

}