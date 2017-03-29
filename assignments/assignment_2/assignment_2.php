<?php
/**
 * Assignment #2
 * These are your database (MySQL) login credentials
 *    Host: localhost
 *    User: root
 *    Password: gamepointtrialzday
 *    Database: gamepoint
 *
 * These are the tables structures of the tables:
 *
 * CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `status` enum('forwarded','pending','authorised') DEFAULT NULL,
  `totalPrice` int(11) DEFAULT NULL,
  `methodID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;
 *
 *  CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;
 *
 *
 *
 *
 * Make a backend script, select all payments for user "Henk"
 * Output should be something like this:
 * <payment.id>   <user.firstname> <user.lastname>    <payment.totalPrice>     <payment.status>    <payment.methodID>
 *
 *
 */
$dsn = 'mysql:host=localhost;dbname=gamepoint;charset=utf8';
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, 'root', 'gamepointtrialzday', $opt);

$sql = 'SELECT 
            payment.id,
            user.firstname,
            user.lastname,
            payment.totalPrice,
            payment.status,
            payment.methodID
        FROM 
            user
            JOIN payment ON payment.userID = user.id
        WHERE user.firstname = "Henk"';

$res = $pdo->query($sql);

while ($row = $res->fetch())
{
    printf("%11d    %-4s %-9s    %11d    %-10s    %d\n",
        $row['id'],
        $row['firstname'],
        $row['lastname'],
        $row['totalPrice'],
        $row['status'],
        $row['methodID']);
}