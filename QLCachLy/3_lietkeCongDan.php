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
    <table border="1" cellspacing="0" id="citizenL">
        <tr>
            <td>STT</td>
            <td>Tên công dân</td>
            <td>Giới tính</td>
            <td>Năm sinh</td>
            <td>Nước về </td>
            <td>Chức năng</td>

        </tr>
    </table>

    <script>
        function loadCitizen() {
            $.ajax({
                type: "GET",
                url: "3_1_getCitizen.php",
                data: {},
                success: function(data) {
                    $("#citizenL").html(data);
                }
            });
        }

        function delCitizen(macd) {

            $.ajax({
                type: "GET",
                url: "3_2_delCitizen.php",
                data: {
                    macd: macd
                },
                success: function(response) {
                    // Update the table after insert
                    loadCitizen();
                    // $("#alert").html(response);
                    alert(response);
                }
            });
        }

        // function viewCitizen(macd) {

        //     $.ajax({
        //         type: "GET",
        //         url: "3_3_viewCitizen.php",
        //         data: {
        //             macd: macd
        //         },
        //         success: function(response) {
        //             window.location.href = "3_3_viewCitizen.phpp?macd=" + macd;
        //         }
        //     });
        // }
        $(document).ready(function() {
            loadCitizen();
            $(document).on('click', '.Del_btn', function() {

                var macd = $(this).data('macd');

                delCitizen(macd);
            });
            // $(document).on('click', '.View_btn', function() {

            //     var macd = $(this).data('macd');


            //     viewCitizen(macd);
            // });
        });
    </script>

</body>