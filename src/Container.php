<?php
/*
 * @Author: juneChen && juneswoole@163.com
 * @Date: 2023-07-09 19:22:59
 * @LastEditors: juneChen && juneswoole@163.com
 * @LastEditTime: 2023-07-09 21:39:41
 * @Description: Command Container
 * 
 */

namespace JuneSwoole\Command;

use JuneSwoole\Component\Singleton;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    use Singleton;

    private $containers = [];

    public function get(string $id): ?CommandInterface
    {
        if (!$this->has($id)) {
            throw new Exception\ContainerNotFoundException($id . ' command is not found.');
        }
        $key = strtolower($id);
        return $this->containers[$key];
    }

    public function has(string $id): bool
    {
        $key = strtolower($id);
        return isset($this->containers[$key]);
    }

    public function set(CommandInterface $command, bool $cover = false)
    {
        if (!isset($this->containers[strtolower($command->name())]) || $cover) {
            $this->containers[strtolower($command->name())] = $command;
        }
    }

    public function runCommand(string $id, array $args): ?string
    {
        return $this->get($id)->exec($args);
    }

    public function getCommandKeys(): array
    {
        return array_keys($this->containers);
    }

    public function initialize()
    {

        $this->set(new Directive\Install());
        $this->set(new Directive\Start());
        $this->set(new Directive\Restart());
        $this->set(new Directive\Stop());
        $this->set(new Directive\Help());
    }
}
