<?php
include "connectQLKS.php";
if (isset($_GET['roomid'])  && isset($_GET['selectedHD'])) {
    $MAHD = $_GET['selectedHD'];
    $MAPHONG = $_GET['roomid'];
    $query2 = "DELETE FROM THUE 
    WHERE MAPHONG='$MAPHONG'
    AND MAHD='$MAHD'";  
    $rs = $connect->query($query2);
    if ($rs) {
        echo "Xóa phòng thành công";
    } else {
        // Trả về thông báo lỗi nếu không thể xóa phòng
        echo "Lỗi: Không thể xóa phòng";
    }
}
?>