<?php 
  session_start();
  if(isset($_SESSION['status']) && $_SESSION['status'] == "login") {
    header("location:dashboard/index.php");
  }
?>

<!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <!-- <script src="./asset/js/messageRequired.js"></script> -->
        <link rel="stylesheet" href="./bootstrap-5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="./asset/css/style.css">
        <title>Absensi</title>
      </head>
      <body>
<!-- 2jam 21mneit -->
        <!-- card Login Start-->
        <section class="vh-100 gradient-custom">
                  <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                          <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                              <h2 class="fw-bold mb-2 text-uppercase">Login Abensi</h2>
                              <p class="text-white-50 mb-5">Silakan masukan NIP dan Pasword anda!</p>
                              <?php
                              if (isset($_GET['message'])) {
                                $msg = $_GET['message'];
                                echo "
                                  <p class='text-white-50 mb-5'>$msg</p>
                                  ";
                              }
                              ?>
                              <form action="login.php" method="POST">
                                  <div class="form-outline form-white mb-4">
                                    <input type="number" id="typeNIPX" 
                                        class="form-control form-control-lg"  
                                        placeholder = "Nomor Induk Pegawai" 
                                        name = "nip" id="nip"
                                        oninput="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Tolong masukan data yang valid!')"
                                        required/>
                                  </div>
                                  <div class="form-outline form-white mb-4">
                                    <input type="password" id="typePasswordX" 
                                        class="form-control form-control-lg" 
                                        placeholder="Password" 
                                        name = "password" id="password"
                                        oninput="this.setCustomValidity('')"
                                        oninvalid="this.setCustomValidity('Tolong masukan data yang valid!')"
                                        required/>
                                  </div>
                                  <button class="btn btn-outline-light btn-lg px-5" type="submit" name="login">Login</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>\
        <!-- card Login End-->

      </body>
    </html>