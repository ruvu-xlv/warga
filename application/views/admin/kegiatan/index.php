<div class="container">
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
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
          <a href="<?php echo base_url('admin/kegiatan') ?>">list data</a>
        </li>
        </ul>
      </div>
      <!-- <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>btn btn-primary btn-round ms-auto
                <a href="#" class="btn btn-primary btn-round">Add Customer</a>
              </div> -->
    </div>

    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="d-flex align-items-center">
            <h4 class="card-title">List data</h4>
            <a
              class="btn btn-primary btn-round ms-auto" href="<?php echo base_url('admin/kegiatan_tambah') ?>">
              <i class="fa fa-plus"></i>
              Tambah Kegiatan
            </a>
          </div>
        </div>
        <div class="card-body">

          <div class="table-responsive">
            <table
              id="add-row"
              class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Tempat</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Waktu</th>
                  <th>Tempat</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                foreach ($kegiatan as $k) {
                ?>
                  <tr>
                    <td><?php echo $k->nama_kegiatan ?></td>
                    <td><?php echo $k->tanggal_kegiatan ?></td>
                    <td><?php echo $k->waktu_kegiatan ?></td>
                    <td><?php echo $k->tempat_kegiatan ?></td>
                    <td>
                      <div class="form-button-action">

                        <a href="<?php echo base_url() . 'admin/kartukeluarga_edit/' . $k->id_kegiatan; ?>" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url() . 'admin/warga_show/' . $k->id_kegiatan; ?>" class="btn btn-link btn-info"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo base_url().'admin/kartukeluarga_destroy/'.$k->id_kegiatan; ?>" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>