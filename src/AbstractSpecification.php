<?php

namespace Moguzz;

use BadMethodCallException;

/**
 * Class AbstractSpecification
 *
 * @package Moguzz
 */
abstract class AbstractSpecification implements Specification
{
    /**
     * @param Specification $specification
     * @return AndSpecification
     */
    public function andSpecification(Specification $specification)
    {
        return new AndSpecification($this, $specification);
    }

    /**
     * @param Specification $specification
     * @return OrSpecification
     */
    public function orSpecification(Specification $specification)
    {
        return new OrSpecification($this, $specification);
    }

    /**
     * @return NotSpecification
     */
    public function not()
    {
        return new NotSpecification($this);
    }
}