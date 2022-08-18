<body class="bg-gray-900">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-top: 100px;">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 my-5" style="box-shadow: 10px 15px 20px rgba(0,0,0,0.5) !important;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-warning text-center justify-content-center">
                <img src="./assets/selidah.png" alt="" width="50%" class="img img-responsive" style="margin: 25px ;">
                <h1 class="h4 text-gray-900 mb-4" style="font-size: 30px"></i><b> DISPORBUDPAR BATOLA</b></h1>
              </div>
              <div class="col-lg-6 bg-light text-white">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-dark mb-4"></i><b> Login Page</b></h1>
                  </div>
                  <?php
                  if ($this->session->flashdata('message')) {
                    echo '<small>' . $this->session->flashdata('message') . '</small>';
                  }
                  ?>
                  <form class="user" method="post" action="<?= base_url('auth') ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="Masukkan Nomor NIP Anda..." value="<?= set_value('nip'); ?>">
                      <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-warning btn-user btn-block text text-dark">
                      Login
                    </button>
                    <hr>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>

  </div>
  <footer class="sticky-footer text-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <strong>Copyright &copy; Jauzi Oktaviandy <?= date('Y')?> <a href=""></a>.</strong> All rights reserved.
      </div>
    </div>
  </footer>