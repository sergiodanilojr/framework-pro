<?php

namespace Framework\Http;

class Response implements ResponseInterface
{
    
    public function __construct(
        protected ?string $content = '',
        protected int $status = 200,
        protected array $headers = [],
    ) {
        http_response_code($status);
    }

    public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }

    public function send()
    {
        echo $this->content;
    }
}
