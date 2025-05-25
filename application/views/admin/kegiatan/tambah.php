<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Kegiatan</h3>
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
                    <a href="<?php echo base_url('admin/kegiatan') ?>">List Data</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/kegiatan_tambah') ?>">Tambah</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Tambah Kegiatan</div>
                    </div>

                    <form method="post" action="<?php echo base_url('admin/kegiatan_store') ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="largeInput">Nama Kegiatan</label>
                                        <input type="text" class="form-control form-control" name="nama_kegiatan"
                                            placeholder="Masukkan nama kegiatan..." />
                                        <?php echo form_error('nama_kegiatan'); ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="largeInput">Tanggal Kegiatan</label>
                                        <input type="date" class="form-control form-control" name="tanggal_kegiatan"
                                            placeholder="Masukkan tanggal kegiatan..." />
                                        <?php echo form_error('tanggal_kegiatan'); ?>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="largeInput">Waktu Kegiatan</label>
                                        <input type="time" class="form-control form-control" name="waktu_kegiatan"
                                            placeholder="Masukkan waktu kegiatan..." />
                                        <?php echo form_error('waktu_kegiatan'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="largeInput">Tempat Kegiatan</label>
                                        <input type="text" class="form-control form-control" name="tempat_kegiatan"
                                            placeholder="Masukkan tempat kegiatan..." />
                                        <?php echo form_error('tempat_kegiatan'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="largeInput">Deskripsi Kegiatan</label>
                                        <textarea type="text" id="editor" class="form-control form-control" name="deskripsi_kegiatan"
                                            placeholder="Masukkan nama kegiatan..."></textarea>
                                        <?php echo form_error('deskripsi_kegiatan'); ?>
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