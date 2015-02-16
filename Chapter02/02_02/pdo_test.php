<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/2/15
 * Time: 11:43 PM
 * Description: Testing PDO connection
 * An uncaught PDO exception can expause your username and password.
 */

try {
    require_once '../../includes/pdo_connect.php';
} catch (Exception $e) {
    $error = $e->getMessage();
}

?>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Connecting with PDO</h1>
    <?php
        if($db) {
            echo "<p>Connection successful.</p>";
        }elseif(isset($error)) {
            echo "<p>$error</p>";
        }
    ?>
</body>
</html>