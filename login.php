<?php

    include("./connecting.php");
    include("./Users.php");
    session_start();
    $user = new Users();

    if(isset($_POST['login'])){

        if(strlen($_POST['nip']) <= 2 || strlen($_POST['password']) <= 2 ){
            header("location:index.php?message=Data tidak valid!");
        } else {
            $user->set_login_data($_POST['nip'], $_POST['password']);
    
            $id = $user->get_employee_id();
            $password = $user->get_password();
    
            $sql = "SELECT * FROM users WHERE employee_id = $id AND password = '$password' ";
            $result = $db->query($sql);
    
                if($result->num_rows > 0){
                    //data yang akan masuk kebagian dashboard
                    while ($row = $result->fetch_assoc()) {
                        //session penampungan pertama di browser
                        $_SESSION['status'] = "login";
                        $_SESSION['employee_id'] = $row['employee_id'];
                        $_SESSION['fullname'] = $row['fullname'];
                        $_SESSION['role'] = $row['role'];

                        if ($row['role'] == 'admin' || $row['role'] == 'Admin') {
                            header("location:./dashboard/index-admin.php?message=selamat datang admin");
                        } else {
                            header("location:./dashboard/index.php");
                        }
                    }

                }else{
                    header("location:index.php?message=NIP atau Password salah!");
                }
        }
    
    }

?>