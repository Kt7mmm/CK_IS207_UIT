<!DOCTYPE html>
<html>

<head>
    <title>
        Liệt kê điểm du lịch
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <table border="1" cellspacing="0" id="touristL">
        <tr>
            <td>STT</td>
            <td>Mã điểm du lịch</td>
            <td>Tên điểm du lịch</td>
            <td>Tên thành phố</td>
            <td>Đặc trưng</td>
            <td>Chức năng</td>

        </tr>
    </table>

    <script>
        function loadTouristSpot() {
            $.ajax({
                type: "GET",
                url: "3_1_getTouristSpot.php",
                data: {},
                success: function(data) {
                    $("#touristL").html(data);
                }
            });
        }

        function delTouristSpot(maddl) {

            $.ajax({
                type: "GET",
                url: "3_2_delTouristSpot.php",
                data: {
                    maddl: maddl
                },
                success: function(response) {
                    // Update the table after insert
                    loadTouristSpot();
                    // $("#alert").html(response);
                    alert(response);
                }
            });
        }

        function viewTouristSpot(maddl) {

            $.ajax({
                type: "GET",
                url: "3_3_viewTouristSpot.php",
                data: {
                    maddl: maddl
                },
                success: function(response) {
                    window.location.href = "3_3_viewTouristSpot.php?maddl="+maddl; // Chuyển đến 3_3_viewTouristSpot.php
                }
            });
        }
        $(document).ready(function() {
            loadTouristSpot();
            $(document).on('click', '.Del_btn', function() {

                var maddl = $(this).data('maddl');

                // Gọi hàm delRoom với mã phòng
                delTouristSpot(maddl);
            });
            $(document).on('click', '.View_btn', function() {

                var maddl = $(this).data('maddl');

                
                viewTouristSpot(maddl);
            });
        });
    </script>

</body>