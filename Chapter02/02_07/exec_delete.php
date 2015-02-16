<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/3/15
 * Time: 7:43 PM
 * Description: Delete query with exec method.
 */

    try {
        require_once '../../includes/pdo_connect.php';
        $sql = 'DELETE FROM names WHERE name = "William" ';
        $affected = $db->exec($sql);
        echo $affected . ' record deleted.';
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    if(isset($error)) {
        echo "<p>$error</p>";
    }