<?php

namespace SmtpExpress\Mail;

class SendMail
{
    protected string $subject;
    protected ?string $message = null;
    protected ?array $template = null;
    protected array $sender = [];
    protected array $recipients = [];
    protected ?array $calendarEvent = null;

    public function subject(string $subject): self
    {
        $this->subject = $subject;
        return $this;
    }

    public function message(string $html): self
    {
        $this->message = $html;
        return $this;
    }

    public function template(string $id, array $variables = []): self
    {
        $this->template = [
            'id' => $id,
            'variables' => $variables,
        ];
        return $this;
    }

    public function sender(string $email, string $name = ''): self
    {
        $this->sender = [
            'email' => $email,
            'name' => $name,
        ];
        return $this;
    }

    public function recipients(string $email, string $name = ''): self
    {
        $this->recipients = [
            'email' => $email,
            'name' => $name,
        ];
        return $this;
    }

    public function calendarEvent(string $title, string $startDate, string $endDate): self
    {
        $this->calendarEvent = [
            'title' => $title,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ];
        return $this;
    }

    public function toArray(): array
    {
        $payload = [
            'subject' => $this->subject,
            'sender' => $this->sender,
            'recipients' => $this->recipients,
        ];

        if ($this->message) {
            $payload['message'] = $this->message;
        }

        if ($this->template) {
            $payload['template'] = $this->template;
        }

        if ($this->calendarEvent) {
            $payload['calendarEvent'] = $this->calendarEvent;
        }

        return $payload;
    }
}
