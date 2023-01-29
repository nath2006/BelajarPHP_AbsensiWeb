<?php 

    include("../connecting.php");
    session_start();

    date_default_timezone_set('Asia/Jakarta'); //GMT +07

    $employee_id =$_SESSION['employee_id'];
    $date = date('Y-m-d');
    $clock_in = date('H:i:s'); //h = am pm(12hours) and H = 24hour format

    if (isset($_POST['absen'])) {
        $check_absen = "SELECT date FROM attendaces WHERE employee_id=$employee_id
        AND date ='$date'";

        $check = $db->query($check_absen);
        
        if($check->num_rows > 0){
            //jika user sudah pernah absen di hari yang sama
            header("location:index.php?message=maaf anda sudah absen hari ini");
        }else{
            //jika user belum absen maka dia bisa absen hari ini
            $sql = "INSERT INTO attendaces (`id`,`employee_id`, `date`, `clock_in`, 
            `clock_out`) VALUES (NULL, $employee_id,'$date', '$clock_in', NULL) ";
    
            $result = $db->query($sql);
            
            if($result === TRUE ){
                header("location:index.php?message=absen berhasil dilakukan!");
            }else{
                header("location:index.php?message=absen gagal!");
            }
        }
    }
    
?>