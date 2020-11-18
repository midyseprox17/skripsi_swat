<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lupa Password</title>
   <link rel="icon" type="image/png" href="<?=base_url().'assets/'?>img/icon.png">

  <!-- Custom fonts for this template-->
  <link href="<?=base_url().'assets/'?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url().'assets/'?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?=base_url().'assets/'?>css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="background: #15406a">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-5 col-md-5">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <img src="<?=base_url().'assets/'?>img/logo.png" class="rounded mx-auto d-block mb-4" style="width: 50%">
                    <h1 class="h3 text-gray-900 mb-4">Lupa Password</h1>
                    <h6><font color="red"><?=isset($_SESSION['pesan'])? $_SESSION['pesan'] : '';?></font></h6>
                  </div>
                  <form method="post" action="<?=base_url('lupa_password')?>">
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                    <table class="table" style="width: 100%">
                      <tr>
                        <td style="width: 40%; color: #000000">Username</td>
                        <td style="width: 100%" class="float-left">
                          <input type="text" class="form-control" placeholder="Username" name="username" required="" value="<?=$data_login->username?>" readonly>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 40%; color: #000000">Pertanyaan 1</td>
                        <td style="width: 100%" class="float-left">
                          <input type="text" class="form-control" value="<?=$data_login->pertanyaan1?>" readonly>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 40%; color: #000000">Jawaban 1</td>
                        <td style="width: 100%" class="float-left">
                          <input type="text" class="form-control" name="jawaban1">
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 40%; color: #000000">Pertanyaan 2</td>
                        <td style="width: 100%" class="float-left">
                          <input type="text" class="form-control" value="<?=$data_login->pertanyaan2?>" readonly>
                        </td>
                      </tr>
                      <tr>
                        <td style="width: 40%; color: #000000">Jawaban 2</td>
                        <td style="width: 100%" class="float-left">
                          <input type="text" class="form-control" name="jawaban2">
                        </td>
                      </tr>
                        <td style="width: 40%; color: #000000"></td>
                        <td style="width: 100%" class="float-left" align="right">
                          <button class="btn btn-primary" type="submit" name="submit" value="step2">Ubah Password</button>
                        </td>
                      </tr>
                    </table>
                    <a href="#">Login Disini</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url().'assets/'?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url().'assets/'?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url().'assets/'?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url().'assets/'?>js/sb-admin-2.min.js"></script>

</body>

</html>
