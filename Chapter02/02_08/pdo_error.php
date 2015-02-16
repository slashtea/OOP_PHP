<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/3/15
 * Time: 7:50 PM
 * Description: Errors with pdo.
 */

    try {
        require_once '../../includes/pdo_connect.php';
        $sql = 'SELECT name, meaning, gender FROM names
                ORDER BY name';
        $result = $db->query($sql);
        $errorInfo = $db->errorInfo();
        if(isset($errorInfo[2])) {
            $error = $errorInfo[2];
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
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