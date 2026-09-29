<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả phép tính</title>
</head>
<body>

    <?php

        function kiemTraDuLieu($so1, $so2, $pheptinh)
        {
        
            if (!is_numeric($so1) || !is_numeric($so2)) {
                return false;
            }


            if ($pheptinh == 'Chia' && $so2 == 0) {
                return false;
            }

            return true;
        }


        $so1 = isset($_POST['so1']) ? $_POST['so1'] : '';
        $so2 = isset($_POST['so2']) ? $_POST['so2'] : '';
        $pheptinh = isset($_POST['pheptinh']) ? $_POST['pheptinh'] : '';



        if (!kiemTraDuLieu($so1, $so2, $pheptinh)) {
            header("Location: pheptinh.php");
            exit;
        }


        $ketqua = 0;

        switch ($pheptinh) {

            case 'Cong':
                $ketqua = $so1 + $so2;
                break;

            case 'Tru':
                $ketqua = $so1 - $so2;
                break;

            case 'Nhan':
                $ketqua = $so1 * $so2;
                break;

            case 'Chia':
                $ketqua = $so1 / $so2;
                break;
        }


        $ketqua = number_format($ketqua, 2);

    ?>

<form action="pheptinh.php" method="post"
    style="margin: auto; width: 400px; background-color: #e0e0e0;">

    <table>

        <tr>
            <td colspan="2"
                style="text-align:center; font-size:20px; color:#3662c0;
                width:400px; height:30px; font-weight:bold;">
                PHÉP TÍNH TRÊN HAI SỐ
            </td>
        </tr>

        <tr>
            <td style="color: #d12e2e; font-weight: bold;">
                Phép tính:
                <?php echo $pheptinh; ?>
            </td>
        </tr>

        <tr>
            <td style="color: #245fdf; font-weight: bold;">
                Số 1:
                <input type="text"
                    value="<?php echo $so1; ?>"
                    style="width:150px; margin-left:40px;">
            </td>
        </tr>

        <tr>
            <td style="color: #245fdf; font-weight: bold;">
                Số 2:
                <input type="text"
                    value="<?php echo $so2; ?>"
                    style="width:150px; margin-left:40px;">
            </td>
        </tr>

        <tr>
            <td style="color: #245fdf; font-weight: bold;">
                Kết quả:
                <input type="text"
                    value="<?php echo $ketqua; ?>"
                    readonly
                    style="width:150px; margin-left:14px;">
            </td>
        </tr>

        <tr>
            <td align="center">
                <a href="javascript:window.history.back(-1);"
                    style="color: #e33ee9;">
                    Quay lại trang trước
                </a>
            </td>
        </tr>

    </table>

</form>

</body>
</html>