<table border="1"> 
    <tr>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Jam Keluar</th>
        <th>Performa</th>
    </tr>

<!-- CALL DATA ABSENSI MULAI -->
<?php
    include("../connecting.php");

    date_default_timezone_set('Asia/Jakarta'); //GMT +07

    $date = date('Y-m-d');
    $clock_in = date('H:i:s'); //h = am pm(12hours) and H = 24hour format
    $employee_id = $_SESSION['employee_id'];

    $sql = "SELECT *FROM attendaces WHERE employee_id=$employee_id";
    $result = $db->query($sql);
    
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['clock_in'] . "</td>";

        if(empty($row['clock_out']) && !empty($row['clock_in']) && $date == $row
        ['date']) 
        {
            echo "
            <td>
                <form action='' method='POST'>
                    <button type='submit' name='keluar'>keluar</button>
                </form>
            </td>";
        }
        else {
            echo "<td>" . $row['clock_out'] . " </td>";
        }
        echo "<td>✔</td>";
        echo "</tr>";
    }
?>
<!-- CALL DATA ABSENSI SELESAI -->

</table>     
    <!--                                               untuk alert -->
    <form action="action.php" method="POST" onsubmit='return alert(`terima kasih sudah bekerja hari ini`)'>
        <button name="absen" type="submit">Absen</button>
    </form>

    <?php 
    if(isset($_POST['keluar'])){ 
        $update = "UPDATE attendaces SET clock_out='$clock_in'  WHERE employee_id=$employee_id 
        AND date ='$date'";

        $clock_out = $db->query($update);
        if($clock_out === TRUE){
            session_start();
            session_destroy();
            header("location:../index.php");
        }
    }
    ?>