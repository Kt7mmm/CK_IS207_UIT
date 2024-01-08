<?php
include "connectQLKS.php";
if (isset($_GET['hd'])) {
    $MAHD = $_GET['hd'];
    $query2 = "SELECT A.MAPHONG, A.TENPHONG FROM PHONG A 
    WHERE EXISTS 
    (SELECT T.* FROM THUE T WHERE T.MAHD='$MAHD' AND A.MAPHONG = T.MAPHONG)";
    $i = 1;
    $rs = $connect->query($query2);
    if ($rs) {
        while ($row = $rs->fetch_assoc()) {
            echo '<tr><td>' . $i . '</td>';
            echo '<td>' . $row['MAPHONG'] . '</td>';
            echo '<td>' . $row['TENPHONG'] . '</td>';
            echo '<td><button class="del_btn" data-roomid="' . $row['MAPHONG'] . '">Xóa</button></td></tr>';
            $i++;
        }
    }
}
?>