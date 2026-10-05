<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sắp xếp mảng</title>

    <style>
        body {
            font-family: Arial;
        }

        table {
            width: 650px;
            margin: 30px auto;
            border-collapse: collapse;
        }

        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        td:first-child {
            width: 180px;
            background-color: #d9e8e8;
        }

        input[type="text"] {
            width: 95%;
            padding: 6px;
        }

        input[readonly] {
            background-color: #d9f3f3;
        }

        .title {
            text-align: center;
            background-color: #399999;
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .button {
            text-align: center;
        }

        button {
            padding: 6px 25px;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

<?php

// ===============================
// 1. Hàm hoán vị hai phần tử
// ===============================
function hoan_vi(&$a, &$b)
{
    $tam = $a;
    $a = $b;
    $b = $tam;
}


// ===============================
// 2. Hàm sắp xếp tăng dần
// ===============================
function sap_tang($mang)
{
    for ($i = 0; $i < count($mang) - 1; $i++) {

        for ($j = $i + 1; $j < count($mang); $j++) {

            if ($mang[$i] > $mang[$j]) {

                hoan_vi($mang[$i], $mang[$j]);
            }
        }
    }

    return $mang;
}


// ===============================
// 3. Hàm sắp xếp giảm dần
// ===============================
function sap_giam($mang)
{
    for ($i = 0; $i < count($mang) - 1; $i++) {

        for ($j = $i + 1; $j < count($mang); $j++) {

            if ($mang[$i] < $mang[$j]) {

                hoan_vi($mang[$i], $mang[$j]);
            }
        }
    }

    return $mang;
}


// ===============================
// 4. Hàm xuất mảng
// ===============================
function xuat_mang($mang)
{
    return implode(", ", $mang);
}


// ===============================
// 5. Khởi tạo biến
// ===============================
$chuoi_mang = "";
$mang_tang = [];
$mang_giam = [];
$thong_bao = "";


// ===============================
// 6. Khi nhấn nút Sắp xếp
// ===============================
if (isset($_POST['sap_xep'])) {

    // Lấy chuỗi mảng người dùng nhập
    $chuoi_mang = $_POST['chuoi_mang'];


    // Kiểm tra người dùng có nhập hay không
    if (trim($chuoi_mang) == "") {

        $thong_bao = "Vui lòng nhập mảng!";

    } else {

        // Tách chuỗi thành mảng
        $mang = explode(",", $chuoi_mang);


        // Kiểm tra từng phần tử có phải số không
        $hop_le = true;

        for ($i = 0; $i < count($mang); $i++) {

            // Xóa khoảng trắng
            $mang[$i] = trim($mang[$i]);


            // Nếu phần tử rỗng
            if ($mang[$i] == "") {

                $hop_le = false;
                $thong_bao = "Các phần tử phải được ngăn cách bằng dấu phẩy!";
                break;
            }


            // Nếu không phải số
            if (!is_numeric($mang[$i])) {

                $hop_le = false;
                $thong_bao = "Mảng chỉ được nhập số!";
                break;
            }
        }


        // Nếu mảng hợp lệ thì sắp xếp
        if ($hop_le) {

            $mang_tang = sap_tang($mang);

            $mang_giam = sap_giam($mang);
        }
    }
}

?>

<form name="sap_xep" method="post" action="bt6.php">

    <table>

        <tr>
            <td colspan="2" class="title">
                SẮP XẾP MẢNG
            </td>
        </tr>


        <tr>
            <td>
                Nhập mảng:
            </td>

            <td>
                <input
                    type="text"
                    name="chuoi_mang"
                    value="<?php echo $chuoi_mang; ?>"
                    placeholder="Ví dụ: 3, 1, 7, 4, 8"
                >
            </td>
        </tr>


        <?php if ($thong_bao != "") { ?>

            <tr>
                <td colspan="2">
                    <span class="error">
                        <?php echo $thong_bao; ?>
                    </span>
                </td>
            </tr>

        <?php } ?>


        <tr>
            <td colspan="2" class="button">

                <button type="submit" name="sap_xep">
                    Sắp xếp tăng/giảm
                </button>

            </td>
        </tr>


        <tr>
            <td>
                Tăng dần:
            </td>

            <td>
                <input
                    type="text"
                    value="<?php echo xuat_mang($mang_tang); ?>"
                    readonly
                >
            </td>
        </tr>


        <tr>
            <td>
                Giảm dần:
            </td>

            <td>
                <input
                    type="text"
                    value="<?php echo xuat_mang($mang_giam); ?>"
                    readonly
                >
            </td>
        </tr>


        <tr>
            <td colspan="2">
                <span style="color: red;">
                    (*) Các số được nhập cách nhau bằng dấu ","
                </span>
            </td>
        </tr>

    </table>

</form>

</body>

</html>