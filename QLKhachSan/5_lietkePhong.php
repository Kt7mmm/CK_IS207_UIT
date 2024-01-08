<!DOCTYPE html>
<html>

<head>
    <title>
        Liệt kê phòng của khách hàng
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    
<label>Tên khách hàng</label>
            
        <?php
                    include "connectQLKS.php";
                    $query="SELECT MAKH,TENKH FROM KHACHHANG";

                    $rs = $connect->query($query);

                    echo '<select id="kh" name="kh" onchange="loadBills();loadRoom();">';
                    while ($row=$rs->fetch_assoc()){
                        echo '<option value="'.$row['MAKH'].'">'.$row['TENKH'].'</option>';
                    }
                    echo '</select> ';
                    ?>
<br>
<label>Mã hóa đơn</label>
<select id="hd" name="hd" onchange="loadRooms()">
</select>

        <h4> Danh sách các phòng trong hóa đơn</h4><br>
        <table border="1" cellspacing="0" id="roomList">
            <tr>
                <td>STT</td>
                <td>Mã phòng</td>
                <td>Loại phòng</td>
            </tr>
        </table>

</body>
<script>
    function loadBills(){
        var MAKH = $("#kh").val();
        $.ajax({
            type: 'GET',
            url: '5_1_load_bill.php',
            data: { MAKH: MAKH },
            success: function(response) {
                $('#hd').html(response);            }
        });
    }
    function loadRooms(){
        var MAHD = $("#hd").val();

        $.ajax({
            type: 'GET',
            url: '5_2_load_room.php',
            data: { MAHD: MAHD },
            success: function(response) {
                $('#roomList').html(response);            }
        });
    }
    $(document).ready(function() {

    loadBills();
    loadRooms();
});
</script>

</html>