<?php

namespace Anvil\Log;

use Anvil\Log\Contracts\LogFormatterContract;

class LogFormatter implements LogFormatterContract
{
    public function format(string|\Stringable $message, $level, array $context): string
    {
        return
            '[' . date('d-m-y H:i:s', time()) . ']' .
            '(' . strtoupper($level) . '):' . ' ' .
            $message . ' ' .
            json_encode($context) . "\n";
    }
}
