<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập và tính trên dãy số</title>
</head>

<body>

    <?php

        $dayso = "";
        $Stong = "";
        $thongBao = "";

        if (isset($_POST['tongDaySo'])) {

            $dayso = $_POST['dayso'];

            if ($dayso == "") {

                $thongBao = "Vui lòng nhập dãy số!";

            } else {

                $mang = explode(",", $dayso);

                $sophantu = count($mang);

                $loi = false;

                for ($i = 0; $i < $sophantu; $i++) {

                    if (!is_numeric(trim($mang[$i]))) {

                        $loi = true;
                        break;
                    }
                }

                if ($loi == false) {

                    $Stong = 0;

                    for ($i = 0; $i < $sophantu; $i++) {

                        $Stong += $mang[$i];
                    }

                } else {

                    $thongBao = "Dãy số chỉ được nhập các số! và được cách nhau bằng dấu ','";
                    $Stong = "";
                }
            }
        }

    ?>

    <form name="tongdayso" method="post" action="tongdayso.php" style=" margin: auto; width: 400px; background-color: #e6f5f5; ">

        <table style="width: 400px; background-color: #c2cfcf;">

            <tr>
                <td colspan="2"
                    style=" text-align: center; background-color: #328888; color: white; font-size: 20px; font-weight: bold; font-style: italic; height: 40px;">
                    NHẬP VÀ TÍNH TRÊN DÃY SỐ
                </td>
            </tr>

            <tr>
                <td style=" width: 100px; padding-top: 8px; padding-bottom: 8px;">
                    Nhập dãy số:
                </td>

                <td>

                    <input type="text"name="dayso"value="<?php echo $dayso; ?>"style="width: 220px;">

                    <span style=" color: red; font-weight: bold;">
                        (*)
                    </span>

                </td>
            </tr>

            <tr>
                <td>

                    <button type="submit" name="tongDaySo" value="Tổng dãy số" style="background-color: #ffff66; border: 1px solid #cccc00; padding: 5px 20px; cursor: pointer ">
                        Tổng dãy số
                    </button>
                </td>
            </tr>

            <tr>
                <td style=" padding-top: 8px; padding-bottom: 8px;">
                    Tổng dãy số:
                </td>

                <td>

                    <input type="text" name="tong" value="<?php echo $Stong; ?>" readonly style=" width: 220px;background-color: #ccff66; border: 1px solid #b5d96b; ">

                </td>
            </tr>
       
            <tr>
                <td colspan="2"
                    style=" text-align: center; font-size: 13px; padding-top: 5px;">
                    <span style=" color: red; font-weight: bold;">
                        (*)
                    </span>
                     Các số được nhập cách nhau bằng dấu ","
                </td>
            </tr>   
            <tr>
                <td style="width: 100px; color: red;" colspan="2">
                    
                        <?php echo $thongBao; ?>
                  
                </td>
            </tr>
        </table>

    </form>

</body>
</html>