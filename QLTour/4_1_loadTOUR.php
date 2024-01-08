<?php
include "connect.php";
if (isset($_GET['num'])) {
    $cusnum = $_GET['num'];

    $query = "SELECT TENTOUR, count(DISTINCT C.MaDDL) AS SODDL
    FROM CHITIET C, TOUR T
    WHERE T.MATOUR = C.MATOUR
    GROUP BY C.MATOUR, TENTOUR
    HAVING count(DISTINCT C.MaDDL) >= $cusnum
    ";

    $rs = $connect->query($query);
    if ($rs) {
        $i=1;
        while ($row = $rs->fetch_assoc()) {
            echo '<tr><td>' . $i . '</td>';
            echo '<td>' . $row['TENTOUR'] . '</td>';
            echo '<td>' . $row['SODDL'] . '</td>';
            echo '</tr>';
            $i++;
        }
    }
}
?>