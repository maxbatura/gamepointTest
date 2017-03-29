<?php
/**
 * Assignment #3
 * Use the same code from assignment #2
 *
 * Create a web page which fetches the data without a refresh/pageload
 * The page should initially show a button with the text 'Fetch all payments'
 * - If you click on it, you should fetch the data in a JSON format. Result should look like the image below (see imgur.com URL)
 *
 * Minimal requirements:
 * - Use jQuery
 * - The fetched data should be in JSON format
 * - Loop through the data and show the output in a HTML table (so JSON shouldn't return HTML, but pure JSON)
 *
 * You're allowed to use other frontend/JS frameworks (i.e. Bootstrap, jQuery plugins)
 * 
 * Output should be similar to http://imgur.com/a/jUKm1
**/
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

$response = array();

while ($row = $res->fetch())
{
    $response[] = $row;
}

echo json_encode($response);