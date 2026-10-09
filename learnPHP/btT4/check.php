<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$ketQua = '';
$thongBao = '';

$tuDich = $_POST['tudich'] ?? '';
$ngonNguNguon = $_POST['lang'] ?? 'en';
$ngonNguDich = $_POST['target'] ?? 'vi';

if (isset($_POST['submit'])) {

    if (trim($tuDich) === '') {
        $thongBao = 'Vui lòng nhập từ cần dịch!';
    } else {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://google-translator9.p.rapidapi.com/v2/languages',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => 'GET',

            CURLOPT_POSTFIELDS => json_encode([
                'q' => $tuDich,
                'source' => $ngonNguNguon,
                'target' => $ngonNguDich,
                'format' => 'text'
            ]),

            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'x-rapidapi-host: google-translator9.p.rapidapi.com',
                'x-rapidapi-key: YOUR_RAPIDAPI_KEY'
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($err) {
            $thongBao = 'Lỗi kết nối: ' . $err;
        } else {
            $array = json_decode($response, true);

            if (
                $httpCode >= 200 &&
                $httpCode < 300 &&
                isset($array['data']['translations'][0]['translatedText'])
            ) {
                $ketQua = $array['data']['translations'][0]['translatedText'];
            } else {
                $thongBao = 'Không dịch được. Mã HTTP: ' . $httpCode;

                if (isset($array['message'])) {
                    $thongBao .= ' - ' . $array['message'];
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dịch ngôn ngữ</title>
</head>

<body>

    <form name="form1" method="post" action="">
        <table align="center" style="text-align: center;">

            <tr>
                <td>
                    <select name="lang">
                        <option value="en"
                            <?= $ngonNguNguon === 'en' ? 'selected' : '' ?>>
                            Tiếng Anh
                        </option>

                        <option value="vi"
                            <?= $ngonNguNguon === 'vi' ? 'selected' : '' ?>>
                            Tiếng Việt
                        </option>
                    </select>
                </td>

                <td>
                    <input
                        type="text"
                        name="tudich"
                        size="50"
                        value="<?= htmlspecialchars($tuDich, ENT_QUOTES, 'UTF-8') ?>"
                    >
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input
                        type="submit"
                        name="submit"
                        value="Translate"
                    >
                </td>
            </tr>

            <tr>
                <td>
                    <select name="target">
                        <option value="vi"
                            <?= $ngonNguDich === 'vi' ? 'selected' : '' ?>>
                            Tiếng Việt
                        </option>

                        <option value="en"
                            <?= $ngonNguDich === 'en' ? 'selected' : '' ?>>
                            Tiếng Anh
                        </option>
                    </select>
                </td>

                <td>
                    <input
                        type="text"
                        name="ketqua"
                        size="50"
                        readonly
                        value="<?= htmlspecialchars($ketQua, ENT_QUOTES, 'UTF-8') ?>"
                    >
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <?= htmlspecialchars($thongBao, ENT_QUOTES, 'UTF-8') ?>
                </td>
            </tr>

        </table>
    </form>

</body>
</html>



</body>
</html>


</body>
</html>