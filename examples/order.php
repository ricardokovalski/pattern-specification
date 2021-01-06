<?php

require __DIR__ . '../vendor/autoload.php';

use RicardoKovalski\CompositeSpecification;

class Order
{
    public function isPaid()
    {
        return true;
    }

    public function isShipped()
    {
        return false;
    }

    public function isCancelled()
    {
        return false;
    }
}

class UnshippedOrderSpecification extends CompositeSpecification
{
    public function isSatisfiedBy($object)
    {
        return ! $object->isShipped();
    }
}

class PaidOrderSpecification extends CompositeSpecification
{
    public function isSatisfiedBy($object)
    {
        return $object->isPaid();
    }
}

class CancelledOrderSpecification extends CompositeSpecification
{
    public function isSatisfiedBy($object)
    {
        return $object->isCancelled();
    }
}

$paid = new PaidOrderSpecification;
$unshipped = new UnshippedOrderSpecification;
$cancelled = new CancelledOrderSpecification;

echo $paid->andSpecification($unshipped)->isSatisfiedBy(new Order) . PHP_EOL; // True