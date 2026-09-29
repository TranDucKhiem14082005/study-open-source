<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính</title>
</head>
<body>

<form action="ketquapheptinh.php" method="post"
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
            <td style = "color: #e91e1e; font-weight: bold;">
                Chọn phép tính:
                <input type="radio" name="pheptinh" value="Cong"> Cộng
                <input type="radio" name="pheptinh" value="Tru"> Trừ
                <input type="radio" name="pheptinh" value="Nhan"> Nhân
                <input type="radio" name="pheptinh" value="Chia"> Chia
            </td>
        </tr>

        <tr>
            <td style = "color: #245fdf; font-weight: bold;">
                Số thứ nhất:
                <input type="text" name="so1"
                       style="width:150px; margin-left:30px;">
            </td>
        </tr>
        <tr>
            <td style = "color: #245fdf; font-weight: bold;">
                Số thứ hai:
                <input type="text" name="so2"
                       style="width:150px; margin-left: 40px;">
            </td>
        </tr>

        <tr>
            <td align="center">
                <button type="submit" name="tinh">Tính</button>
            </td>
        </tr>
    </table>

</form>

</body>
</html>