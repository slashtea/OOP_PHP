<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/3/15
 * Time: 2:50 PM
 * Description: Looping over a SELECT query.
 */

    try {
        require_once '../../includes/pdo_connect.php';
        $sql = 'SELECT name, meaning, gender FROM names
                ORDER BY name';
    } catch(Exception $e) {
        $error = $e->getMessage();
    }
?>

</<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="../../Styles/styles.css" />
    <title>PDO: Looping Directly over a SELECT Query</title>
</head>
<body>
    <h1>PDO: Looping Directly over a SELECT Query</h1>
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
        <?php foreach($db->query($sql) as $row) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['meaning']; ?></td>
            <td><?php echo $row['gender']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>