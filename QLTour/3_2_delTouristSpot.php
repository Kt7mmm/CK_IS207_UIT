<?php
include "connect.php";
if (isset($_GET['maddl'])) {
    $MADDL = $_GET['maddl'];
    
    $query2 = "DELETE FROM DIEMDL 
    WHERE MaDDL='$MADDL'";  

    $rs = $connect->query($query2);
    if ($rs) {
        echo "Xóa DDL thành công";
    } else {
        // Trả về thông báo lỗi nếu không thể xóa phòng
        echo "Lỗi: Không thể xóa DDL";
    }
}
?>