<!DOCTYPE html>
<html>

<head>
    <title>
        Liệt kê khách hàng
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    
<label>Số lượng khách hàng</label>
        <input type='input' name='num'>
            
        
        <h4><span id="cusnum"></span> khách hàng có số tiền thuê nhiều nhất</h4><br>
        <table border="1" cellspacing="0" id="customersList">
            <tr>
                <td>STT</td>
                <td>Mã khách hàng</td>
                <td>Tên khách hàng</td>
                <td>Tổng tiền thuê</td>
            </tr>
        </table>

</body>
<script>
    $(document).ready(function() {
    $('input[name="num"]').keyup(function(event) {
        if (event.key === "Enter") { // Kiểm tra nếu là phím "Enter"
            event.preventDefault(); // Ngăn chặn hành vi mặc định của phím "Enter"
            loadCustomers();
        }
    });
    function loadCustomers (){
        var num=$('input[name="num"]').val();
        $.ajax({
            type: 'GET',
            url: '4_load_customer.php',
            data: { num: num },
            success: function(response) {
                $('#customersList').html(response);
                $('#cusnum').text(num);
            }
        });
    }
});
</script>

</html>