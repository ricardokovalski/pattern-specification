<?php

require __DIR__ . '../vendor/autoload.php';

use Moguzz\AbstractSpecification;

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

class PendingCashOutSpecification extends AbstractSpecification
{
    public function isSatisfiedBy($cashOut)
    {
        return $cashOut->isPending();
    }
}

class PaidCashOutSpecification extends AbstractSpecification
{
    public function isSatisfiedBy($cashOut)
    {
        return $cashOut->isPaid();
    }
}

class RefusedCashOutSpecification extends AbstractSpecification
{
    public function isSatisfiedBy($cashOut)
    {
        return $cashOut->isRefused();
    }
}

$paid = new PaidCashOutSpecification;
$pending = new PendingCashOutSpecification;
$refused = new RefusedCashOutSpecification;

echo $paid->andSpecification($pending->andSpecification($refused->not()))->isSatisfiedBy(new CashOut) . PHP_EOL;
