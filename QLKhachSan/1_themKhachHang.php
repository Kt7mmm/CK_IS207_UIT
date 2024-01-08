<!DOCTYPE html>
<html>

<head>
    <title>
        Thêm khách hàng
    </title>

</head>

<body>
    <form method="POST" action="">
        <table border="1" cellspacing="0">
            <tr>
                <td>Mã khách hàng </td>
                <td><input type="input" name="ma"></td>
            </tr>
            <tr>
                <td>Tên khách hàng </td>
                <td><input type="input" name="ten"></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><input type="phone" name="phone"></td>
            </tr>
            <tr>
                <td>Căn cước công dân </td>
                <td><input type="input" name="cccd"></td>
            </tr>
            
            
            <tr>
                <td align="center"><input type="Submit" value="Thêm" name="Submit"></td>
                
            </tr>
        </table>



    </form>


    <?php
    if (isset($_POST['Submit']) && ($_POST['Submit'] == "Thêm")) {
        include "connectQLKS.php";
        $ma= $_POST['ma'];
        $ten = $_POST['ten'];
        $phone = $_POST['phone'];
        $cccd=$_POST['cccd'];
        
        $str = "insert into KHACHHANG values ('$ma','$ten','$phone','$cccd')";
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