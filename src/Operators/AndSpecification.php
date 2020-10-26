<?php

namespace Moguzz\Operators;

use Moguzz\AbstractSpecification;
use Moguzz\Contract\Specification;

/**
 * Class AndSpecification
 *
 * @package Moguzz\Operators
 */
class AndSpecification extends AbstractSpecification
{
    /**
     * @var Specification $left
     */
    private $left;

    /**
     * @var Specification $right
     */
    private $right;

    /**
     * AndSpecification constructor.
     *
     * @param Specification $left
     * @param Specification $right
     */
    public function __construct(Specification $left, Specification $right)
    {
        $this->left = $left;
        $this->right   = $right;
    }

    /**
     * @param $object
     * @return bool|mixed
     */
    public function isSatisfiedBy($object)
    {
        return $this->left->isSatisfiedBy($object) && $this->right->isSatisfiedBy($object);
    }
}