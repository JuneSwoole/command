<?php
/*
 * @Author: juneChen && juneswoole@163.com
 * @Date: 2023-07-09 11:41:56
 * @LastEditors: juneChen && juneswoole@163.com
 * @LastEditTime: 2023-07-09 21:34:35
 * @Description: Stop JuneSwoole Command
 * 
 */

namespace JuneSwoole\Command\Directive;

use JuneSwoole\Component\Singleton;
use JuneSwoole\Command\CommandInterface;

class Stop implements CommandInterface
{
    use Singleton;

    public function name(): string
    {
        return 'Stop';
    }

    public function exec(array $args): ?string
    {
        return 'exec Stop';
    }

    public function help(array $args): ?string
    {
        return 'stop JuneSwoole';
    }
}
