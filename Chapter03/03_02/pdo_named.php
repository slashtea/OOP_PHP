<?php
/**
 * Created by PhpStorm.
 * User: shannon
 * Date: 2/4/15
 * Time: 10:32 AM
 * Description: Using prepared statements.
 */
if(isset($_GET['search'])) {
    try {
        require_once '../../includes/pdo_connect.php';
        $sql = 'SELECT make, yearmade, mileage, price, description
                FROM cars
                LEFT JOIN makes USING (make_id)
                WHERE make LIKE :make AND yearmade >= :yearmade AND price <= :price
                ORDER BY price';

        // Prepare the statement.
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':make', '%' . $_GET['make'] . '%');
        $stmt->bindParam(':yearmade', $_GET['yearmade'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $_GET['price'], PDO::PARAM_INT);

        // Now we need to execute the statement.
        $stmt->execute();

        $errorInfo = $stmt->errorInfo();
        if (isset($errorInfo[2])) {
            $error = $errorInfo[2];
        }
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

?>

</<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../../Styles/styles.css" />
    <title>PDO: Named Parameters</title>
</head>
<body>
    <h1>PDO Prepared Statement: Named Parameters</h1>
    <?php
        if(isset($error)) {
            echo "<p>$error</p>";
        }
    ?>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
            <legend>Search For Cars</legend>
        <p>
            <label for="make">Make</label>
            <input type="text" name="make" id="make" />
            <label for="yearmade">Year (minimum): </label>
            <select name="yearmade" id="yearmade">
                <?php
                    for($y=1970; $y<=2015; $y+=5)
                        echo "<option>$y</option>";
                ?>
            </select>
            <label for="price">Price (maximum): </label>
            <select name="price" id="price">
                <?php
                    for($p=5000; $p<= 30000; $p+=5000) {
                        echo "<option value='$p'";
                        if($p == 30000) {
                            echo 'selected';
                        }
                        echo '>$' . number_format($p) . '</option>';
                    }
                ?>
            </select>

            <input type="submit" name="search" value="Search" />
        </p>
        </fieldset>
    </form>
    <?php if(isset($_GET['search'])) {
        $row = $stmt->fetch();
        if($row) {
    ?>

    <table>
        <tr>
            <th>Make</th>
            <th>Year</th>
            <th>Mileage</th>
            <th>Price</th>
            <th>Description</th>
        </tr>
        <?php do { ?>
        <tr>
            <td><?php echo $row['make']; ?></td>
            <td><?php echo $row['yearmade']; ?></td>
            <td><?php echo number_format($row['mileage']); ?></td>
            <td><?php echo number_format($row['price'], 2); ?></td>
            <td><?php echo $row['description']; ?></td>
        </tr>
        <?php } while($row = $stmt->fetch());  // end while ?>
    </table>
    <?php } else {
            echo "<p>No results found.</p>";
        } // end if row
    } // end if isset ?>
</body>
</html>