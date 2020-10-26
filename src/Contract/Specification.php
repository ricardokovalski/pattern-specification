<?php

namespace Moguzz\Contract;

/**
 * Interface Specification
 *
 * @package Moguzz\Contract
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
     * @return Specification
     */
    public function andSpecification(Specification $specification);

    /**
     * @param Specification $specification
     * @return Specification
     */
    public function orSpecification(Specification $specification);

    /**
     * @return Specification
     */
    public function not();
}