<?php
/*
 * @Author: juneChen && juneswoole@163.com
 * @Date: 2023-07-09 11:41:56
 * @LastEditors: juneChen && juneswoole@163.com
 * @LastEditTime: 2023-07-09 21:21:51
 * @Description: Start JuneSwoole Command
 * 
 */

namespace JuneSwoole\Command\Directive;

use JuneSwoole\Component\Singleton;
use JuneSwoole\Command\CommandInterface;

class Start implements CommandInterface
{
    use Singleton;

    public function name(): string
    {
        return 'Start';
    }

    public function exec(array $args): ?string
    {
        return 'exec Start';
    }

    public function help(array $args): ?string
    {
        return 'start JuneSwoole';
    }
}
