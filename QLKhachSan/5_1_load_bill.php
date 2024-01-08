<?php
include "connectQLKS.php";
if (isset($_GET['MAKH'])) {
    $MAKH = $_GET['MAKH'];

    $query = "SELECT MAHD
    FROM HOADON HD
    WHERE MAKH='$MAKH'";

    $rs = $connect->query($query);
    if ($rs) {
            while ($row = $rs->fetch_assoc()) {
                echo '<option value="' . $row['MAHD'] . '">' . $row['MAHD'] . '</option>';
            }
            echo '<option value=""></option>'; //để kích hoạt onchange trong trường hợp chỉ có 1 option trong combobox hóa đơn

            echo '</select> ';
    }
}
?>