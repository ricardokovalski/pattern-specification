<?php

class SpecificationTest extends \PHPUnit_Framework_TestCase
{
    public function testSpecification()
    {
        $trueSpec  = new BoolSpecification(true);
        $falseSpec = new BoolSpecification(false);

        $this->assertTrue($trueSpec->isSatisfiedBy(new stdClass));
        $this->assertFalse($falseSpec->isSatisfiedBy(new stdClass));
    }

    public function testNotSpecification()
    {
        $notTrueSpec  = (new BoolSpecification(true))->not();
        $notFalseSpec = (new BoolSpecification(false))->not();

        $this->assertFalse($notTrueSpec->isSatisfiedBy(new stdClass));
        $this->assertTrue($notFalseSpec->isSatisfiedBy(new stdClass));
    }

    public function testAndSpecification()
    {
        $trueSpec  = new BoolSpecification(true);
        $falseSpec = new BoolSpecification(false);

        $this->assertTrue($trueSpec->andSpecification($trueSpec)->isSatisfiedBy(new stdClass));
        $this->assertFalse($trueSpec->andSpecification($falseSpec)->isSatisfiedBy(new stdClass));
    }

    public function testOrSpecification()
    {
        $trueSpec  = new BoolSpecification(true);
        $falseSpec = new BoolSpecification(false);

        $this->assertTrue($trueSpec->orSpecification($trueSpec)->isSatisfiedBy(new stdClass));
        $this->assertTrue($trueSpec->orSpecification($falseSpec)->isSatisfiedBy(new stdClass));
    }
}

class BoolSpecification extends \RicardoKovalski\CompositeSpecification
{
    private $bool;

    public function __construct($bool)
    {
        $this->bool = $bool;
    }

    public function isSatisfiedBy($object)
    {
        return $this->bool;
    }
}