<!DOCTYPE html>
<html>

<head>
    <title>
        Liệt kê điểm du lịch đã đi qua
    </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    
<label>Số điểm du lịch đã đi qua</label>
        <input type='input' name='num'>
            
        
        <h4><span id="tnum"></span> điểm du lịch mà các tour đã đi qua</h4><br>
        <table border="1" cellspacing="0" id="tlist">
            <tr>
                <td>STT</td>
               
                <td>Tên tour</td>
                <td>Số điểm du lịch</td>
            </tr>
        </table>

</body>
<script>
    $(document).ready(function() {
        $('input[name="num"]').keydown(function(event) {
            if (event.keyCode === 9) { // Kiểm tra nếu là phím "Tab" (mã 9)
            event.preventDefault(); // Ngăn chặn hành vi mặc định của phím "Enter"
            loadTOUR();
        }
    });
    function loadTOUR (){
        var num=$('input[name="num"]').val();
        $.ajax({
            type: 'GET',
            url: '4_1_loadTOUR.php',
            data: { num: num },
            success: function(response) {
                $('#tlist').html(response);
                $('#tnum').text(num);
            }
        });
    }
});
</script>

</html>