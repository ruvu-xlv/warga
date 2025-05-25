<footer class="footer">
  <div class="container-fluid d-flex justify-content-between">
    <nav class="pull-left">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="http://www.themekita.com">
            ThemeKita
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> Help </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"> Licenses </a>
        </li>
      </ul>
    </nav>
    <div class="copyright">
      2024, made with <i class="fa fa-heart heart text-danger"></i> by
      <a href="http://www.themekita.com">ThemeKita</a>
    </div>
    <div>
      Distributed by
      <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
    </div>
  </div>
</footer>
</div>

<!-- Custom template | don't include it in your project! -->
<div class="custom-template">
  <div class="title">Settings</div>
  <div class="custom-content">
    <div class="switcher">
      <div class="switch-block">
        <h4>Navbar Header</h4>
        <div class="btnSwitch">
          <button
            type="button"
            class="changeTopBarColor"
            data-color="dark"></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="blue"></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="purple"></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="light-blue"></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="green"></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="orange"></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="red"></button>
          <button
            type="button"
            class="selected changeTopBarColor"
            data-color="white"></button>
          <br />
          <button
            type="button"
            class="changeTopBarColor"
            data-color="dark2"></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="blue2"></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="purple2"></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="light-blue2"></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="green2"></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="orange2"></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="red2"></button>
        </div>
      </div>
      <div class="switch-block">
        <h4>Sidebar</h4>
        <div class="btnSwitch">
          <button
            type="button"
            class="changeSideBarColor"
            data-color="white"></button>
          <button
            type="button"
            class="selected changeSideBarColor"
            data-color="dark"></button>
          <button
            type="button"
            class="changeSideBarColor"
            data-color="dark2"></button>
        </div>
      </div>
    </div>
  </div>
  <div class="custom-toggle">
    <i class="icon-settings"></i>
  </div>
</div>
<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/core/jquery-3.7.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/core/bootstrap.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Chart JS -->
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/plugin/jsvectormap/world.js"></script>

<!-- Sweet Alert -->
<script src="<?php base_url() ?>assets/kaiadmin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Kaiadmin JS -->
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/kaiadmin.min.js"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/setting-demo.js"></script>
<script src="<?php echo base_url() ?>assets/kaiadmin/assets/js/demo.js"></script>
<script>
  $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#177dff",
    fillColor: "rgba(23, 125, 255, 0.14)",
  });

  $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#f3545d",
    fillColor: "rgba(243, 84, 93, .14)",
  });

  $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#ffa534",
    fillColor: "rgba(255, 165, 52, .14)",
  });
</script>


<!-- Load jQuery (pastikan sudah ada) -->
<script src="<?= base_url('assets/kaiadmin/jquery.min.js') ?>"></script>

<!-- Load Select2 dari folder dist -->
<script src="<?= base_url('assets/kaiadmin/select2/dist/js/select2.min.js') ?>"></script>

<!-- Untuk bahasa Indonesia (jika perlu) -->
<script src="<?= base_url('assets/kaiadmin/select2/dist/js/i18n/id.js') ?>"></script>

<script>
$(document).ready(function() {
    $('.select2').select2({
        allowClear: true,
        language: 'id' 
    });
    
    $('.js-example-theme-multiple').select2({
        theme: "classic",
    });
});
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2({
      
      allowClear: true
    });
  });
</script> -->

<!-- Include QR Code library -->
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script>
// Generate QR codes for each resident
document.addEventListener('DOMContentLoaded', function() {
    <?php foreach ($warga as $w) { ?>
        var qrData = `NIK: <?php echo $w->nik ?>\n` +
                     `Nama: <?php echo $w->nama ?>\n` +
                     `TTL: <?php echo $w->tempat_lahir ?>, <?php echo date('d-m-Y', strtotime($w->tanggal_lahir)) ?>\n` +
                     `Alamat: <?php echo $w->alamat ?>\n` +
                     `KK: <?php echo $w->nomor_kk ?>`;
        
        new QRCode(document.getElementById("qrcode-<?php echo $w->nik ?>"), {
            text: qrData,
            width: 180,
            height: 180,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    <?php } ?>
});

// Function to download QR code
function downloadQR(nik, nama) {
    const canvas = document.querySelector('#qrcode-' + nik + ' canvas');
    const link = document.createElement('a');
    link.download = 'QR-' + nama + '.png';
    link.href = canvas.toDataURL('image/png');
    link.click();
}
</script>

<!-- ckEditor -->
 <script src="<?php echo base_url() ?>assets/kaiadmin/ckeditor/ckeditor.js"></script>
	<script>
	  $(function () {
	    	CKEDITOR.replace('editor')
	  });
	</script>
</body>

</html>