<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền Karaoke</title>
</head>
<body>

    <?php
        $giobatdau = "";
        $gioketthuc = "";
        $tienthanhtoan = "";
        $thongBao = "";

        if (isset($_POST['tinh'])) {

    $giobatdau = $_POST['giobatdau'];
    $gioketthuc = $_POST['gioketthuc'];

    if ($giobatdau == "" || $gioketthuc == "") {

        $thongBao = "Vui lòng nhập đầy đủ thông tin!";

    
    } else if (!is_numeric($giobatdau) || !is_numeric($gioketthuc)) {

        $thongBao = "Giờ bắt đầu và giờ kết thúc phải là số!";

  
    } else if ($giobatdau < 0 || $gioketthuc < 0) {

        $thongBao = "Giờ bắt đầu và giờ kết thúc phải lớn hơn hoặc bằng 0!";

    
    } else if ($gioketthuc <= $giobatdau) {

        $thongBao = "Giờ kết thúc phải lớn hơn giờ bắt đầu!";

    
    } else if ($giobatdau < 10 || $gioketthuc > 24) {

        $thongBao = "Giờ hoạt động của quán là từ 10h đến 24h, vui lòng nhập lại!";

  
    } else {

        if ($giobatdau >= 10 && $gioketthuc <= 17) {

            $tienthanhtoan = ($gioketthuc - $giobatdau) * 20000;

        } else if ($giobatdau >= 17 && $gioketthuc <= 24) {

            $tienthanhtoan = ($gioketthuc - $giobatdau) * 40000;

        } else if ($giobatdau < 17 && $gioketthuc > 17) {

            $tienthanhtoan =
                (17 - $giobatdau) * 20000
                + ($gioketthuc - 17) * 40000;
        }
    }
}
       
    ?>

    <form name="tinhtienkaraoke"
    method="post" action="bt5.php" style="margin:auto; width:400px; background-color: #1cabad;">

        <table>
                <tr>
                    <td colspan="2"
                        style=" text-align:center; background-color: #177e80; font-size:20px; color: #ffffff; width: 400px;  height: 50px; font-weight: bold;">
                        TÍNH TIỀN KARAOKE
                    </td>
                </tr>
        
            

                <tr >
                    <td>
                        Giờ bắt đầu:
                        <input type="text"
                            name="giobatdau" style="width: 150px; margin-left: 76px"
                            value="<?php echo $giobatdau; ?>"> (h)
                    </td>
                </tr>

                <tr >
                    <td>
                        Giờ kết thúc:
                        <input type="text"
                            name="gioketthuc"
                            value="<?php echo $gioketthuc; ?>"
                             style="background-color: #ffffff; color: #b13131; width: 150px; margin-left: 72px;"> (h)
                            
                    </td>
                </tr>

                <tr >
                    <td>
                        Tiền thanh toán:
                        <input type="text"
                            name="tienthanhtoan"
                            value="<?php echo $tienthanhtoan; ?>"
                            readonly style="background-color: #ebf8a3; color: #b13131; width: 150px; margin-left: 52px;"> (VNĐ)
                            
                    </td>
                </tr>

                <tr >
                    <td align="center">
                        <button type="submit" name="tinh" value="Tính">Tính tiền</button>
                    </td>
                </tr>

                <tr>
                    <td>
                        <?php echo $thongBao; ?>
                    </td>
                </tr>
            
            
        </table>
    </form>
</body>
</html>