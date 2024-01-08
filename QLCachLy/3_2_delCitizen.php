<?php
include "connect.php";
if (isset($_GET['macd'])) {
    $macd = $_GET['macd'];
    
    $query2 = "DELETE FROM CONGDAN 
    WHERE MaCongDan='$macd'";  

    $rs = $connect->query($query2);
    if ($rs) {
        echo "Xóa CONGDAN thành công";
    } else {
        // Trả về thông báo lỗi nếu không thể xóa phòng
        echo "Lỗi: Không thể xóa CONGDAN";
    }
}
?>