<?php

/**
 * Created by PhpStorm.
 * User: maxbatura
 */

require_once __DIR__.'/ProductCoins.php';
require_once __DIR__.'/ProductVip.php';

abstract class ProductFactory
{
    private $price;

    public static function create($type) {
        $className = 'Product'.ucfirst($type);
        return new $className();
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}