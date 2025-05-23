<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Warga</h3>
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
                    <a href="<?php echo base_url('admin/warga') ?>">list data</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/warga_store') ?>">detail</a>
                </li>
            </ul>
        </div>
        <?php foreach ($warga as $w) { 
            // Prepare data for QR code
            $qrData = "NIK: ".$w->nik."\n";
            $qrData .= "Nama: ".$w->nama."\n";
            $qrData .= "TTL: ".$w->tempat_lahir.", ".date('d-m-Y', strtotime($w->tanggal_lahir))."\n";
            $qrData .= "Alamat: ".$w->alamat."\n";
            $qrData .= "KK: ".$w->nomor_kk;
            ?>
            <div class="row">
                <!-- Main Form Column -->
                <div class="col-md-8">
                    <div class="card card-form">
                        <div class="card-header bg-primary">
                            <div class="card-title text-white">
                                <i class="fas fa-user mr-2"></i> Informasi Pribadi Warga
                            </div>
                        </div>
                        <form method="post" action="<?php echo base_url('admin/warga_show') ?>">
                            <div class="card-body">
                                <!-- [Form content remains exactly the same as before] -->
                                <!-- Personal Information Section -->
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <h5 class="section-title">Identitas Diri</h5>
                                        <hr class="divider">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="id" value="<?php echo $w->nik ?>">
                                        <input type="text" class="form-control" name="nik" value="<?php echo $w->nik ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $w->nama ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo ($w->jenis_kelamin == 'L') ? 'Laki-laki' : 'Perempuan'; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tempat/Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $w->tempat_lahir . ', ' . date('d-m-Y', strtotime($w->tanggal_lahir)) ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $w->agama ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pendidikan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $w->pendidikan ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $w->pekerjaan ?>" readonly>
                                    </div>
                                </div>

                                <div class="row mb-4 mt-4">
                                    <div class="col-md-12">
                                        <h5 class="section-title">Alamat Domisili</h5>
                                        <hr class="divider">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" 
                                        rows="2" readonly><?php echo $w->alamat ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $w->status ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nomor Kartu Keluarga</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $w->nomor_kk ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                

                <div class="col-md-4">
                    <!-- QR Code Card -->
                    <div class="card card-form mb-4">
                        <div class="card-header bg-primary">
                            <div class="card-title text-white">
                                <i class="fas fa-qrcode mr-2"></i> Kode QR Data Warga
                            </div>
                        </div>
                        <div class="card-body text-center">

                            <div id="qrcode-<?php echo $w->nik ?>" class="mb-3"></div>
                            <p class="text-muted small">Scan QR code untuk melihat data warga</p>

                            <button onclick="downloadQR('<?php echo $w->nik ?>', '<?php echo $w->nama ?>')" 
                                    class="btn btn-sm btn-primary mt-2">
                                <i class="fas fa-download mr-2"></i> Download QR
                            </button>
                        </div>
                    </div>
                    
                    <div class="card card-form">
                        <div class="card-body">
                            <div class="d-flex flex-column">
                                <a href="<?php echo base_url('admin/warga') ?>" class="btn btn-danger mb-3">
                                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
                                </a>
                                <a href="<?php echo base_url('admin/warga_edit/' . $w->nik) ?>" class="btn btn-warning">
                                    <i class="fas fa-edit mr-2"></i> Edit Data
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

