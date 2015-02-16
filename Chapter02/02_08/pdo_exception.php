<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/3/15
 * Time: 8:03 PM
 * Description: PDO Exception.
 */

    try {
        require_once '../../includes/pdo_connect.php';
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT name, meaning, gender FROM nams
                ORDER BY name';
        $result = $db->query($sql);
    }catch (Exception $e) {
        $error = $e->getMessage();
    }

?>

</<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../../Styles/styles.css" />
    <title>PDO: Error Messages</title>
</head>
<body>
    <h1>PDO: Getting Error Messages</h1>
    <?php
    if(isset($error)) {
        echo "<p>$error</p>";
    } else {
        ?>

    <table>
        <tr>
            <th>Names</th>
            <th>Meaning</th>
            <th>Gender</th>
        </tr>
        <?php while($row = $result->fetch()) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['meaning']; ?></td>
                <td><?php echo $row['gender']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <?php } // end else ?>
</body>
</html>