<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Website</h3>
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
                    <a href="<?php echo base_url('admin/website') ?>">pengaturan</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/website') ?>">website</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Perbarui Website</div>
                    </div>
                    <form method="post" action="<?php echo base_url('admin/website_update') ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group">
                                    <label for="largeInput">Nama Website</label>
                                    <input type="hidden" name="id" value="<?php echo $website->id ?>">
                                    <input type="text" class="form-control form-control" name="title"
                                        placeholder="" value="<?php echo $website->title ?>" />
                                    <?php echo form_error('nama'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Nama Website</label>
                                    <!-- <input type="hidden" name="id" value="<?php echo $website->id ?>"> -->
                                    <input type="text" class="form-control form-control" name="nama"
                                        placeholder="" value="<?php echo $website->nama ?>" />
                                    <?php echo form_error('nama'); ?>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="tanggal_masuk">Deskripsi</label>
                                    <input type="text" class="form-control form-control" name="deskripsi"
                                        placeholder="Masukkan deskripsi..." value="<?php echo $website->deskripsi ?>" />
                                    <?php echo form_error('deskripsi'); ?>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>