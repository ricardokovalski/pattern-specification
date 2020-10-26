<?php

require __DIR__ . '../vendor/autoload.php';

use Moguzz\AbstractSpecification;

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

class UnshippedOrderSpecification extends AbstractSpecification
{
    public function isSatisfiedBy($order)
    {
        return ! $order->isShipped();
    }
}

class PaidOrderSpecification extends AbstractSpecification
{
    public function isSatisfiedBy($order)
    {
        return $order->isPaid();
    }
}

class CancelledOrderSpecification extends AbstractSpecification
{
    public function isSatisfiedBy($order)
    {
        return $order->isCancelled();
    }
}

$paid = new PaidOrderSpecification;
$unshipped = new UnshippedOrderSpecification;
$cancelled = new CancelledOrderSpecification;

echo $paid->andSpecification($unshipped)->isSatisfiedBy(new Order) . PHP_EOL; // True