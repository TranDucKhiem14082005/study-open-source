<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bai tap 3</title>
</head>
<body>
    <?php
         $n = rand(-100, 100);
        echo"mot so ngau nhien tu -100 den 100: $n <br>";
        echo"cac uoc cua n: <br>";
        echo"kiểm tra n có phải là số nguyên tố hay không: <br>";
        if($n > 0){
            
            for($i = 1; $i <= $n; $i++){
                if($n % $i == 0){
                    echo"<br>cac uoc cua n: $i";
                }
            }

        } 
        //ham so nguyen to
        function songuyento($n){
            if($n < 2){
                return false;
            }
            for($i = 2; $i <sqrt($n); $i++) {
                if($n % $i == 0){
                    return false;
                }
            }
            return true;
        }

        echo"kiểm tra n có phải là số nguyên tố hay không: <br>";
        if(songuyento($n)){
            echo"$n la so nguyen to <br>";
        } else {
            echo"$n khong phai la so nguyen to <br>";
        }
        
        // Tính tổng các số nguyên tố nhỏ hơn n
        $sum = 0;
        for($i = 1; $i < $n; $i++){
            if(songuyento($i)){
                $sum += $i;
            }
        }
        echo"tổng các số nguyên tố nhỏ hơn n: $sum <br>";
        
        // Kiểm tra n có phải là số chính phương hay không
        function ktsochinhphuong($n){
            $sochinhphuong = false;
            for($i = 1; $i <= sqrt($n); $i++){
                if($i * $i == $n){
                    $sochinhphuong = true;
                    break;
                }
            }
            return $sochinhphuong;
        }

        echo"kiểm tra n có phải là số chính phương hay không: <br>";
        if(ktsochinhphuong($n)){
            echo"$n la so chinh phuong <br>";
        } else {
            echo"$n khong phai la so chinh phuong <br>";
        }
    ?>
</body>
</html>