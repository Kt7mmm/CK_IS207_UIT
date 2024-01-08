<?php
include "connectQLKS.php";
if (isset($_GET['num'])) {
    $cusnum = $_GET['num'];

    $query = "SELECT KH.MAKH, TENKH, SUM(TONGTIEN) AS TONGTIENTHUE
    FROM KHACHHANG KH, HOADON HD
    WHERE KH.MAKH = HD.MAKH
    GROUP BY KH.MAKH, TENKH
    ORDER BY TONGTIENTHUE DESC
    LIMIT $cusnum";

    $rs = $connect->query($query);
    if ($rs) {
        $i=1;
        while ($row = $rs->fetch_assoc()) {
            echo '<tr><td>' . $i . '</td>';
            echo '<td>' . $row['MAKH'] . '</td>';
            echo '<td>' . $row['TENKH'] . '</td>';
            echo '<td>' . $row['TONGTIENTHUE'] . '</td>';
            echo '</tr>';
        }
    }
}
?>