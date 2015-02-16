<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/4/15
 * Time: 1:59 PM
 * Description: PDO transaction.
 */

    try {
        require_once '../../includes/pdo_connect.php';

    } catch (Exception $e) {
        $error = $e->getMessage();
    }

?>

</<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../../Styles/styles.css" />
    <title>PDO Transaction</title>
</head>
<body>
    <h1>PDO Transaction</h1>
    <?php
        if(isset($error)) {
            echo "<p>$error</p>";
        }
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Balance</th>
        </tr>

        <tr>

        </tr>
    </table>
</body>
</html>