<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Akun Terdaftar</h3>
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
                </ul>
            </div>
        </div>

        <!-- <h3 class="fw-bold mb-3">List Data</h3> -->
        <div class="d-flex align-items-center mb-4">
            <h4 class="fw-bold">List data</h4>
            <!-- <a
                class="btn btn-primary btn-round ms-auto" href="<?php echo base_url('admin/user_tambah') ?>">
                <i class="fa fa-plus"></i>
                Tambah Akun
            </a> -->
        </div>
        <div class="row">
            <?php foreach ($users as $u) { ?>
                <div class="col-md-6 mb-4"> <!-- Ubah col-md-4 menjadi col-md-6 untuk 2 kolom -->
                    <div class="card card-secondary bg-secondary-gradient h-100"> <!-- Tambahkan h-100 -->
                        <div class="card-body skew-shadow">
                            <div class="text-small text-uppercase fw-bold op-8">
                                Akun Terdaftar
                            </div>
                            <h2 class="py-4 mb-0"><?php echo $u->nama_lengkap ?></h2>
                            <div class="row">
                                <div class="col-8 pe-0">
                                    <h3 class="fw-bold mb-1">Username: <?php echo $u->username ?></h3>
                                    <div class="text-small text-uppercase fw-bold op-8">
                                        NIK: <?php echo $u->nik ?>
                                    </div>
                                </div>
                                <div class="col-4 ps-0 text-end">
                                    <h3 class="fw-bold mb-1">Status</h3>
                                    <div class="text-small text-uppercase fw-bold op-8">
                                        <?php echo $u->role ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-button-action">
                            <!-- <a href="<?php echo base_url() . 'admin/user_edit/' . $u->id_user; ?>" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url() . 'admin/user_destroy/' . $u->id_user; ?>" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a> -->
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>