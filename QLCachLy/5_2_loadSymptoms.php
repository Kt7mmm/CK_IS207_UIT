<?php
include "connect.php";
if (isset($_GET['MACD'])) {
    $MACD = $_GET['MACD'];

    $query = "SELECT TC.MaTrieuChung, TenTrieuChung
    FROM TRIEUCHUNG TC, CN_TC CN
    WHERE CN.MaCongDan='$MACD'
    AND TC.MaTrieuChung=CN.MaTrieuChung
    
    ";

    $rs = $connect->query($query);
    if ($rs) {
        $i=1;
        while ($row = $rs->fetch_assoc()) {
            echo '<tr><td>' . $i . '</td>';
            echo '<td>' . $row['MaTrieuChung'] . '</td>';
            echo '<td>' . $row['TenTrieuChung'] . '</td>';
            
            echo '</tr>';
            $i++;
        }
    }
}
?>