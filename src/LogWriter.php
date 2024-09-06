<?php

namespace Anvil\Log;

use Anvil\Log\Contracts\LogFormatterContract;
use Anvil\Log\Contracts\LogWriterContract;

class LogWriter implements LogWriterContract
{
    private $level = '';

    private array $context = [];

    public function __construct(private LogFormatterContract $logFormatter, private string $handler)
    {
    }

    public function write(string|\Stringable $message): void
    {
        file_put_contents($this->handler, $this->logFormatter->format($message, $this->level, $this->context));
    }

    public function withLevel($level): LogWriterContract
    {
        $this->level = $level;
        return $this;
    }

    public function withContext(array $context): LogWriterContract
    {
        $this->context = $context;
        return $this;
    }
}
