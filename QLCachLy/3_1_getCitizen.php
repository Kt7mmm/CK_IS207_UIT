<?php
include "connect.php";

    

    $query2 = "SELECT MaCongDan, TenCongDan, GioiTinh, NamSinh, NuocVe
    FROM CONGDAN";
   
    $i = 1;
    $rs = $connect->query($query2);
    if ($rs) {
        while ($row = $rs->fetch_assoc()) {
            echo '<tr><td>' . $i . '</td>';
            echo '<td>' . $row['MaCongDan'] . '</td>';
            echo '<td>' . $row['TenCongDan'] . '</td>';
            echo '<td>';
            if ($row['GioiTinh'] == 1) {
                echo 'Nam';
            } else {
                echo 'Nữ';
            }
            echo '</td>';
            echo '<td>' . $row['NamSinh'] . '</td>';
            echo '<td>' . $row['NuocVe'] . '</td>';

            echo '<td><a href="3_3_viewCitizen.php?macongdan=' . $row['MaCongDan'] . '">View</a></td>';            
            echo '<td><button class="Del_btn" data-macd="' . $row['MaCongDan'] . '">Delete</button></td></tr>';
            $i++;
        }
    }
?>
