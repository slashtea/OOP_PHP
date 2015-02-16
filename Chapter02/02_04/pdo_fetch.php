<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/3/15
 * Time: 3:33 PM
 * Description: Fetching a row
 */

    try {
        require_once '../../includes/pdo_connect.php';
        $sql = 'SELECT name, meaning, gender FROM names
                ORDER BY name';
        $result = $db->query($sql);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
?>

</<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../../Styles/styles.css" />
    <title>PDO: Fetching a row</title>
</head>
<body>
    <h1>PDO: Fetching the Next Row</h1>
    <?php
        if(isset($error)) {
            echo "<p>$error</p>";
        }
    ?>

    <table>
        <tr>
            <th>Name</th>
            <th>Meaning</th>
            <th>Gender</th>
        </tr>
        <?php while($row = $result->fetch()) { ?>
        <tr>
            <td><?php echo $row[0] ; ?></td>
            <td><?php echo $row['meaning'] ; ?></td>
            <td><?php echo $row['gender'] ; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
