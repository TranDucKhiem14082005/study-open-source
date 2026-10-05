<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Hàm xuất mảng
        function xuat_mang($mang)
        {
            return implode(" ", $mang);
        }


        // Hàm thay thế giá trị trong mảng
        function thay_the($mang, $gia_tri_cu, $gia_tri_moi)
        {
            for ($i = 0; $i < count($mang); $i++) {

                if ($mang[$i] == $gia_tri_cu) {
                    $mang[$i] = $gia_tri_moi;
                }
            }

            return $mang;
        }


        // Khởi tạo biến
        $chuoi_mang = "";
        $gia_tri_cu = "";
        $gia_tri_moi = "";

        $mang_cu = [];
        $mang_moi = [];


        // Khi người dùng nhấn nút Thay thế
        if (isset($_POST['thay_the'])) {

            // Bước 1: Lấy dữ liệu từ form
            $chuoi_mang = $_POST['chuoi_mang'];
            $gia_tri_cu = $_POST['gia_tri_cu'];
            $gia_tri_moi = $_POST['gia_tri_moi'];


            // Bước 2: Kiểm tra dữ liệu rỗng
            if (
                trim($chuoi_mang) == "" ||
                trim($gia_tri_cu) == "" ||
                trim($gia_tri_moi) == ""
            ) {

                echo "<p style='text-align:center; color:red;'>
                        Vui lòng nhập đầy đủ thông tin!
                    </p>";

            } else {

                // Bước 3: Tách chuỗi thành mảng
                $mang_cu = explode(",", $chuoi_mang);


                // Bước 4: Xóa khoảng trắng thừa của từng phần tử
                for ($i = 0; $i < count($mang_cu); $i++) {
                    $mang_cu[$i] = trim($mang_cu[$i]);
                }


                // Bước 5: Gọi hàm thay thế
                $mang_moi = thay_the(
                    $mang_cu,
                    $gia_tri_cu,
                    $gia_tri_moi
                );
            }
        }

    ?>
    
    <form name= "thay_the" method = "post" action = "bt5.php">
        <table>
            <tr>
                <td>
                    THAY THẾ
                </td>
            </tr>
            <tr>
                <td>
                    Nhập các phần tử:
                </td>
                <td>
                    <input type = "text" name = "chuoi_mang" value = "<?php echo $chuoi_mang; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Giá trị cần thay thế:
                </td>
                <td>
                    <input type = "text" name = "gia_tri_cu" value = "<?php echo $gia_tri_cu; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Giá trị thay thế:
                </td>
                <td>
                    <input type = "text" name = "gia_tri_moi" value = "<?php echo $gia_tri_moi; ?>">
                </td>
            </tr>
            <tr>
                <td colspan = "2" style = "text-align: center;">
                    <input type = "submit" name = "thay_the" value = "Thay thế">
                </td>
            </tr>
            <tr>
                <td>
                    Mảng cũ:
                </td>
                <td>    
                    <input type = "text" value = "<?php echo xuat_mang($mang_cu); ?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    Mảng sau khi thay thế:
                </td>

                <td>
                    <input
                        type="text"
                        value="<?php echo xuat_mang($mang_moi); ?>"
                        readonly
                    >
                </td>
            </tr>


            <tr>
                <td colspan="2">
                    <span class="note">
                        (Ghi chú: Các phần tử trong mảng cách nhau bằng dấu ",")
                    </span>
                </td>
            </tr>
        </table>
    </form>

</body>
</html>