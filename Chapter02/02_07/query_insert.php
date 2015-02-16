<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/3/15
 * Time: 6:41 PM
 * Description: Insert query.
 */

try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'INSERT INTO names (name, meaning,gender)
            VALUES ("William", "resolute guardian", "boy")';
    $result = $db->query($sql);
    echo $result->queryString;
} catch (Exception $e) {
    $error = $e->getMessage();
}

if(isset($error)) {
    echo "<p>$error</p>";
}