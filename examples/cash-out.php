<?php

require __DIR__ . '../vendor/autoload.php';

use RicardoKovalski\CompositeSpecification;

class CashOut
{
    public function isPaid()
    {
        return true;
    }

    public function isPending()
    {
        return false;
    }

    public function isRefused()
    {
        return false;
    }
}

class PendingCashOutSpecification extends CompositeSpecification
{
    public function isSatisfiedBy($object)
    {
        return $object->isPending();
    }
}

class PaidCashOutSpecification extends CompositeSpecification
{
    public function isSatisfiedBy($object)
    {
        return $object->isPaid();
    }
}

class RefusedCashOutSpecification extends CompositeSpecification
{
    public function isSatisfiedBy($object)
    {
        return $object->isRefused();
    }
}

$paid = new PaidCashOutSpecification;
$pending = new PendingCashOutSpecification;
$refused = new RefusedCashOutSpecification;

echo $paid->andSpecification($pending->andSpecification($refused->not()))->isSatisfiedBy(new CashOut) . PHP_EOL;
