<?php

namespace Anvil\Log\Contracts;

use Anvil\Log\Level;

interface LogFormatterContract
{
    public function format(string|\Stringable $string, $level, array $context): string;
}
