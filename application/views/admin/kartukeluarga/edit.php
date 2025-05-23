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
                    <a href="<?php echo base_url('admin/kartukeluarga') ?>">list data</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/kartukeluarga_edit') ?>">edit</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="card-title">Perbarui Kartu Keluarga</div>
                    </div>
                    <?php foreach ($kartukeluarga as $k) { ?>

                        <form method="post" action="<?php echo base_url('admin/kartukeluarga_update') ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="largeInput">Nomor Kartu Keluarga</label>
                                        <input type="hidden" name="id" value="<?php echo $k->nomor_kk ?>">
                                        <input type="text" class="form-control form-control" name="nomor_kk"
                                            placeholder="Masukkan nomor kartu keluarga baru..." value="<?php echo $k->nomor_kk ?>" />
                                        <?php echo form_error('kk'); ?>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label for="tanggal_masuk">Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tanggal_masuk"
                                            value="<?php echo isset($k->tanggal_masuk) ? $k->tanggal_masuk : ''; ?>" />
                                        <?php echo form_error('tanggal_masuk'); ?>
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
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>