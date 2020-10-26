<?php

namespace Moguzz\Operators;

use Moguzz\AbstractSpecification;
use Moguzz\Contract\Specification;

/**
 * Class OrSpecification
 *
 * @package Moguzz\Operators
 */
class OrSpecification extends AbstractSpecification
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
     * @return bool
     */
    public function isSatisfiedBy($object)
    {
        return $this->left->isSatisfiedBy($object) || $this->right->isSatisfiedBy($object);
    }
}