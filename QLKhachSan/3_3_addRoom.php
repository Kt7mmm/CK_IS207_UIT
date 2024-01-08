<?php
include "connectQLKS.php";
if (isset($_GET['roomid'])  && isset($_GET['selectedHD'])) {
    $MAHD = $_GET['selectedHD'];
    $MAPHONG = $_GET['roomid'];
    $query2 = "INSERT INTO THUE (MAHD, MAPHONG, NGAYTHUE, NGAYTRA, GIATHUE)
    VALUES 
    ('$MAHD','$MAPHONG','2023-01-01', '2023-01-05', 100000.00)";
    
    $rs = $connect->query($query2);
    if ($rs) {
        echo "Thêm phòng thành công";
    } else {
        // Trả về thông báo lỗi nếu không thể thêm phòng
        echo "Lỗi: Không thể thêm phòng";
    }
}
?>