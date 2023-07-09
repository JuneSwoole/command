<?php
/*
 * @Author: juneChen && juneswoole@163.com
 * @Date: 2023-07-09 11:41:56
 * @LastEditors: juneChen && juneswoole@163.com
 * @LastEditTime: 2023-07-09 21:54:53
 * @Description: Manager Command
 * 
 */

namespace JuneSwoole\Command;

use JuneSwoole\Component\Singleton;

class Manager implements CommandInterface
{
    use Singleton;

    function __construct()
    {
        defined('SWOOLE_VERSION') or define('SWOOLE_VERSION', intval(phpversion('swoole')));
        defined('JUNESWOOLE_SERVER') or define('JUNESWOOLE_SERVER', 1);
        defined('JUNESWOOLE_WEB_SERVER') or define('JUNESWOOLE_WEB_SERVER', 2);
        defined('JUNESWOOLE_WEBSOCKET_SERVER') or define('JUNESWOOLE_WEBSOCKET_SERVER', 3);
        defined('JUNESWOOLE_REDIS_SERVER') or define('JUNESWOOLE_REDIS_SERVER', 4);
        Container::getInstance()->initialize();
    }

    public function name(): string
    {
        return 'Manager';
    }

    public function exec(array $args): ?string
    {
        $command = array_shift($args);
        if (empty($command)) {
            return $this->help($args);
        } else if ($command != 'install') {
            try {
                Container::getInstance()->get($command);
            } catch (Exception\ContainerNotFoundException $th) {
                return $this->help($args);
            } catch (\Throwable $th) {
                return $th->__toString();
            }
        }

        return Container::getInstance()->runCommand($command, $args);
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
