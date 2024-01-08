<!DOCTYPE html>
<html>

<head>
    <title>
        Liệt kê triệu chứng
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    
                <p>Tên điểm cách ly </p>
                
                    <?php
                    include "connect.php";
                    $query="SELECT MaDiemCachLy,TenDiemCachLy FROM DIEMCACHLY";

                    $rs = $connect->query($query);

                    echo '<select id="dcl" name="dcl" onchange="loadCitizen();">';
                    while ($row=$rs->fetch_assoc()){
                        echo '<option value="'.$row['MaDiemCachLy'].'">'.$row['TenDiemCachLy'].'</option>';
                    }
                    echo '</select> ';
                    ?>
               
<br>
<label>Tên công dân</label>
<select id="macd" name="macd" onchange="loadSymptoms()">
</select>

        <h4> Danh sách các triệu chứng</h4><br>
        <table border="1" cellspacing="0" id="sympList">
            <tr>
                <td>STT</td>
                <td>Mã triệu chứng</td>
                <td>Tên triệu chứng</td>
            </tr>
        </table>

</body>
<script>
    function loadCitizen(){
        var MADCL = $("#dcl").val();
        $.ajax({
            type: 'GET',
            url: '5_1_loadCitizen.php',
            data: { MADCL: MADCL },
            success: function(response) {
                $('#macd').html(response);            }
        });
    }
    function loadSymptoms(){
        var MACD = $("#macd").val();

        $.ajax({
            type: 'GET',
            url: '5_2_loadSymptoms.php',
            data: { MACD: MACD },
            success: function(response) {
                $('#sympList').html(response);            }
        });
    }
    $(document).ready(function() {

        loadCitizen();
        loadSymptoms();
});
</script>

</html>