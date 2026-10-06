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
        // $query = "SELECT DISTINCT khach_hang.* FROM khach_hang
        //         JOIN hoa_don ON khach_hang.Ma_khach_hang = hoa_don.Ma_khach_hang
        //         JOIN ct_hoadon ON ct_hoadon.So_hoa_don = hoa_don.So_hoa_don
        //         JOIN sua ON ct_hoadon.Ma_sua = sua.Ma_sua WHERE sua.Ma_sua = 'AB0001'";
        $query = "SELECT hs.Ten_hang_sua, hs.Dia_chi, hs.Dien_thoai FROM hang_sua hs";
        $result = mysqli_query($conn, $query);
        if(!$result){
            die("<b>Query thất bại: </b>" . mysqli_error($conn));
        }
        
    ?>
    <table align="center" style = "text-align:center">
        <tr>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
        </tr>
        <?php
        if(mysqli_num_rows($result) != 0){
            
            while($row = mysqli_fetch_array($result)) {
                // $socuoi = substr($row[4], -1);
                // if($socuoi % 2 != 0){
                    echo "<tr>";
                    for($i = 0; $i < mysqli_num_fields($result); $i++) {
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