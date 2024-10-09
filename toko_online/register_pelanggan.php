<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <style>
    .gradient-custom-3 {
    /* fallback for old browsers */
    background: #84fab0;
    
    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));
    
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
    }
    .gradient-custom-4 {
    /* fallback for old browsers */
    background: #84fab0;
    
    /* Chrome 10-25, Safari 5.1-6 */
    background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
    
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }
  </style>
</head>
<body>
  <section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Register</h2>
                <form id="registerForm" action="proses_register_pelanggan.php" method="post" enctype="multipart/form-data">
                
                  
                  <div class="form-outline mb-4">
                    <input type="text" id="nama" name="nama" class="form-control form-control-lg" required />
                    <label class="form-label" for="nama">Nama</label>
                  </div>
                  
                  <div class="form-outline mb-4">
                    <input type="text" id="username" name="username" class="form-control form-control-lg" required />
                    <label class="form-label" for="username">username </label>
                  </div>
                  
                  <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-lg" required />
                    <label class="form-label" for="password">Password</label>
                  </div>
                  
                  <div class="form-outline mb-4">
                    <input type="text" id="alamat" name="alamat" class="form-control form-control-lg" required />
                    <label class="form-label" for="alamat">Alamat</label>
                  </div>
                  
                  <div class="form-outline mb-4">
                    <input type="text" id="telp" name="telp" class="form-control form-control-lg" required />
                    <label class="form-label" for="telp">Telephone</label>
                  </div>
                  
                  <div class="form-outline mb-4">
                  <div class="row align-items-center py-3">
                  <div class="col-md-3 ps-5">
                    <h6 class="mb-0">Masukkan Foto Anda</h6>
                  </div>
                  <div class="col-md-9 pe-5">
                    <label for="fotoPelanggan" class="form-label"></label>
                    <input type="file" id="foto" name="foto" class="form-control">
                  </div>
                </div>
    
                  </div>
                  
                  
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                  </div>
                  
                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login_pelanggan.php" class="fw-bold text-body"><u>Login here</u></a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
                  
