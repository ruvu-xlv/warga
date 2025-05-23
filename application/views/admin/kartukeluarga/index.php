<div class="container">
  <div class="page-inner">
    <div
      class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
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
              class="btn btn-primary btn-round ms-auto" href="<?php echo base_url('admin/kartukeluarga_tambah') ?>">
              <i class="fa fa-plus"></i>
              Tambah Kartu Keluarga
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
                  <th>Nomer Kartu Keluarga</th>
                  <th>Tanggal Masuk</th>
                  <th style="width: 10%">Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nomer Kartu Keluarga</th>
                  <th>Tanggal Masuk</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <?php
                foreach ($kartukeluarga as $k) {
                ?>
                  <tr>
                    <td><?php echo $k->nomor_kk ?></td>
                    <td><?php echo $k->tanggal_masuk ?></td>
                    <td>
                      <div class="form-button-action">

                        <a href="<?php echo base_url() . 'admin/kartukeluarga_edit/' . $k->nomor_kk; ?>" class="btn btn-link btn-primary btn-lg"><i class="fa fa-edit"></i></a>
                        <!-- <button
                          type="button"
                          class="btn btn-link btn-primary btn-lg"
                          data-bs-toggle="modal"
                          data-bs-target="#editRowModal"
                          data-bs-whatever="<?php echo $k->nomor_kk ?>"
                          data-bs-tanggal="<?php echo $k->tanggal_masuk ?>"
                          data-bs-id="<?php echo $k->nomor_kk ?>">
                          <i class="fa fa-edit"></i>
                        </button> -->

                        <!-- <button
                          type="button"
                          data-bs-toggle="tooltip"
                          title=""
                          class="btn btn-link btn-danger"
                          data-original-title="Remove">
                          <i class="fa fa-times"></i>
                        </button> -->
                        <a href="<?php echo base_url().'admin/kartukeluarga_destroy/'.$k->nomor_kk; ?>" class="btn btn-link btn-danger"><i class="fa fa-times"></i></a>
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