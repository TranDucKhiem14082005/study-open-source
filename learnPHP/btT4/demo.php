<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    
    <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quanly_ban_sua";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("<b>Kết nối thất bại: </b>" . mysqli_connect_error());
        }
        if($conn) {
            echo "<br> <b>Kết nối thành công </b> <br>";
        }
        // $query = "SELECT * FROM khach_hang WHERE RIGHT(Dien_thoai,1 ) % 2 != 0"; 
        $query = "SELECT DISTINCT khach_hang.* FROM khach_hang
                JOIN hoa_don ON khach_hang.Ma_khach_hang = hoa_don.Ma_khach_hang
                JOIN ct_hoadon ON ct_hoadon.So_hoa_don = hoa_don.So_hoa_don
                JOIN sua ON ct_hoadon.Ma_sua = sua.Ma_sua WHERE sua.Ma_sua = 'AB0001'";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("<b>Query thất bại: </b>" . mysqli_error($conn));
        }
        
    ?>
    <table align="center" style = "text-align:center">
        <tr>
            <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
        </tr>
        <?php
        if(mysqli_num_rows($result) != 0){
            
            while($row = mysqli_fetch_array($result)) {
                // $socuoi = substr($row[4], -1);
                // if($socuoi % 2 != 0){
                    echo "<tr>";
                    for($i = 0; $i < mysqli_num_fields($result); $i++) {
                        if($i == 2) {
                            if($row[$i] == 0){
                                echo "<td>Nam</td>";
                            } else {
                                echo "<td>Nữ</td>";
                            }
                        }
                        else
                            echo "<td>" . $row[$i] . "</td>";
                    }
                
                    echo "</tr>";
                // }
            }
        }
            mysqli_free_result ( $result );
            mysqli_close ( $conn );
        ?>
    </table>

</body>
</html>