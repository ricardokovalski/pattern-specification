<?php

namespace Moguzz\Operators;

use Moguzz\AbstractSpecification;
use Moguzz\Contract\Specification;

/**
 * Class NotSpecification
 *
 * @package Moguzz\Operators
 */
class NotSpecification extends AbstractSpecification
{
    /**
     * @var Specification $specification
     */
    private $specification;

    /**
     * @param Specification $specification
     */
    public function __construct(Specification $specification)
    {
        $this->specification = $specification;
    }

    /**
     * @param $object
     * @return bool|mixed
     */
    public function isSatisfiedBy($object)
    {
        return ! $this->specification->isSatisfiedBy($object);
    }
}