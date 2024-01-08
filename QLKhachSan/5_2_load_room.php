<?php
include "connectQLKS.php";
if (isset($_GET['MAHD'])) {
    $MAHD = $_GET['MAHD'];

    $query = "SELECT P.MAPHONG, LOAIPHONG
    FROM PHONG P, THUE T
    WHERE T.MAHD='$MAHD'
    AND T.MAPHONG = P.MAPHONG
    
    ";

    $rs = $connect->query($query);
    if ($rs) {
        $i=1;
        while ($row = $rs->fetch_assoc()) {
            echo '<tr><td>' . $i . '</td>';
            echo '<td>' . $row['MAPHONG'] . '</td>';
            echo '<td>' . $row['LOAIPHONG'] . '</td>';
            
            echo '</tr>';
            $i++;
        }
    }
}
?>