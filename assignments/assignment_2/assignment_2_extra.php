<?php
/**
 * Assignment #2 bonus
 * Extra tables (and reuse the tables from assignment #2)
 * - shoppingCart
 * - shoppingCartContent
 * - product
 * - method
 *
 * Output should be something like this:
 * <firstname> <lastname>       <paymentid>     <price>     <status>    <methodname>    <productname>
 */
$dsn = 'mysql:host=localhost;dbname=gamepoint;charset=utf8';
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, 'root', 'gamepointtrialzday', $opt);

$sql = 'SELECT 
            user.firstname,
            user.lastname,
            payment.id,
            payment.totalPrice,
            payment.status,
            method.name methodname,
            product.name productname
        FROM 
            user 
            JOIN payment ON payment.userID = user.id
            JOIN shoppingCart ON shoppingCart.paymentID = payment.id
            JOIN shoppingCartContent ON shoppingCartContent.cartID = shoppingCart.id
            JOIN product ON product.id = shoppingCartContent.productID
            JOIN method ON method.id = payment.methodID';

$res = $pdo->query($sql);

while ($row = $res->fetch())
{
    printf("%-5s %-9s       %3d     %5d     %-10s    %-9s    %s\n",
        $row['firstname'],
        $row['lastname'],
        $row['id'],
        $row['totalPrice'],
        $row['status'],
        $row['methodname'],
        $row['productname']);
}