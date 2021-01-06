<?php

namespace RicardoKovalski\Operators;

use RicardoKovalski\CompositeSpecification;
use RicardoKovalski\Contract\Specification;

/**
 * Class NotSpecification
 *
 * @package RicardoKovalski\Operators
 */
class NotSpecification extends CompositeSpecification
{
    /**
     * @var Specification $specification
     */
    private $specification;

    /**
     * NotSpecification constructor.
     *
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