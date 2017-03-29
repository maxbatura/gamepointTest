<?php

/**
 * Created by PhpStorm.
 * User: maxbatura
 */

require_once __DIR__.'/PaymentMethodCreditCard.php';
require_once __DIR__.'/PaymentMethodPaypal.php';

abstract class PaymentMethodFactory
{
    private $paidPrice;

    public static function create($type) {
        $className = 'PaymentMethod'.ucfirst($type);
        return new $className();
    }

    public function setPaidPrice($price) {
        $this->paidPrice = $price;
    }

    public function paidPrice() {
        return $this->paidPrice;
    }

    abstract public function isApproved();
}