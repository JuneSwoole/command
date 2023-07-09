<?php
/*
 * @Author: juneChen && juneswoole@163.com
 * @Date: 2023-07-09 19:43:47
 * @LastEditors: juneChen && juneswoole@163.com
 * @LastEditTime: 2023-07-09 20:17:31
 * 
 */

declare(strict_types=1);

namespace JuneSwoole\Command\Exception;

use RuntimeException;
use Psr\Container\NotFoundExceptionInterface;

class ContainerNotFoundException extends RuntimeException implements NotFoundExceptionInterface
{
}
