<?php

/**
 * Created by PhpStorm.
 * User: maxbatura
 * Date: 26.03.2017
 * Time: 4:52
 */
class Payment
{
    private $user;
    private $product;
    private $paymentMethod;

    public function __construct($user, $product, $paymentMethod) {
        $this->user = $user;
        $this->product = $product;
        $this->paymentMethod = $paymentMethod;
    }

    public function getProduct() {
        return $this->product;
    }

    public function getMethod() {
        return $this->paymentMethod;
    }

    public function authorize() {
        return true;
    }
}