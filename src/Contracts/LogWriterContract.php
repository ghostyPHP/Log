<?php

namespace Anvil\Log\Contracts;

interface LogWriterContract
{
    public function write(string|\Stringable $message): void;

    public function withLevel($level): LogWriterContract;

    public function withContext(array $context): LogWriterContract;
}
