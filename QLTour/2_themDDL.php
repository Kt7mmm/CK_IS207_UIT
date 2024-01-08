<!DOCTYPE html>
<html>

<head>
    <title>
        Thêm điểm du lịch
    </title>

</head>

<body>
    <form method="POST" action="">
        <table border="1" cellspacing="0">
        <tr>
                <td>Tên thành phố </td>
                <td>
                <?php
                    include "connect.php";
                    $query="SELECT MaTTP,TenTTP FROM TINHTP";

                    $rs = $connect->query($query);

                    echo '<select id="ttp" name="ttp">';
                    while ($row=$rs->fetch_assoc()){
                        echo '<option value="'.$row['MaTTP'].'">'.$row['TenTTP'].'</option>';
                    }
                    echo '</select> ';
                    ?>
                </td>
            </tr>
            <tr>
                <td>Mã điểm du lịch </td>
                <td><input type="input" name="maddl"></td>
            </tr>
            
            <tr>
                <td>Tên điểm du lịch </td>
                <td><input type="input" name="tenddl"></td>
            </tr>
            <tr>
                <td>Đặc trưng </td>
                <td><input type="input" name="dt"></td>
            </tr>
            
            
            <tr>
                <td align="center"><input type="Submit" value="Thêm" name="Submit"></td>
                
            </tr>
        </table>



    </form>


    <?php
    if (isset($_POST['Submit']) && ($_POST['Submit'] == "Thêm")) {
        include "connect.php";
        $ttp= $_POST['ttp'];
        $maddl = $_POST['maddl'];
       
        $tenddl=$_POST['tenddl'];
        $dt=$_POST['dt'];

        

        $str = "insert into DIEMDL values ('$maddl','$tenddl','$ttp','$dt')";
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