<!DOCTYPE html>
<html>

<head>
    <title>
        Thêm tour du lịch
    </title>

</head>

<body>
    <form method="POST" action="">
        <table border="1" cellspacing="0">
            <tr>
                <td>Mã tour </td>
                <td><input type="input" name="ma"></td>
            </tr>
            <tr>
                <td>Tên tour </td>
                <td><input type="input" name="ten"></td>
            </tr>
            <tr>
                <td>Ngày khởi hành</td>
                <td><input type="date" name="startdate"></td>
            </tr>
            <tr>
                <td>Số ngày </td>
                <td><input type="input" name="day"></td>
            </tr>
            
            <tr>
                <td>Số đêm </td>
                <td><input type="input" name="night"></td>
            </tr>
            <tr>
                <td>Giá </td>
                <td><input type="input" name="cost"></td>
            </tr>
            <tr>
                <td align="center"><input type="Submit" value="Thêm" name="Submit"></td>
                
            </tr>
        </table>



    </form>


    <?php
    if (isset($_POST['Submit']) && ($_POST['Submit'] == "Thêm")) {
        include "connect.php";
        $ma= $_POST['ma'];
        $ten = $_POST['ten'];
        $startdate = Date($_POST['startdate']);
        $day=$_POST['day'];
        $night=$_POST['night'];
        $cost=$_POST['cost'];

        

        $str = "insert into TOUR values ('$ma','$ten','$startdate',$day,$night,$cost)";
        if ($connect->query($str) == true) {
            echo "Thêm thành công";
        } else {
            echo "Thêm không thành công". $connect->error;;
        }
        $connect->close();
    }

    ?>

</body>

</html>