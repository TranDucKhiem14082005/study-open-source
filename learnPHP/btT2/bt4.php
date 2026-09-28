<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KẾT QUẢ THI ĐẠI HỌC</title>
</head>
<body>
    <?php
        $toan= "";
        $ly= "";
        $hoa= "";
        $diemChuan= "";
        $tongDiem= "";
        $ketQua= "";
        $thongBao= "";
        if(isset($_POST['kq'])) {
            $toan= $_POST['toan'];
            $ly= $_POST['ly'];
            $hoa= $_POST['hoa'];
            $diemChuan= $_POST['diemChuan'];
            if($toan != "" && $ly != "" && $hoa != "" && $diemChuan != "") {
                $thongBao= "";
                if(is_numeric($toan) && is_numeric($ly) && is_numeric($hoa) && is_numeric($diemChuan)) {
                    if($toan >= 0 && $ly >= 0 && $hoa >= 0 && $diemChuan >= 0) {
                        $tongDiem= $toan + $ly + $hoa;
                        if($tongDiem >= $diemChuan) {
                            $ketQua= "Đậu";
                        } else {
                            $ketQua= "Rớt";
                        }
                    } else {
                        $thongBao= "Điểm phải lớn hơn hoặc bằng 0!";
                    }
                } else {
                    $thongBao= "Điểm phải là số!";
                }
            } else {
                $thongBao= "Vui lòng nhập đầy đủ thông tin!";
            }
            
        }

    ?>
    <form method = "post" action = "bt4.php" style = "margin: auto; width: 400px; background-color: #eed9e1;">
        <table>
            <tr>
                <td colspan="2" 
                style=" text-align:center; background-color: #e65491; font-size:20px; color: #ffffff; width: 400px;  height: 30px; font-weight: bold;"> 
                    KẾT QUẢ THI ĐẠI HỌC
                </td>
            </tr>
            <tr>
                <td>
                    Toán: <input type="text" name="toan" value="<?php echo $toan; ?>" style=" width: 150px; margin-left: 100px;">
                </td>
            </tr>
            <tr>
                <td>
                    Lý: <input type="text" name="ly" value="<?php echo $ly; ?>" style=" width: 150px; margin-left: 114px;">
                </td>
            </tr>
            <tr>
                <td>
                    Hóa: <input type="text" name="hoa" value="<?php echo $hoa; ?>" style=" width: 150px; margin-left: 106px;">
                </td>
            </tr>
            <tr>
                <td>
                    Điểm chuẩn: <input type="text" name="diemChuan" value="<?php echo $diemChuan; ?>" style=" width: 150px; margin-left: 56px; color: #e06868;">
                </td>
            </tr>
            <tr>
                <td>
                    Tổng điểm: <input type="text" name="tongDiem" value="<?php echo $tongDiem; ?>" readonly style=" width: 150px; margin-left: 64px;">
                </td>
            </tr>
            <tr>
                <td>
                    Kết quả thi: <input type="text" name="ketQua" value="<?php echo $ketQua; ?>" readonly style=" width: 150px; margin-left: 62px;">
                </td>
            </tr>
            <tr >
                <td align = "center" colspan="2">
                    <button type = "submit" name = "kq" >Xem kết quả</button>
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