<?php

namespace SmtpExpress\Templates;

use SmtpExpress\Exception\SmtpExpressException;

class TemplateRenderer
{
    /**
     * @throws SmtpExpressException
     */
    public function render(Template $template, array $data): string
    {
        $rendered = $template->getContent();

        foreach ($data as $key => $value) {
            $rendered = str_replace('{{ ' . $key . ' }}', $value, $rendered);
            $rendered = str_replace('{{'.$key.'}}', $value, $rendered);
        }

        // Optional: detect unplaced placeholders and throw warning
        if (preg_match('/{{\s*[\w\.]+\s*}}/', $rendered)) {
            throw new SmtpExpressException("Some template variables were not replaced.");
        }

        return $rendered;
    }
}