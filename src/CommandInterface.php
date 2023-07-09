<?php

namespace JuneSwoole\Command;

interface CommandInterface
{

    public function name(): string;

    public function exec(array $args): ?string;

    public function help(array $args): ?string;
}
