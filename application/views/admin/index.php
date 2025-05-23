<div class="container">
  <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
      <div>
        <h3 class="fw-bold mb-3">Data Warga</h3>
        <h6 class="op-7 mb-2">Aplikasi Data Warga Planet Mars</h6>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <a href="<?php echo base_url('admin/kartukeluarga') ?>" style="text-decoration: none; color: inherit;">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-primary bubble-shadow-small">
                    <i class="far fa-newspaper"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Jumlah Kartu Keluarga</p>
                    <h4 class="card-title"><?php echo $jumlah_kartukeluarga ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-6 col-md-3">
        <a href="<?php echo base_url('admin/warga') ?>" style="text-decoration: none; color: inherit;">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-warning bubble-shadow-small">
                    <i class="fas fa-users"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Warga</p>
                    <h4 class="card-title"><?php echo $jumlah_warga ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-6 col-md-3">
        <a href="<?php echo base_url('admin/user') ?>" style="text-decoration: none; color: inherit;">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-success bubble-shadow-small">
                    <i class="fas fa-user-check"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Akun Terdaftar</p>
                    <h4 class="card-title"><?php echo $akun_terdaftar ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="col-sm-6 col-md-3">
        <a href="<?php echo base_url('admin/kegiatan') ?>" style="text-decoration: none; color: inherit;">
          <div class="card card-stats card-round">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col-icon">
                  <div class="icon-big text-center icon-secondary bubble-shadow-small">
                    <i class="far fa-calendar-alt"></i>
                  </div>
                </div>
                <div class="col col-stats ms-3 ms-sm-0">
                  <div class="numbers">
                    <p class="card-category">Kegiatan</p>
                    <h4 class="card-title"><?php echo $jumlah_kegiatan ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>