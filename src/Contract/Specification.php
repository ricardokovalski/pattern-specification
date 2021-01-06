<?php

namespace RicardoKovalski\Contract;

/**
 * Interface Specification
 *
 * @package RicardoKovalski\Contract
 */
interface Specification
{
    /**
     * @param $object
     * @return mixed
     */
    public function isSatisfiedBy($object);

    /**
     * @param Specification $specification
     * @return mixed
     */
    public function andSpecification(Specification $specification);

    /**
     * @param Specification $specification
     * @return mixed
     */
    public function orSpecification(Specification $specification);

    /**
     * @return mixed
     */
    public function not();
}