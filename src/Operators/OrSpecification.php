<?php

namespace RicardoKovalski\Operators;

use RicardoKovalski\CompositeSpecification;
use RicardoKovalski\Contract\Specification;

/**
 * Class OrSpecification
 *
 * @package RicardoKovalski\Operators
 */
final class OrSpecification extends CompositeSpecification
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
     * OrSpecification constructor.
     *
     * @param Specification $left
     * @param Specification $right
     */
    public function __construct(Specification $left, Specification $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * @param $object
     * @return bool
     */
    public function isSatisfiedBy($object)
    {
        return $this->left->isSatisfiedBy($object) || $this->right->isSatisfiedBy($object);
    }
}