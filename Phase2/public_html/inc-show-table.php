<?php include 'inc-dbconn.php' ?>

<table>
<?php

try {
    $dbs = $conn->query($query);
    while ( $row = $dbs->fetch(PDO::FETCH_BOTH) ) {
        echo "<tr>";
        echo "<br>";
        $cnt = count($row) / 2;
        for ($i = 0; $i < $cnt; $i++) {
            echo "<tr> " . $row[$i] ." </tr>";
            echo "<br>";
        }
        echo "</tr>";
    }
}
catch (Exception $e) {
    echo "<tr><td>Exception Message: <br>/>" .$e->getMessage() .'</td></tr>';
}
$conn = null;
?>
</table>