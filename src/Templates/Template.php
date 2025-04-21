<?php

namespace SmtpExpress\Templates;

class Template
{
    protected string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }

}