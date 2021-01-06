<?php

namespace RicardoKovalski;

use RicardoKovalski\Contract\Specification;
use RicardoKovalski\Operators\AndSpecification;
use RicardoKovalski\Operators\NotSpecification;
use RicardoKovalski\Operators\OrSpecification;

/**
 * Class CompositeSpecification
 *
 * @package RicardoKovalski
 */
abstract class CompositeSpecification implements Specification
{
    /**
     * @param $object
     * @return mixed
     */
    public abstract function isSatisfiedBy($object);

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
