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
                    <a href="<?php echo base_url('admin/warga_edit') ?>">edit</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="card-title">Tambah Warga Mars</div>
                    </div>
                    <?php foreach ($warga as $w) { ?>
                        <form method="post" action="<?php echo base_url('admin/warga_update') ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="largeInput">Nomor induk kependudukan</label>
                                            <input type="hidden" name="id" value="<?php echo $w->nik ?>">
                                            <input type="text" class="form-control form-control" name="nik"
                                                placeholder="Masukkan nomor induk kependudukan..." value="<?php echo $w->nik ?>" />
                                            <?php echo form_error('nik'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="largeInput">Nama lengkap</label>
                                            <input type="text" class="form-control form-control" name="nama" value="<?php echo $w->nama ?>"
                                                placeholder="Masukkan nama lengkap..." />
                                            <?php echo form_error('nama'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $w->tempat_lahir ?>"
                                                placeholder="Masukkan tempat lahir..." />
                                            <?php echo form_error('tempat_lahir'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $w->tanggal_lahir ?>" />
                                            <?php echo form_error('tanggal_lahir'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis kelamin</label>
                                            <select class="form-control" name="jenis_kelamin">
                                                <option value="<?php echo $w->jenis_kelamin ?>"><?php
                                                                    if ($w->jenis_kelamin == 'L') {
                                                                        echo 'Laki-laki';
                                                                    } else {
                                                                        echo 'Perempuan';
                                                                    }
                                                                    ?></option>
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            <?php echo form_error('jenis_kelamin'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control" name="pekerjaan" value="<?php echo $w->pekerjaan ?>"
                                                placeholder="Masukkan pekerjaan..." />
                                            <?php echo form_error('pekerjaan'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="pendidikan">Pendidikan terakhir</label>
                                            <select class="form-control" name="pendidikan">
                                                <option value="<?php echo $w->pendidikan ?>"><?php echo $w->pendidikan ?></option>
                                                <option value="sd">SD</option>
                                                <option value="smp">SMP</option>
                                                <option value="sma/smk">SMA/SMK</option>
                                                <option value="mahasiswa">Mahasiswa</option>
                                            </select>
                                            <?php echo form_error('pendidikan'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select class="form-control" name="agama">
                                                <option value="<?php echo $w->agama ?>"><?php echo $w->agama ?></option>
                                                <option value="islam">Islam</option>
                                                <option value="kristen protestan">Kristen Protestan</option>
                                                <option value="kristen katolik">Kristen Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Buddha</option>
                                                <option value="konghucu">Konghucu</option>
                                            </select>
                                            <?php echo form_error('agama'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" value="<?php echo $w->alamat ?>"
                                            placeholder="Masukkan alamat warga..." />
                                            <?php echo form_error('alamat'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="<?php echo $w->status ?>"><?php echo $w->status ?></option>
                                                <option value="pelajar">Pelajar</option>
                                                <option value="menikah">Menikah</option>
                                                <option value="belum menikah">Belum Menikah</option>
                                            </select>
                                            <?php echo form_error('status'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="">
                                        <div class="form-group">
                                            <label>Nomor kartu keluarga</label><br />
                                            <select class="form-control select2" name="nomor_kk">
                                                <option value="<?php echo $w->nomor_kk ?>"><?php echo $w->nomor_kk ?></option>
                                                <?php foreach ($kartukeluarga as $kk): ?>
                                                    <option value="<?php echo $kk->nomor_kk; ?>"><?php echo $kk->nomor_kk; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php echo form_error('nomor_kk'); ?>
                                        </div>
                                    </div>
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>