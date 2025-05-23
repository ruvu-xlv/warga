<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">Kartu Keluarga</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="<?php echo base_url('admin') ?>">
            <i class="icon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin/kartukeluarga') ?>">List Data</a>
        </li>
        <li class="separator">
          <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin/kartukeluarga_tambah') ?>">Tambah</a>
        </li>
      </ul>
    </div>
    
    <!-- <?php if($this->session->flashdata('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('error') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php endif; ?> -->

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Tambah Kartu Keluarga</div>
          </div>
          
          <form method="post" action="<?php echo base_url('admin/kartukeluarga_store') ?>">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="nomor_kk">Nomor Kartu Keluarga</label>
                    <input type="text" class="form-control <?php echo form_error('nomor_kk') ? 'is-invalid' : '' ?>" 
                      id="nomor_kk" name="nomor_kk" 
                      placeholder="Masukkan 16 digit nomor kartu keluarga..."
                      value="<?php echo set_value('nomor_kk') ?>">
                    <div class="invalid-feedback">
                      <?php echo form_error('nomor_kk') ?>
                    </div>
                    <small class="form-text text-muted">
                      Nomor KK harus berupa 16 digit angka
                    </small>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="card-action">
              <button type="submit" class="btn btn-success">
                <i class="fas fa-save mr-2"></i> Simpan
              </button>
              <a href="<?php echo base_url('admin/kartukeluarga') ?>" class="btn btn-danger">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>