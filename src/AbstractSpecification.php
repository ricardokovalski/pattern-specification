<?php

namespace Moguzz;

use Moguzz\Contract\Specification;
use Moguzz\Operators\AndSpecification;
use Moguzz\Operators\NotSpecification;
use Moguzz\Operators\OrSpecification;

/**
 * Class AbstractSpecification
 *
 * @package Moguzz
 */
abstract class AbstractSpecification implements Specification
{
    /**
     * @param Specification $specification
     * @return Specification|AndSpecification
     */
    public function andSpecification(Specification $specification)
    {
        return new AndSpecification($this, $specification);
    }

    /**
     * @param Specification $specification
     * @return Specification|OrSpecification
     */
    public function orSpecification(Specification $specification)
    {
        return new OrSpecification($this, $specification);
    }

    /**
     * @return Specification|NotSpecification
     */
    public function not()
    {
        return new NotSpecification($this);
    }
}