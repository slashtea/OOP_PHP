<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/3/15
 * Time: 5:11 PM
 * Description: Count number of rows returned with foreach loop.
 */

try {
    require_once '../../includes/pdo_connect.php';
    // Portable way of doing count.
    $count = $db->query('SELECT COUNT(*) FROM names ');
    $numrows = $count->fetchColumn();

    if($numrows) {
        $sql = 'SELECT name, meaning, gender FROM names
                ORDER BY name';
        $result = $db->query($sql);
    }

    //$numrows = $result->rowCount();
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../../Styles/styles.css" />
    <title>PDO: Counting Rows</title>
</head>
<body>
<h1>PDO: Counting Rows in a Result Set</h1>
<?php
if(isset($error))
    echo "<p>$error</p>";
echo "<p>Total results found: $numrows</p>";

if($numrows) {
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
<?php } ?>
</body>
</html>