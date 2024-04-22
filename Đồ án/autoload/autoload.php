	<?php


    session_start();
    include_once 'dtbase.php';
    include_once 'ftion.php';
    $db = new Database;

    define("ROOT", $_SERVER['DOCUMENT_ROOT'] . "/public/uploads/");


    $category = $db->fetchAll("category");
    $page = $db->fetchAll("page");


    $sqlNew = "SELECT * FROM product ORDER BY create_at DESC LIMIT 4;";
    $productNew = $db->fetchsql($sqlNew);

    $sqlorders = " SELECT orders.*, product.*, COUNT(orders.product_Id) AS num_occurrences FROM orders INNER JOIN product ON orders.product_Id = product.id WHERE orders.product_Id IN (SELECT product_Id FROM orders GROUP BY product_Id HAVING COUNT(*) > 0) GROUP BY orders.product_Id ORDER BY num_occurrences DESC LIMIT 4;
    ";


    $orderspay = $db->fetchsql($sqlorders);

    $id = intval(getInput('id'));

    $editcart = $db->fetchID('product', $id);

    ?>
