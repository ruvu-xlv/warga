    <header class="header-2">
      <div class="page-header min-vh-75 relative" style="background-image: url('<?php echo base_url() ?>assets/materialKit/assets/img/bg-landing.jpg')">
        <span class="mask bg-gradient-dark opacity-4"></span>
        <div class="container">
          <div class="row">
            <div class="col-lg-7 text-center mx-auto">
              <h1 class="text-white font-weight-black pt-3 mt-n5"><?php echo $website->nama; ?></h1>
              <p class="lead text-white mt-3"><?php echo $website->deskripsi; ?></p>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
      <section class="pt-3 pb-4" id="count-stats">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 mx-auto py-3">
              <div class="row">
                <div class="col-md-4 position-relative">
                  <div class="p-3 text-center">
                    <h1 class="text-gradient text-dark"><span id="state1" countTo="<?php echo $kartukeluarga ?>">0</span>+</h1>
                    <h5 class="mt-3">Kartu Keluarga</h5>
                    <p class="text-sm font-weight-normal">Tercatat kartu keluarga penduduk mars saat ini </p>
                  </div>
                  <hr class="vertical dark">
                </div>
                <div class="col-md-4 position-relative">
                  <div class="p-3 text-center">
                    <h1 class="text-gradient text-dark"> <span id="state2" countTo="<?php echo $warga ?>">0</span>+</h1>
                    <h5 class="mt-3">Warga</h5>
                    <p class="text-sm font-weight-normal">Jumlah seluruh penduduk mars sekarang</p>
                  </div>
                  <hr class="vertical dark">
                </div>
                <div class="col-md-4">
                  <div class="p-3 text-center">
                    <h1 class="text-gradient text-dark"><span id="state3" countTo="<?php echo $users ?>">0</span>+</h1>
                    <h5 class="mt-3">Akun</h5>
                    <p class="text-sm font-weight-normal">Masing masing penduduk yang memiliki akun terdaftar di mars</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="my-5 py-5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
              <div class="rotating-card-container">
                <div class="card card-rotate card-background card-background-mask-primary shadow-dark mt-md-0 mt-5">
                  <div class="front front-background" style="background-image: url(https://images.unsplash.com/photo-1569683795645-b62e50fbf103?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80); background-size: cover;">
                    <div class="card-body py-7 text-center">
                      <i class="material-symbols-rounded text-white text-4xl my-3">touch_app</i>
                      <h3 class="text-white">Feel the <br /> Material Kit</h3>
                      <p class="text-white opacity-8">All the Bootstrap components that you need in a development have been re-design with the new look.</p>
                    </div>
                  </div>
                  <div class="back back-background" style="background-image: url(https://images.unsplash.com/photo-1498889444388-e67ea62c464b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1365&q=80); background-size: cover;">
                    <div class="card-body pt-7 text-center">
                      <h3 class="text-white">Discover More</h3>
                      <p class="text-white opacity-8"> You will save a lot of time going from prototyping to full-functional code because all elements are implemented.</p>
                      <a href=".//sections/page-sections/hero-sections.html" target="_blank" class="btn btn-white btn-sm w-50 mx-auto mt-3">Start with Headers</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 ms-auto">
              <div class="row justify-content-start">
                <div class="col-md-6">
                  <div class="info">
                    <i class="material-symbols-rounded text-gradient text-success text-3xl">content_copy</i>
                    <h5 class="font-weight-bolder mt-3">Full Documentation</h5>
                    <p class="pe-5">Built by developers for developers. Check the foundation and you will find everything inside our documentation.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info">
                    <i class="material-symbols-rounded text-gradient text-success text-3xl">flip_to_front</i>
                    <h5 class="font-weight-bolder mt-3">Bootstrap 5 Ready</h5>
                    <p class="pe-3">The world’s most popular front-end open source toolkit, featuring Sass variables and mixins.</p>
                  </div>
                </div>
              </div>
              <div class="row justify-content-start mt-5">
                <div class="col-md-6 mt-3">
                  <i class="material-symbols-rounded text-gradient text-success text-3xl">price_change</i>
                  <h5 class="font-weight-bolder mt-3">Save Time & Money</h5>
                  <p class="pe-5">Creating your design from scratch with dedicated designers can be very expensive. Start with our Design System.</p>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="info">
                    <i class="material-symbols-rounded text-gradient text-success text-3xl">devices</i>
                    <h5 class="font-weight-bolder mt-3">Fully Responsive</h5>
                    <p class="pe-3">Regardless of the screen size, the website content will naturally fit the given resolution.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="my-5 py-5">
        <div class="container">
          <div class="row">
            <div class="row justify-content-center text-center my-sm-5">
              <div class="col-lg-6">
                <span class="badge bg-success mb-3">Infinite combinations</span>
                <h2 class="text-dark mb-0">Huge collection of sections</h2>
                <p class="lead">We have created multiple options for you to put together and customise into pixel perfect pages. </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>