<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bảng cửu chương từ 1 - 10</title>

    <style>
        div.tablecontainer {
            overflow-x: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #04AA6D;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>

    <h2>BẢNG CỬU CHƯƠNG TỪ 1 - 10</h2>

    <div class="tablecontainer">

        <table>

            <!-- Hàng tiêu đề -->
            <tr>
                <th>Bảng</th>

                <?php
                for ($j = 1; $j <= 10; $j++) {
                    echo "<th>× $j</th>";
                }
                ?>
            </tr>

            <!-- Nội dung bảng cửu chương -->
            <?php

            for ($i = 1; $i <= 10; $i++) {

                echo "<tr>";

                // Tên bảng
                echo "<th>Bảng $i</th>";

                // Các phép nhân
                for ($j = 1; $j <= 10; $j++) {

                    echo "<td>";
                    echo "$i × $j = " . ($i * $j);
                    echo "</td>";
                }

                echo "</tr>";
            }

            ?>

        </table>

    </div>

</body>

</html>