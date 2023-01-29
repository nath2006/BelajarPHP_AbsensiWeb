<?php
    session_start();

    //agar tidak terdirect ketuika hanya memasukan urlnya saja
    if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
        header("location:../index.php?message=Silakan login terlebih dahulu!");
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header("location:../index.php?message=Keluar dari sistem");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>DASHBOARD</title>
</head>
<body>
    <div>
        <section>
            <h3>
                Hallo <?php echo $_SESSION['fullname']; ?>
            </h3>
            <p>
                Status Pegawai : <?php echo $_SESSION['role']; ?> </p>
            <br>
            <?php 
                if(isset($_GET['message'])){
                    $msg = $_GET['message'];
                    echo "
                    <p>$msg</p>
                    ";
                }
            ?>
            <!-- TABLE ABSEN -->
            <?php include("absensi.php"); ?>
            <br>
            <form action="" method="POST">
                <button name="logout" type="submit" >logout</button>
            </form>
        </section>
    </div>
</body>
</html>
