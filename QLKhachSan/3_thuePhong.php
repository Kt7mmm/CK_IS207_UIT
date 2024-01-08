<!DOCTYPE html>
<html>

<head>
    <title>
        Đặt thuê phòng
    </title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <form method="POST" action="">
        <h4> Mã hóa đơn </h4>
        <p>
            <?php
            include "connectQLKS.php";
            $query = "SELECT MAHD FROM HOADON";

            $rs = $connect->query($query);

            echo '<select id="hd" name="hd" onchange="popRooms()">';
            while ($row = $rs->fetch_assoc()) {
                echo '<option value="' . $row['MAHD'] . '">' . $row['MAHD'] . '</option>';
            }
            echo '</select> ';
            ?>
        </p>
        <h4> Danh sách các phòng còn trống</h4><br>
        <table border="1" cellspacing="0" id="emptyRooms">
            <tr>
                <td>STT</td>
                <td>Mã phòng</td>
                <td>Tên phòng</td>
                <td>Chức năng</td>
            </tr>
        </table>
        <table border="1" cellspacing="0" id="existedRooms">
            <h4> Danh sách các phòng đã thêm</h4>
            <tr>
                <td>STT</td>
                <td>Mã phòng</td>
                <td>Tên phòng</td>
                <td>Chức năng</td>
            </tr>
        </table>
        <p id="alert"></p>
    </form>
    <script>
        function popRooms() {
            var selectedHD = $("#hd").val();

            $.ajax({
                type: "GET",
                url: "3_1_getEmptyRooms.php",
                data: {
                    hd: selectedHD
                },
                success: function(data) {
                    $("#emptyRooms").html(data);
                }
            });
            $.ajax({
                type: "GET",
                url: "3_2_getexistedRooms.php",
                data: {
                    hd: selectedHD
                },
                success: function(data) {
                    $("#existedRooms").html(data);
                }
            });
        }

        function delRoom(roomid) {
            var selectedHD = $("#hd").val();

            $.ajax({
                type: "GET",
                url: "3_4_delRoom.php",
                data: {
                    roomid: roomid,
                    selectedHD: selectedHD
                },
                success: function(response) {
                    // Update the table after insert
                    popRooms();
                    // $("#alert").html(response);
                    alert(response);
                }
            });
        }

        function addRoom(roomid) {
            var selectedHD = $("#hd").val();

            $.ajax({
                type: "GET",
                url: "3_3_addRoom.php",
                data: {
                    roomid: roomid,
                    selectedHD: selectedHD
                },
                success: function(response) {
                    // Update the table after insert
                    popRooms();
                    // $("#alert").html(response);
                    alert(response);
                }
            });

        }
        $(document).ready(function() {

            popRooms();
            $(document).on('click', '.add_btn', function() {
                // Lấy mã phòng từ thuộc tính data-roomid
                var roomid = $(this).data('roomid');

                // Gọi hàm addRoom với mã phòng
                addRoom(roomid);
            });
            $(document).on('click', '.del_btn', function() {
                // Lấy mã phòng từ thuộc tính data-roomid
                var roomid = $(this).data('roomid');

                // Gọi hàm delRoom với mã phòng
                delRoom(roomid);
            });
        });
    </script>



</body>

</html>