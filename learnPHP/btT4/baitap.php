<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    
    <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quanly_ban_sua";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("<b>Kết nối thất bại: </b>" . mysqli_connect_error());
        }
        if($conn) {
            echo "<br> <b>Kết nối thành công </b> <br>";
        }
        // $query = "SELECT * FROM khach_hang WHERE RIGHT(Dien_thoai,1 ) % 2 != 0"; 
        // $query = "SELECT DISTINCT khach_hang.* FROM khach_hang
        //         JOIN hoa_don ON khach_hang.Ma_khach_hang = hoa_don.Ma_khach_hang
        //         JOIN ct_hoadon ON ct_hoadon.So_hoa_don = hoa_don.So_hoa_don
        //         JOIN sua ON ct_hoadon.Ma_sua = sua.Ma_sua WHERE sua.Ma_sua = 'AB0001'";


        //Cau 1
        // $query = "SELECT hs.Ten_hang_sua, hs.Dia_chi, hs.Dien_thoai FROM hang_sua hs";

        // Cau 2
        // $query = "SELECT khach_hang.Ten_khach_hang, khach_hang.Dia_chia, khach_hang.Dien_thoai
        //  FROM khach_hang ORDER BY Ten_khach_hang ASC";

        //Cau 3
        // $query = "SELECT kh.Ten_khach_hang, kh.Phai, kh.Dia_chi,kh.Dien_thoai
        //  FROM khach_hang kh ORDER BY kh.Phai ASC ";
        
        //Cau 4
        // $query = "SELECT s.Ten_sua, s.Trong_luong, s.Don_gia FROM sua s 
        // ORDER BY s.Ten_sua ASC, s.Don_gia DESC";

        //Cau 5
        // $query = "SELECT s.Ten_sua, s.Trong_luong, s.Don_gia, s.TP_Dinh_Duong  FROM sua s
        //  WHERE s.Ten_sua LIKE 'S%'";

        //Cau 6
        // $query = "SELECT hs.Ma_hang_sua, hs.Ten_hang_sua, hs.Dia_chi, hs.Dien_thoai FROM hang_sua hs 
        //     WHERE hs.Ma_hang_sua LIKE '%M'";
        
        //Cau 7
        // $query = "SELECT * FROM sua WHERE sua.Ten_sua LIKE '%grow%'";

        //Cau 8
        // $query = "SELECT s.Ten_sua, s.Don_gia, s.Trong_luong  FROM sua s 
        // WHERE s.Don_gia > 100000 ORDER BY s.Don_gia DESC";

        //Cau 9
        // $query = "SELECT s.Ten_sua, s.TP_Dinh_Duong, s.Loi_ich FROM sua s
        //     JOIN  loai_sua ls ON ls.Ma_loai_sua = s.Ma_loai_sua
        //     JOIN hang_sua hs ON hs.Ma_hang_sua = s.Ma_hang_sua
        //     WHERE ls.Ma_loai_sua = 'SC' AND hs.Ma_hang_sua = 'VNM'
        //     ";
       
        //Cau 10
        // $query = " SELECT * FROM sua s WHERE
        //  (s.Trong_luong > 900 OR s.Trong_luong = 900) OR s.Ma_hang_sua = 'DS'";

        //Cau 11
        // $query = "SELECT * FROM sua where sua.Don_gia > 100000 AND sua.Don_gia < 150000";
            
        //Cau 12
        // $query = "SELECT * FROM sua WHERE (sua.Ma_hang_sua = 'DM' OR sua.Ma_hang_sua = 'DL'
        //     OR sua.Ma_hang_sua = 'DS') AND (sua.Trong_luong >800 OR sua.Trong_luong = 800) 
        //     ORDER BY sua.Trong_luong ASC
        // ";

        //Cau 13
        // $query = "SELECT * FROM sua WHERE sua.Ma_loai_sua = 'SD' OR sua.Don_gia <12000 
        //     OR sua.Don_gia = 12000
        // ";

        //Cau 14

        // $query = "SELECT * FROM khach_hang WHERE Phai  = 0 AND Ten_khach_hang LIKE 'N%'";

        //Cau 15: NOT LIKE là có thể loại bỏ đi một cái nội dung gì đó
        // $query = "SELECT * FROM hang_sua hs WHERE hs.Ma_hang_sua NOT LIKE '%M%'";

        //Câu 16: 
        // $query= "SELECT Ten_sua, TP_Dinh_Duong FROM sua WHERE TP_Dinh_Duong LIKE '%canxi%'
        //  AND TP_Dinh_Duong LIKE '%vitamin%'";
        
        //Cau 17
        // $query = "SELECT * FROM sua WHERE sua.Trong_luong = 180 OR sua.Trong_luong = 200 
        // OR sua.Trong_luong = 900 ";

        //Cau 18
        // $query ="SELECT * FROM sua WHERE Trong_luong  NOT LIKE '%400%' AND 
        // Trong_luong  NOT LIKE '%800%' AND Trong_luong  NOT LIKE '%900%'";

        // Cau 19
        // $query = "SELECT Ten_sua,Don_gia,TP_Dinh_Duong FROM sua 
        // Where Don_gia ORDER BY Don_gia DESC LIMIT 10";

        //Cau 20
        // $query ="SELECT Ten_sua, Trong_luong FROM sua WHERE Trong_luong ORDER BY Trong_luong DESC LIMIT 3";

        //Cau 21

        // $query = "SELECT Ten_sua, Loi_ich,Don_gia FROM sua s
        //     JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua
        //     WHERE hs.Ten_hang_sua = 'Vinamilk' ORDER BY Don_gia DESC
        // ";

        //Cau 22
        // $query = "SELECT Ten_sua,Trong_luong,Loi_ich FROM sua s
        //     JOIN hang_sua hs ON s.Ma_hang_sua = hs.Ma_hang_sua
        //     WHERE hs.Ten_hang_sua = 'Abbott' ORDER BY Trong_luong ASC";

    //---------------------------------------------------

        //1.4 Bài tập
        //Cau 1
        // $query = "SELECT ROUND(AVG(Tri_gia),-3) as Trị_Giá_Trung_Bình FROM hoa_don";

        //Cau 2
        // $query = "SELECT * FROM hoa_don WHERE YEAR(Ngay_HD) = 2007 AND MONTH(Ngay_HD) = 7";

        //Cau 3
        // $query = "SELECT *,datediff(Curdate(),Ngay_HD) as So_Ngay  FROM hoa_don ORDER BY So_Ngay DESC";

        //Cau 4
        // $query = "SELECT * FROM sua Where Length(Ten_sua) <= 10 ";
    
        //Cau 5 
        // $query = "SELECT UPPER(Ten_hang_sua), Dia_chi, Dien_thoai FROM hang_sua";

        //Cau 6
        // $query = "SELECT * , DATE_FORMAT(Ngay_HD, '%W - %d - %m - %Y' ) AS ngay FROM hoa_don";

        //Cau 7
    //    $query = "SELECT 
    //         sua.Ten_sua,
    //         CONCAT(sua.Trong_luong, ' gr') AS Trong_luong,
    //         CONCAT(FORMAT(sua.Don_gia, 0), ' VNĐ') AS Don_gia
    //       FROM sua
    //       JOIN ct_hoadon 
    //         ON sua.Ma_sua = ct_hoadon.Ma_sua
    //       JOIN hoa_don 
    //         ON ct_hoadon.So_hoa_don = hoa_don.So_hoa_don
    //       WHERE MONTH(hoa_don.Ngay_HD) = 8
    //         AND YEAR(hoa_don.Ngay_HD) = 2007";

        //Cau 8
        // $query = "SELECT CONCAT(Ma_khach_hang, ' - ', Ten_khach_hang) as ma_ten_KH
        // , If(Phai = 0, 'Nam', 'Nữ') as Phai
        //  FROM khach_hang";

        //Cau 9
        // $query = "SELECT *, If(Don_gia > 100000, 'Sữa giá cao', 'Sữa giá trung bình') FROM sua where Trong_luong >= 400 and Trong_luong <= 500";

        // Cau 10
    //    $query = "SELECT *,
    //              CONCAT(
    //                 'Thứ ',
    //                 CASE DAYOFWEEK(Ngay_HD)
    //                     WHEN 1 THEN 'Chủ nhật'
    //                     WHEN 2 THEN 'Hai'
    //                     WHEN 3 THEN 'Ba'
    //                     WHEN 4 THEN 'Tư'
    //                     WHEN 5 THEN 'Năm'
    //                     WHEN 6 THEN 'Sáu'
    //                     WHEN 7 THEN 'Bảy'
    //                 END,
    //                 ' ngày ',
    //                 DAY(Ngay_HD),
    //                 ' tháng ',
    //                 MONTH(Ngay_HD),
    //                 ' năm ',
    //                 YEAR(Ngay_HD)
    //              ) AS Ngay
    //       FROM hoa_don
    //       ORDER BY Ngay_HD ASC";

        //Cau 11
        // $query = "SELECT SUM(Phai = 0) AS So_Luong_Nam, SUM(Phai = 1) AS So_Luong_Nu, COUNT(*) AS So_Luong_Tong FROM khach_hang";

        //---------------------------------------------------
        //1.5 Bài tập
        //Cau 1

        // $query = "SELECT hang_sua.Ten_hang_sua, Count(*) AS So_luong_sua FROM hang_sua
        //     JOIN sua ON hang_sua.Ma_hang_sua = sua.Ma_hang_sua
        //     GROUP BY  hang_sua.Ma_hang_sua, hang_sua.Ten_hang_sua
        // ";  

        //Cau 2

        // $query = "SELECT hs.Ten_hang_sua, AVG(Don_gia)  FROM sua
        //     JOIN hang_sua hs ON sua.Ma_hang_sua = hs.Ma_hang_sua
        //     WHERE sua.Trong_luong >= 800 AND sua.Trong_luong <= 900
        //     GROUP BY hs.Ma_hang_sua, hs.Ten_hang_sua
        //  ";

        //Cau 3
        $query = "SELECT hs.Ten_hang_sua, MIN(sua.Trong_luong) AS Trong_luong  FROM hang_sua hs
            JOIN sua ON hs.Ma_hang_sua = sua.Ma_hang_sua
            GROUP BY hs.Ma_hang_sua, hs.Ten_hang_sua
           
        ";

        $result = mysqli_query($conn, $query);
        if(!$result){
            die("<b>Query thất bại: </b>" . mysqli_error($conn));
        }
        
    ?>
    <table align="center" style = "text-align:center">
       
        <?php
        if(mysqli_num_rows($result) != 0){
            
            while($row = mysqli_fetch_array($result)) {
       
                    echo "<tr>";
                    for($i = 0; $i < mysqli_num_fields($result); $i++) {
                            echo "<td>" . $row[$i] . "</td>";
                    }
                
                    echo "</tr>";
                
            }
        }
            mysqli_free_result ( $result );
            mysqli_close ( $conn );
        ?>
    </table>

</body>
</html>