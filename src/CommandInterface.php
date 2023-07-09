<?php

namespace JuneSwoole\Command;


interface CommandInterface
{
    /**
     * 命令名称
     *
     * @return string
     * @author juneChen <juneswoole@163.com>
     */
    public function name(): string;
    /**
     * 运行命令
     *
     * @param array $args
     * @return string|null
     * @author juneChen <juneswoole@163.com>
     */
    public function run(array $args): ?string;
    /**
     * 命令帮助
     *
     * @param array $args
     * @return string|null
     * @author juneChen <juneswoole@163.com>
     */
    public function help(array $args): ?string;
}
