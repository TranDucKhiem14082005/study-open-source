<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
</head>

<body>

    <?php

        function tim_kiem($mang, $so_can_tim)
        {
            for ($i = 0; $i < count($mang); $i++) {

                if ($mang[$i] == $so_can_tim) {
                    return $i;
                }
            }

            return -1;
        }

        $chuoi_mang = "";
        $mang = [];
        $so_can_tim = "";
        $ket_qua = "";


        if (isset($_POST['tim_kiem'])) {

            // Bước 1: Lấy dữ liệu từ form
            $chuoi_mang = $_POST['chuoi_mang'];
            $so_can_tim = $_POST['so_can_tim'];
            if(trim($chuoi_mang) == "" || trim($so_can_tim) == ""){
                $ket_qua = "Vui lòng nhập đầy đủ thông tin!";
            } else if (!is_numeric($so_can_tim)) {
                $ket_qua = "Vui lòng nhập số hợp lệ để tìm kiếm!";
            } else {
                $mang = explode(",", $chuoi_mang);
                $hople = true;
                for($i = 0; $i < count($mang); $i++) {
                    if(!is_numeric(trim($mang[$i]))){
                        $hople = false;
                        break;
                    }
                }
                if(!$hople){
                    $ket_qua = "Vui lòng nhập mảng hợp lệ (chỉ chứa số)!";
                } else {
                    $vi_tri = tim_kiem($mang, $so_can_tim);
                    if($vi_tri != -1) {
                        $ket_qua = "Đã tìm thấy " . $so_can_tim . " tại vị trí thứ " . ($vi_tri + 1) . " của mảng";
                    } else {
                        $ket_qua = "Không tìm thấy " . $so_can_tim . " trong mảng";
                    }
                }
            }
        }

    ?>

    <form name="tim_kiem" method="post" action="bt4.php"  style="width: 500px; margin: 0 auto;">

        <table align="center" style="width: 100%; background-color: #c1cece;">

            <tr>
                <td colspan="2" style=" text-align: center; font-size: 20px; font-weight: bold; color: #ffffff; background-color: #3f9e9e; height: 40px;">
                    TÌM KIẾM
                </td>
            </tr>
    
            <tr>
                <td>
                    Nhập mảng:
                </td>

                <td>
                    <input type="text" name="chuoi_mang" value="<?php echo $chuoi_mang; ?>" style="width: 300px">
                </td>
            </tr>

            <tr>
                <td>
                    Nhập số cần tìm:
                </td>

                <td>
                    <input type="text" name="so_can_tim" value="<?php echo $so_can_tim; ?>" style="width: 100px">
                </td>
            </tr>

            <tr>
                <td align="center" colspan="2">
                    <button type="submit" name="tim_kiem" style = "background-color: #aad3e4; color: #19729b;"> Tìm kiếm
                    </button>
                </td>
            </tr>

            <tr>
                <td>
                    Mảng:
                </td>
                <td>
                    <input type="text" value="<?php echo implode(", ", $mang); ?>" readonly style="width: 300px">
                </td>
            </tr>

            <tr>
                <td>
                    Kết quả tìm thấy:
                </td>

                <td >
                    <input type="text" value="<?php echo $ket_qua; ?>" readonly style="width: 300px; color: red; background-color: #b8f1f3" >
                </td>
            </tr>

            <tr>
                <td colspan="2" style=" text-align: center; color: black; background-color: #a8e7e7">
                    <span>
                        (Các phần tử trong mảng cách nhau bằng dấu ",")
                    </span>
                </td>
            </tr>

        </table>

    </form>

</body>
</html>