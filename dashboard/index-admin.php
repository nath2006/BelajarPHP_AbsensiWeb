
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
<table border="1">
    <div class="list-user">
        <tr class="tr">
            <th class="th">No.</th>
            <th class="th">Nama</th>
            <th class="th">Jabatan</th>
            <th class="th">Tanggal</th>
            <th class="th">Clock In</th>
            <th class="th">Clock Out</th>
        </tr>
    </div>

<?php
    session_start();
    include("../connecting.php");
   

    $sql = "SELECT * FROM users JOIN attendaces ON users.employee_id = attendaces.employee_id";
    $result = $db->query($sql);

    $no = 1;
    while($row = $result->fetch_assoc()){
        echo "<tr class='tr'>";
        echo "<td class='td'>" . $no++ . "</td>";
        echo "<td class='td'>" . $row['fullname'] . "</td>";
        echo "<td class='td'>" . $row['role'] . "</td>";
        echo "<td class='td'>" . $row['date'] . "</td>";
        echo "<td class='td'>" . $row['clock_in'] . "</td>";
        echo "<td class='td'>" . $row['clock_out'] . "</td>";
        echo "</tr>";

    }
?>
</table>
<div style="display: flex; justify-content:center;align-items:center; margin-top: 20px;">
    <button style="text-align:center" onclick="window.print()">CETAK LAPORAN</button>
  </div>
</body>
</html>


