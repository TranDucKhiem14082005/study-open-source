
   

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Phát sinh mảng và tính toán</title>
</head>

<body>

     <?php

        function tao_mang($n)
        {
            $mang = [];

            for ($i = 0; $i < $n; $i++) {
                $mang[] = rand(0, 20);
            }

            return $mang;
        }


        function xuat_mang($mang)
        {
            return implode(" ", $mang);
        }


        function tinh_tong($mang)
        {
            $tong = 0;

            for ($i = 0; $i < count($mang); $i++) {
                $tong += $mang[$i];
            }

            return $tong;
        }


        function tim_min($mang)
        {
            $min = $mang[0];

            for ($i = 1; $i < count($mang); $i++) {

                if ($mang[$i] < $min) {
                    $min = $mang[$i];
                }
            }

            return $min;
        }


        function tim_max($mang)
        {
            $max = $mang[0];

            for ($i = 1; $i < count($mang); $i++) {

                if ($mang[$i] > $max) {
                    $max = $mang[$i];
                }
            }

            return $max;
        }

        $n = "";
        $mang = "";
        $max = "";
        $min = "";
        $tong = "";


        if (isset($_POST['phatSinh'])) {

            $n = $_POST['n'];

            if ($n == "") {

                $thongBao = "Vui lòng nhập số phần tử!";

            } else if (!is_numeric($n) || $n <= 0 || floor($n) != $n) {

                $thongBao = "Số phần tử phải là số nguyên dương!";

            } else {

                $mang = tao_mang($n);

                $mang = xuat_mang($mang);

                $mang_tinh = explode(" ", $mang);

                $tong = tinh_tong($mang_tinh);

                $max = tim_max($mang_tinh);

                $min = tim_min($mang_tinh);
            }
        }

    ?>
    <form name="mangphatsinhtinhtoan" method="post" action="bt3.php" style=" margin: auto; width: 500px; background-color: #ffe6f5;">

        <table style="width: 500px; border: 2px solid #000000">
            <tr>
                <td colspan="2"
                    style=" text-align: center; background-color: #b00070; color: white; font-size: 20px; font-weight: bold; font-style: italic; height: 40px;">
                    PHÁT SINH MẢNG VÀ TÍNH TOÁN
                </td>
            </tr>

            <tr>
                <td style=" width: 130px;">
                    Nhập số phần tử:
                </td>
                <td>
                    <input type="text" name="n" value="<?php echo $n; ?>" style="width: 180px;">
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <button type="submit"
                        name="phatSinh"
                        style="width: 200px; margin-left: 110px; background-color: #ffff99; border: 1px solid #cccc00; cursor: pointer;">
                        Phát sinh và tính toán
                    </button>
                </td>
            </tr>
 
            <tr>
                <td style=" padding-top: 8px; padding-bottom: 8px;">
                    Mảng:
                </td>
                <td>
                    <input type="text"
                        value="<?php echo $mang; ?>"
                        readonly
                        style=" width: 220px; background-color: #ff9999; border: 1px solid #cc7777;">
                </td>
            </tr>

            <tr>
                <td style = "width: 200px">
                    GTLN (MAX) trong mảng:
                </td>
                <td>
                    <input type="text"
                        value="<?php echo $max; ?>"
                        readonly
                        style=" width: 100px; background-color: #ff9999; border: 1px solid #cc7777;">
                </td>
            </tr>

            <tr>
                <td>
                    GTNN (MIN) trong mảng:
                </td>
                <td>
                    <input type="text"
                        value="<?php echo $min; ?>"
                        readonly
                        style=" width: 100px; background-color: #ff9999; border: 1px solid #cc7777;">
                </td>
            </tr>

            <tr>

                <td>
                    Tổng mảng:
                </td>
                <td>
                    <input type="text"
                        value="<?php echo $tong; ?>"
                        readonly
                        style=" width: 100px; background-color: #ff9999; border: 1px solid #cc7777; ">
                </td>

            </tr>

            <tr>
                <td colspan="2" 
                    style=" text-align: center; font-size: 13px; padding-top: 5px;"> 
                    (
                    <span style=" color: red; font-weight: bold;">
                        Ghi chú:
                    </span>
                     Các phần tử mảng sẽ có giá trị từ 0 đến 20)
                </td>
            </tr>   

            <tr>

                <td colspan="2"
                    style=" color: #990000; font-size: 13px; padding-top: 5px;">
                    <?php echo $thongBao ?? ""; ?>
                </td>

            </tr>

        </table>

    </form>
</body>
</html>