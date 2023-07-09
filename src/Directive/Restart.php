<?php
/*
 * @Author: juneChen && juneswoole@163.com
 * @Date: 2023-07-09 11:41:56
 * @LastEditors: juneChen && juneswoole@163.com
 * @LastEditTime: 2023-07-09 21:35:15
 * @Description: Restart JuneSwoole Command
 * 
 */

namespace JuneSwoole\Command\Directive;

use JuneSwoole\Component\Singleton;
use JuneSwoole\Command\CommandInterface;

class Restart implements CommandInterface
{
    use Singleton;

    public function name(): string
    {
        return 'Restart';
    }

    public function exec(array $args): ?string
    {
        return 'exec Restart';
    }

    public function help(array $args): ?string
    {
        return 'restart JuneSwoole';
    }
}
