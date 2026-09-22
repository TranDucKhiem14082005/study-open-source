<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THANH TOÁN TIỀN ĐIỆN</title>
</head>
<body>

    <?php
        $tenChuHo = ""; 
        $chiSoCu = "";  
        $chiSoMoi = "";
        $donGia = "20000";
        $soTienThanhToan = "";
        $thongBao = "";
        
        if(isset($_POST['tinh'])) {
            $tenChuHo = $_POST['tenChuHo'];
            $chiSoCu = $_POST['chiSoCu'];
            $chiSoMoi = $_POST['chiSoMoi'];
            $donGia = $_POST['donGia'];
            $soTienThanhToan = $_POST['soTienThanhToan'];
        

            if($tenChuHo != "" && $chiSoCu != "" && $chiSoMoi != "" && $donGia != "") {
                    if(is_numeric($chiSoCu) && is_numeric($chiSoMoi) && is_numeric($donGia)) {
                        if(is_numeric($tenChuHo)) {
                        $thongBao = "Tên chủ hộ phải là chữ!";
                        } else {
                        $thongBao = "$tenChuHo";
                        }
                        if($chiSoCu >= 0 && $chiSoMoi >= 0 && $donGia > 0) {
                            if($chiSoMoi > $chiSoCu) {
                                $soTienThanhToan = ($chiSoMoi - $chiSoCu) * $donGia;
                            } else {
                                $thongBao = "Chỉ số mới phải lớn hơn chỉ số cũ!";
                            }
                            } else {
                                $thongBao = "Chỉ số cũ, chỉ số mới và đơn giá phải lớn hơn hoặc bằng 0!";
                            }
                        } else {
                            $thongBao = "Chỉ số cũ, chỉ số mới và đơn giá phải là số!";
                        }   
            } else {
                $thongBao = "Hãy nhập đầy đủ thông tin";
            }
        }

    ?>

     <form name="tinhtendien" method="post" action="bt3.php" style="margin:auto; width:500px; background-color: #dddf95;" >
 
        <table>
        
                <tr>
                    <td colspan="2"
                        style=" text-align:center; background-color: #e7ad6b; font-size:20px; color: #aa5151; width: 500px;  height: 30px; font-weight: bold;">
                        THANH TOÁN TIỀN ĐIỆN
                    </td>
                </tr>
        
                <tr >
                    <td >Tên chủ hộ: <input type="text" name="tenChuHo" style="width: 150px; margin-left: 96px"    value="<?php echo $tenChuHo; ?>">
                    </td>
                </tr>

                <tr >
                    <td>Chỉ số cũ: <input type="text"    name="chiSoCu"    value="<?php echo $chiSoCu; ?>"     style=" width: 150px; margin-left: 106px;"> (Kw)    
                    </td>
                </tr>

                <tr >
                    <td>Chỉ số mới
                        <input type="text"    name="chiSoMoi"    value="<?php echo $chiSoMoi; ?>"  style=" width: 150px; margin-left: 100px;"> (Kw)    
                    </td>
                </tr>
                
                <tr >
                    <td>
                        Đơn giá: 
                        <input type="text" name="donGia" value="<?php echo $donGia; ?>" style=" width: 150px; margin-left: 116px;"> (VNĐ)</td>
                </tr>

                <tr >
                    <td>Số tiền thanh toán: 
                        <input type="text" name="soTienThanhToan"    value="<?php echo $soTienThanhToan; ?>"  readonly style="background-color: #bb8f8f; color: #b13131; width: 150px; margin-left: 52px;"> (VNĐ)    
                    </td>
                </tr>

                <tr >
                    <td align="center">
                        <button type="submit" name="tinh" value="Tính">Tính</button>
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