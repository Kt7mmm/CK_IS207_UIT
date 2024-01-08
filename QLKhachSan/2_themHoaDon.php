<!DOCTYPE html>
<html>

<head>
    <title>
        Thêm hóa đơn
    </title>

</head>

<body>
    <form method="POST" action="">
        <table border="1" cellspacing="0">
            
            <tr>
                <td>Tên khách hàng </td>
                <td>
                    <?php
                    include "connectQLKS.php";
                    $query="SELECT MAKH,TENKH FROM KHACHHANG";

                    $rs = $connect->query($query);

                    echo '<select id="kh" name="kh">';
                    while ($row=$rs->fetch_assoc()){
                        echo '<option value="'.$row['MAKH'].'">'.$row['TENKH'].'</option>';
                    }
                    echo '</select> ';
                    ?>
                </td>
            </tr>
            <tr>
                <td>Mã hóa đơn </td>
                <td><input type="input" name="ma"></td>
            </tr>
            <tr>
                <td>Tên hóa đơn </td>
                <td><input type="input" name="tenhd"></td>
            </tr>
            
            <tr>
                <td>Tổng tiền </td>
                <td><input type="input" name="money"></td>
            </tr>
            
            
            <tr>
                <td align="center"><input type="Submit" value="Thêm" name="Submit"></td>
                
            </tr>
        </table>



    </form>


    <?php
    if (isset($_POST['Submit']) && ($_POST['Submit'] == "Thêm")) {
        include "connectQLKS.php";
        $makh= $_POST['kh'];
        $tenhd = $_POST['tenhd'];
        $ma= $_POST['ma'];

        $tien = $_POST['money'];
        
        $str = "insert into HOADON values ('$ma','$tenhd','$makh','$tien')";
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