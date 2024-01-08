<?php
include "connect.php";

    

    $query2 = "SELECT MADDL, TENDDL, TENTTP, DACTRUNG FROM DIEMDL D, TINHTP T
    WHERE D.MATTP=T.MATTP";
   
    $i = 1;
    $rs = $connect->query($query2);
    if ($rs) {
        while ($row = $rs->fetch_assoc()) {
            echo '<tr><td>' . $i . '</td>';
            echo '<td>' . $row['MADDL'] . '</td>';
            echo '<td>' . $row['TENDDL'] . '</td>';
            echo '<td>' . $row['TENTTP'] . '</td>';
            echo '<td>' . $row['DACTRUNG'] . '</td>';
            echo '<td><button class="View_btn" data-maddl="' . $row['MADDL'] . '">View</button></td>';
            echo '<td><button class="Del_btn" data-maddl="' . $row['MADDL'] . '">Delete</button></td></tr>';

        }
    }
?>
