<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Akun</h3>
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
                    <a href="<?php echo base_url('admin/user') ?>">list data</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/user_tambah') ?>">tambah</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="card-title">Tambah Akun Warga</div>
                    </div>
                    <form method="post" action="<?php echo base_url('admin/user_store') ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label><br />
                                        <select class="form-control select2" name="nama">
                                            <option value="">-- Nama Lengkap --</option>
                                            <?php foreach ($warga as $w): ?>
                                                <option value="<?php echo $w->nama; ?>"><?php echo $w->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('nama'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="largeInput">Username</label>
                                        <input type="text" class="form-control form-control" name="username"
                                            placeholder="Masukkan username" />
                                        <?php echo form_error('username'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="agama">Role</label>
                                        <select class="form-control" name="role">
                                            <option value="">-- Pilih Role --</option>
                                            <option value="admin">Admin</option>
                                            <option value="warga">Warga</option>
                                        </select>
                                        <?php echo form_error('role'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pekerjaan">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Masukkan password..." />
                                        <?php echo form_error('password'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nomor Induk Kependudukan</label><br />
                                        <select class="form-control select2" name="nik">
                                            <option value="">-- Pilih Nomor Induk Kependudukan --</option>
                                            <?php foreach ($warga as $w): ?>
                                                <option value="<?php echo $w->nik; ?>"><?php echo $w->nik; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php echo form_error('nik'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save mr-2"></i> Simpan 
                            </button>
                            <a href="<?= base_url('admin/warga') ?>" class="btn btn-danger">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>