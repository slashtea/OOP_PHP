<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/3/15
 * Time: 7:03 PM
 * Description: Insert into Database using exec method.
 */

try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'INSERT INTO names (name, meaning,gender)
            VALUES ("William", "resolute guardian", "boy")';
    $affected = $db->exec($sql);
    echo $affected . ' row inserted with ID' . $db->lastInsertId();
    //echo $result->queryString;
} catch (Exception $e) {
    $error = $e->getMessage();
}

if(isset($error)) {
    echo "<p>$error</p>";
}