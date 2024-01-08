<!DOCTYPE html>
<html>

<head>
    <title>
        Thông tin chi tiết công dân
    </title>

</head>

<body>
    <form method="POST" action="">
        <table border="1" cellspacing="0">
            <?php
            include "connect.php";

            if (isset($_GET['macongdan'])) {
                $macongdan = $_GET['macongdan'];

                $query = "SELECT MaCongDan,TenCongDan,GioiTinh,NamSinh,NuocVe,MaDiemCachLy 
                FROM CONGDAN WHERE MaCongDan = '$macongdan'";
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
                <td>Mã công dân </td>
                <td><input type="input" name="ma" value="<?php echo $row['MaCongDan']; ?>"></td>
            </tr>
            <tr>
                <td>Tên công dân </td>
                <td><input type="input" name="ten" value="<?php echo $row['TenCongDan']; ?>"></td>
            </tr>

            <tr>
                <td>Giới tính </td>

                <td>
                    <input type="checkbox" name="gender" <?php if ($row['GioiTinh'] == 1) echo 'checked'; ?>>
                </td>
                <p>Chọn tương ứng giới tính là nam</p>
            </tr>

            <tr>
                <td>Năm sinh </td>
                <td><input type="date" name="birth" value="<?php echo $row['NamSinh']; ?>"></td>
            </tr>
            <tr>
                <td>Nước về </td>
                <td><input type="input" name="country" value="<?php echo $row['NuocVe']; ?>"></td>
            </tr>
            <tr>
                <td>Tên điểm cách ly </td>
                <td>
                    <?php
                    include "connect.php";
                    $query = "SELECT MaDiemCachLy,TenDiemCachLy FROM DIEMCACHLY";

                    $rs_ttp = $connect->query($query);

                    echo '<select id="dcl" name="dcl">';
                    while ($row_ttp = $rs_ttp->fetch_assoc()) {
                        $selected = '';
                        if ($row_ttp['MaDiemCachLy'] == $row['MaDiemCachLy']) {
                            $selected = 'selected';
                        }
                        echo '<option value="' . $row_ttp['MaDiemCachLy'] . '" ' . $selected . '>' . $row_ttp['TenDiemCachLy'] . '</option>';
                    }
                    echo '</select> ';
                    ?>
                </td>
            </tr>
            <tr>
                <td align="center"><input type="Submit" value="Update" name="Submit"></td>

            </tr>
        </table>



    </form>


    <?php
    if (isset($_POST['Submit']) && ($_POST['Submit'] == "Update")) {
        include "connect.php";
        $ten = $_POST['ten'];
        $gender = isset($_POST['gender']) ? 1 : 0;
        $ma = $_POST['ma'];
        $birth = Date($_POST['birth']);
        $country = $_POST['country'];
        $madcl = $_POST['dcl'];

        $str = "UPDATE CONGDAN 
        SET TenCongDan='$ten',
        GioiTinh=$gender,
        NamSinh='$birth',
        NuocVe='$country',
        MaDiemCachLy='$madcl'
        WHERE MaCongDan='$ma'";
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