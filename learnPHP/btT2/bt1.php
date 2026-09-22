<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính diện tích</title>
    
</head>

<body>

<?php
    $chieuDai = "";
    $chieuRong = "";
    $dienTich = "";
    $thongBao = "";

   
    if (isset($_POST["tinh"])) {

      
        $chieuDai = $_POST["chieudai"];
        $chieuRong = $_POST["chieurong"];

        
        if ($chieuDai != "" && $chieuRong != "") {

            if (is_numeric($chieuDai) && is_numeric($chieuRong)) {

                if($chieuDai > 0 && $chieuRong > 0) {
                    if ($chieuDai > $chieuRong) {
                        $dienTich = $chieuDai * $chieuRong;
                    } else {
                        $thongBao = "Chiều dài phải lớn hơn chiều rộng!";
                    }
                } else {
                    $thongBao = "Chiều dài và chiều rộng phải lớn hơn 0!";
                }

            } else {
                $thongBao = "Chiều dài và chiều rộng phải là số!";
            }

        } else {
            $thongBao = "Vui lòng nhập đầy đủ chiều dài và chiều rộng!";
        }
    }
?>

<form name="tinhdientich"
 method="post" action="bt1.php" style="margin:auto; width:300px; background-color: #dddf95;">

    <table>
     
            <tr>
                <td colspan="2"
                    style=" text-align:center; background-color: #e7ad6b; font-size:20px; color: #aa5151; width: 300px;  height: 50px; font-weight: bold;">
                    DIỆN TÍCH HÌNH CHỮ NHẬT
                </td>
            </tr>
    
        

            <tr >
                <td>
                    Chiều dài:
                    <input type="text"
                        name="chieudai" style="width: 150px; margin-left: 37px"
                        value="<?php echo $chieuDai; ?>">
                </td>
            </tr>

            <tr >
                <td>
                    Chiều rộng:
                    <input type="text"
                        name="chieurong" style = "width: 150px; margin-left: 28px;"
                        value="<?php echo $chieuRong; ?>">
                </td>
            </tr>

            <tr >
                <td>
                    Diện tích:
                    <input type="text"
                        name="dientich"
                        value="<?php echo $dienTich; ?>"
                        readonly style="background-color: #bb8f8f; color: #b13131; width: 150px; margin-left: 40px;">
                        
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