<!DOCTYPE html>
<html>

<head>
    <title>
        Thêm công dân
    </title>

</head>

<body>
    <form method="POST" action="">
        <table border="1" cellspacing="0">
            
            
            <tr>
                <td>Mã công dân </td>
                <td><input type="input" name="ma"></td>
            </tr>
            <tr>
                <td>Tên công dân </td>
                <td><input type="input" name="ten"></td>
            </tr>
            
            <tr>
                <td>Giới tính </td>
                <td><input type="checkbox" name="gender"></td>
                <p>Chọn tương ứng giới tính là nam</p>
            </tr>
            
            <tr>
                <td>Năm sinh </td>
                <td><input type="date" name="birth"></td>
            </tr>
            <tr>
                <td>Nước về </td>
                <td><input type="input" name="country"></td>
            </tr>
            <tr>
                <td>Tên điểm cách ly </td>
                <td>
                    <?php
                    include "connect.php";
                    $query="SELECT MaDiemCachLy,TenDiemCachLy FROM DIEMCACHLY";

                    $rs = $connect->query($query);

                    echo '<select id="dcl" name="dcl">';
                    while ($row=$rs->fetch_assoc()){
                        echo '<option value="'.$row['MaDiemCachLy'].'">'.$row['TenDiemCachLy'].'</option>';
                    }
                    echo '</select> ';
                    ?>
                </td>
            </tr>
            <tr>
                <td align="center"><input type="Submit" value="Thêm" name="Submit"></td>
                
            </tr>
        </table>



    </form>


    <?php
    if (isset($_POST['Submit']) && ($_POST['Submit'] == "Thêm")) {
        include "connect.php";
        $ten= $_POST['ten'];
        $gender = isset($_POST['gender']) ? 1 : 0;        
        $ma= $_POST['ma'];
        $birth = Date($_POST['birth']);
        $country = $_POST['country'];
        $madcl = $_POST['dcl'];
        
        $str = "insert into CONGDAN values ('$ma','$ten','$gender','$birth','$country','$madcl')";
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