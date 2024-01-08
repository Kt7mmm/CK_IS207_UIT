<!DOCTYPE html>
<html>

<head>
    <title>
        Thêm điểm du lịch
    </title>

</head>

<body>
    <form method="POST" action="">
        <table border="1" cellspacing="0" id="updateTour">
            <?php
                    include "connect.php";

            if (isset($_GET['maddl'])) {
                $maddl = $_GET['maddl'];

                $query = "SELECT MaDDL,TenDDL,MaTTP,Dactrung FROM DIEMDL WHERE MaDDL = '$maddl'";
                $result = $connect->query($query);

                // Kiểm tra và hiển thị kết quả
                if ($result) {
                    $row = $result->fetch_assoc();

                    // và các thông tin khác...
                } else {
                    echo 'Lỗi truy vấn cơ sở dữ liệu';
                }
            }
            ?>
            <tr>
                <td>Mã điểm du lịch </td>
                <td><input type="input" name="maddl" value="<?php echo $row['MaDDL']; ?>"></td>
            </tr>

            <tr>
                <td>Tên điểm du lịch </td>
                <td><input type="input" name="tenddl" value="<?php echo $row['TenDDL']; ?>"></td>
            </tr>
            <tr>
                <td>Tên thành phố </td>
                <td>
                    <?php
                    include "connect.php";
                    $query = "SELECT MaTTP,TenTTP FROM TINHTP";

                    $rs_ttp = $connect->query($query);

                    echo '<select id="ttp" name="ttp">';
                    while ($row_ttp = $rs_ttp->fetch_assoc()) {
                        $selected = '';
                        if ($row_ttp['MaTTP'] == $row['MaTTP']) {
                            $selected = 'selected';
                        }
                        echo '<option value="' . $row_ttp['MaTTP'] . '" ' . $selected . '>' . $row_ttp['TenTTP'] . '</option>';
                    }
                    echo '</select> ';
                    ?>
                </td>
            </tr>
            <tr>
                <td>Đặc trưng </td>
                <td><input type="input" name="dt" value="<?php echo $row['Dactrung']; ?>"></td>
            </tr>


            <tr>
                <td align="center"><input type="Submit" value="Update" name="Submit"></td>

            </tr>
        </table>



    </form>


    <?php

    if (isset($_POST['Submit']) && ($_POST['Submit'] == "Update")) {
        include "connect.php";
        $ttp = $_POST['ttp'];
        $maddl = $_POST['maddl'];

        $tenddl = $_POST['tenddl'];
        $dt = $_POST['dt'];



        $str = "update DIEMDL 
        set TenDDL='$tenddl', MaTTP='$ttp', Dactrung='$dt'
        where MaDDL='$maddl' ";
        if ($connect->query($str) == true) {
            echo "Cập nhật thành công";
        } else {
            echo "Cập nhật không thành công" . $connect->error;;
        }
        $connect->close();
    }

    ?>

</body>

</html>