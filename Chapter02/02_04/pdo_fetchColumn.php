<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/3/15
 * Time: 4:53 PM
 * Description: Fetching by Columns.
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

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../../Styles/styles.css" />
    <title>PDO: FETCHING a Column</title>
</head>
<body>
    <h1>PDO: FETCHING a Single Column</h1>
    <?php
        if(isset($error)) {
            echo "<p>$error</p>";
        }
    ?>

    <table>
        <tr>
            <th>Column</th>
        </tr>
        <?php // while($col = $result->fetchColumn()) { ?>
        <?php while($col = $result->fetchColumn(2)) { ?>
        <tr>
            <td><?php echo $col; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>