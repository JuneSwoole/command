<?php
/*
 * @Author: juneChen && juneswoole@163.com
 * @Date: 2023-07-09 11:41:56
 * @LastEditors: juneChen && juneswoole@163.com
 * @LastEditTime: 2023-07-10 23:21:21
 * @Description: Help Command
 * 
 */

namespace JuneSwoole\Command\Directive;

use JuneSwoole\Component\Singleton;
use JuneSwoole\Command\CommandInterface;
use JuneSwoole\Command\Container;

class Help implements CommandInterface
{
    use Singleton;

    public function name(): string
    {
        return 'Help';
    }

    public function exec(array $args): ?string
    {
        $command = array_shift($args);
        if (empty($command)) {
            return $this->help($args);
        }
        return Container::getInstance()->get($command)->help($args);
    }

    public function help(array $args): ?string
    {
        $commands = implode(PHP_EOL, Container::getInstance()->getCommandKeys());
        return <<<HELP
\e[30m  welcome to use JuneSwoole! \e[0m
Usage: php juneswoole [command] [arg]
Get help : php easyswoole or php easyswoole help [command]
commands: 
{$commands}
HELP;
    }
}
