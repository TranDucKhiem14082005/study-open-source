<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1 Phần 2</title>
</head>
<body>
    <?php 
        $arr = [];
        $s = 0;
        $s1 = 0;
        $s2 = 0;
        $vt = -1;
        if(isset($_GET['btnThucHien'])){
            $SoN = $_GET['SoN'];
            if($SoN ==""){
                echo "Không được bỏ trống";
            }
            else if($SoN >= 0){
                for($i = 0; $i < $SoN; $i++){
                    $arr[]=rand(-20,150);
                    
                }
                
                foreach($arr as $value){
                    if($value % 2 == 0){
                        $s++;
                    }
                }
                
                foreach($arr as $value){
                    if($value < 100){
                        $s1++;
                    }
                }
                foreach($arr as $value){
                    if($value < 0){
                        $s2+=$value;
                    }
                }
                for($i = 0; $i < $SoN; $i++){
                    if($arr[$i] == 0){
                        $vt = $i;
                        break;
                    }
                }
            }else if($SoN < 0){
                echo "N không phải số nguyên dương";
            }
        }
    ?>
    <form method="get" name="stn">
        <table align="center" style="background: #e66666;">
            <tr style="background: #e72222;">
                <td>Nhập số tự nhiên n:
                </td>
                <td>
                    <input type="number" name="SoN" value="<?php if (isset($SoN)) echo $SoN; ?>">
                </td>
            </tr>
            <tr align="center">
                <td colspan = "2">
                    <input type="submit" name="btnThucHien" value="Thực hiện">
                </td>
            </tr>
            <tr>
                <td>
                    Mảng random n phần tử:
                </td>
                <td>
                    <?php
                    foreach($arr as $value){
                        echo $value . " ";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Mảng random (đã sắp xếp):
                </td>
                <td>
                    <?php
                    sort($arr);
                    foreach($arr as $value){
                        echo $value . " ";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Số phần tử là số chẵn:
                </td>
                <td>
                    <?php
                    if($s == 0){
                        echo "Khong co so chan";
                    }else{
                        echo $s;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Số nhỏ hơn 100:
                </td>
                <td>
                    <?php
                    if($s1 == 0){
                        echo "Khong co so nho hon 100";
                    }else{
                        echo $s1;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Tổng phần tử âm:
                </td>
                <td>
                    <?php
                    if($s2 == 0){
                        echo "Khong co so am";
                    }else{
                        echo $s2;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Vị trí phần tử = 0:
                </td>
                <td>
                    <?php
                    if($vt == -1){
                        echo "Không có phần tử 0";
                    }
                    else{
                        echo $vt;
                    }
                    ?>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>