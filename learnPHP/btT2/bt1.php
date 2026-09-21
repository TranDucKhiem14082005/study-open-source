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

    // Kiểm tra người dùng có bấm nút Tính hay chưa
    if (isset($_GET["tinh"])) {

        // Lấy dữ liệu người dùng nhập
        $chieuDai = $_GET["chieudai"];
        $chieuRong = $_GET["chieurong"];

        // Kiểm tra hai ô có dữ liệu và dữ liệu có phải là số không
        if ($chieuDai != "" && $chieuRong != "") {

            if (is_numeric($chieuDai) && is_numeric($chieuRong)) {

                // Thực hiện tính toán
                $dienTich = $chieuDai * $chieuRong;

            } else {
                $thongBao = "Chiều dài và chiều rộng phải là số!";
            }

        } else {
            $thongBao = "Vui lòng nhập đầy đủ chiều dài và chiều rộng!";
        }
    }
?>

<form name="tinhdientich"
      method="get"
      action="bt1.php"
      style="margin:auto; width:300px;">

    <table>

        <tr>
            <td colspan="2"
                style=" text-align:center; font-size:20px; color: #aa5151; blackground-color: #d6b64e; padding: 10px;">
                DIỆN TÍCH HÌNH CHỮ NHẬT
            </td>
        </tr>

        <tr>
            <td>
                Chiều dài:
                <input type="text"
                       name="chieudai"
                       value="<?php echo $chieuDai; ?>">
            </td>
        </tr>

        <tr>
            <td>
                Chiều rộng:
                <input type="text"
                       name="chieurong"
                       value="<?php echo $chieuRong; ?>">
            </td>
        </tr>

        <tr>
            <td>
                Diện tích:
                <input type="text"
                       name="dientich"
                       value="<?php echo $dienTich; ?>"
                       readonly>
            </td>
        </tr>

        <tr>
            <td>
                <button type="submit" name="tinh">Tính</button>
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