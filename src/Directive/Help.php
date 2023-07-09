<?php
/*
 * @Author: juneChen && juneswoole@163.com
 * @Date: 2023-07-09 11:41:56
 * @LastEditors: juneChen && juneswoole@163.com
 * @LastEditTime: 2023-07-09 21:46:51
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
        return Container::getInstance()->get($command)->help();
    }

    public function help(array $args): ?string
    {
        return '';
    }
}
