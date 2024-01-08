<?php
include "connect.php";
if (isset($_GET['MADCL'])) {
    $MADCL = $_GET['MADCL'];

    $query = "SELECT MaCongDan, TenCongDan
    FROM CONGDAN
    WHERE MaDiemCachLy = '$MADCL'";

    $rs = $connect->query($query);
    if ($rs) {
            while ($row = $rs->fetch_assoc()) {
                echo '<option value="' . $row['MaCongDan'] . '">' . $row['TenCongDan'] . '</option>';
            }
            echo '<option value=""></option>'; //để kích hoạt onchange trong trường hợp chỉ có 1 option trong combobox hóa đơn

            echo '</select> ';
    }
}
?>