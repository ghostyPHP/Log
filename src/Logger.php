<?php

namespace Anvil\Log;

use Anvil\Log\Contracts\LogWriterContract;
use Ghosty\Container\Contracts\ContainerContract;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;
use Stringable;

class Logger extends AbstractLogger implements LoggerInterface
{
    public function __construct(private LogWriterContract $logWriter)
    {
    }

    public function log($level, string|Stringable $message, array $context = []): void
    {
        $this->logWriter->withLevel($level)->withContext($context)->write($message);
    }
}
