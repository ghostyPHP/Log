<?php

namespace Anvil\Log;

use Anvil\Log\Contracts\LogFormatterContract;
use Anvil\Log\Contracts\LogWriterContract;
use Ghosty\Container\Binding;
use Ghosty\Container\Contracts\ContainerContract;

class LoggerFactory
{
    public function __construct(private ContainerContract $container, private string $handler)
    {
        $this->container->bind(LogFormatterContract::class, new Binding(LogFormatter::class));
        $this->container->bind(LogWriterContract::class, (new Binding(LogWriter::class))->withArgs(['handler' => $this->handler]));
    }

    public function create(): Logger
    {
        return $this->container->make(Logger::class);
    }
}
