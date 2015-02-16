<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/3/15
 * Time: 6:34 PM
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
    <title>PDO: Testing the first row</title>
</head>
<body>
<h1>PDO: Checking a Result Set before Display</h1>
<?php
    if(isset($error)) {
        echo "<p>$error</p>";
    }
    $row = $result->fetch(); // This will get the first row of the result set.
    if(!$row) {
        echo "<p>No results found.</p>";
    } else {
?>

<table>
    <tr>
        <th>Name</th>
        <th>Meaning</th>
        <th>Gender</th>
    </tr>
    <?php do { ?>
        <tr>
            <td><?php echo $row['name'] ; ?></td>
            <td><?php echo $row['meaning'] ; ?></td>
            <td><?php echo $row['gender'] ; ?></td>
        </tr>
    <?php } while($row = $result->fetch()); ?>
</table>
<?php } // end else ?>
</body>
</html>