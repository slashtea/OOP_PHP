<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/3/15
 * Time: 4:31 PM
 * Description: PDO Fetch All method.
 */

    try {
        require_once '../../includes/pdo_connect.php';
        $sql = 'SELECT name, meaning, gender FROM names
                ORDER BY name';
        $result = $db->query($sql);

        $all = $result->fetchAll();
        // return an indexed array $all = $result->fetchAll(PDO::FETCH_NUM);
        // return an associative array $all = $result->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../../Styles/styles.css" />
    <title>PDO: FETCHING ALL ROWS</title>
</head>
<body>
    <h1>PDO : FETCHING ALL ROWS in a Result Set</h1>
    <?php
        if(isset($error)) {
            echo "<p>$error</p>";
        }
    ?>
    <pre>
        <?php print_r($all); ?>
    </pre>

</body>
</html>