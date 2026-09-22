<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Chu Vi Và Diện Tích Hình Tròn</title>
  
</head>

<body>

    <?php
        define('PI', 3.14);
        $ban_kinh = "";
        $chuVi = "";
        $dienTich = "";

        $thongBao = "";

    
        if (isset($_POST["tinh"])) {

            $ban_kinh = $_POST["ban_kinh"];
            
            if ($ban_kinh != "") {

                if (is_numeric($ban_kinh)) {

                    if($ban_kinh > 0) {
                        $chuVi = 2 * PI * $ban_kinh;
                        $dienTich = PI * $ban_kinh * $ban_kinh;
                    } else {
                        $thongBao = "Bán kính phải lớn hơn 0!";
                    }

                } else {
                    $thongBao = "Bán kính phải là số!";
                }

            } else {
                $thongBao = "Vui lòng nhập bán kính!";
            }
        }
    ?>

    <form name="tinhdientich"
    method="post" action="bt2.php" style="margin:auto; width:300px; background-color: #dddf95;">

        <table>
        
                <tr>
                    <td colspan="2"
                        style=" text-align:center; background-color: #e7ad6b; font-size:20px; color: #aa5151; width: 300px;  height: 50px; font-weight: bold;">
                        DIỆN TÍCH và CHU VI <br>
                        HÌNH TRÒN
                    </td>
                </tr>
        
            

                <tr >
                    <td>
                        Bán kính:
                        <input type="text"
                            name="ban_kinh" style="width: 150px; margin-left: 37px"
                            value="<?php echo $ban_kinh; ?>">
                    </td>
                </tr>

                <tr >
                    <td>
                        Diện tích:
                        <input type="text"
                            name="dientich"
                            value="<?php echo $dienTich; ?>"
                            readonly style="background-color: #bb8f8f; color: #b13131; width: 150px; margin-left: 36px;">
                            
                    </td>
                </tr>

                <tr >
                    <td>
                        Chu vi:
                        <input type="text"
                            name="chuvi"
                            value="<?php echo $chuVi; ?>"
                            readonly style="background-color: #bb8f8f; color: #b13131; width: 150px; margin-left: 52px;">
                            
                    </td>
                </tr>

                <tr >
                    <td align="center">
                        <input type="submit" name="tinh" value="Tính"></input>
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