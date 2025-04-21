<?php

namespace SmtpExpress\Mail;

class TemplateMail
{
    protected string $subject;
    protected array $template = [];
    protected array $sender = [];
    protected array $recipients = [];

    public function subject(string $subject): self
    {
        $this->subject = $subject;
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

    public function toArray(): array
    {
        return [
            'subject' => $this->subject,
            'template' => $this->template,
            'sender' => $this->sender,
            'recipients' => $this->recipients,
        ];
    }
}