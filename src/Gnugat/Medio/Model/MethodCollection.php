<?php

/*
 * This file is part of the Medio project.
 *
 * (c) Loïc Chardonnet <loic.chardonnet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Gnugat\Medio\Model;

use Gnugat\Medio\Exception\InvalidArgumentException;

class MethodCollection
{
    /**
     * @var array
     */
    private $methods = array();

    /**
     * @return array
     */
    public function all()
    {
        return $this->methods;
    }

    /**
     * @param Method $method
     *
     * @throws InvalidArgumentException If the name is already taken
     */
    public function add(Method $method)
    {
        $name = $method->getName();
        $message = sprintf('Cannot add method "%s", risk of name duplication', $name);
        foreach ($this->methods as $addedMethod) {
            if ($name === $addedMethod->getName()) {
                throw new InvalidArgumentException($message);
            }
        }
        $this->methods[] = $method;
    }
}
