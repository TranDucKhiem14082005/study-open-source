<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In số chẵn ngẫu nhiên từ 1 - 100</title>
</head>
<body>
    <?php
    $n = rand(1, 100);
    echo "Những số ngẫu nhiên từ 1 - 100: ";
    for($i = 1; $i <= $n;  $i++) {
        if($i % 2 == 0) {
            echo "$i ";
        }
    }
    ?>
</body>
</html>