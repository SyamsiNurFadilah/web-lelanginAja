       <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bold ms-5">lelanginAja</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
            </a>
          </div>

          <div class="menu-divider mt-0"></div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item {{ Route::is('admin.dashboard') ? 'active open' : '' }}">
              <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Beranda</div>
              </a>
            </li>

            <!-- Layouts -->
            <li class="menu-item {{ Route::is('admin.bidder-list.index') || Route::is('admin.auctioneer-list.index') || Route::is('admin.auctioneer-verification.index') || Route::is('admin.index') ? 'active open' : '' }} ">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div class="text-truncate" data-i18n="Layouts">Kelola Pengguna</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item {{ Route::is('admin.bidder-list.index') ? 'active' : '' }}">
                  <a href="{{ route('admin.bidder-list.index') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Without menu">Daftar Penawar</div>
                  </a>
                </li>
                <li class="menu-item {{ Route::is('admin.auctioneer-list.index') ? 'active' : '' }}">
                  <a href="{{ route('admin.auctioneer-list.index') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Without menu">Daftar Pelelang</div>
                  </a>
                </li>
                <li class="menu-item {{ Route::is('admin.auctioneer-verification.index') ? 'active' : '' }}">
                  <a href="{{ route('admin.auctioneer-verification.index') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Without menu">Verifikasi Pelelang</div>
                  </a>
                </li>
                <li class="menu-item {{ Route::is('admin.index') ? 'active' : '' }}">
                  <a href="{{ route('admin.index') }}" class="menu-link">
                    <div class="text-truncate" data-i18n="Without navbar">Tambah Admin Baru</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Front Pages -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div class="text-truncate" data-i18n="Front Pages">Kelola Barang</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/landing-page.html"
                    class="menu-link"
                    target="_blank">
                    <div class="text-truncate" data-i18n="Landing">Daftar Semua Barang</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/landing-page.html"
                    class="menu-link"
                    target="_blank">
                    <div class="text-truncate" data-i18n="Landing">Kategori Barang</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/pricing-page.html"
                    class="menu-link"
                    target="_blank">
                    <div class="text-truncate" data-i18n="Pricing">Barang Pending</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/payment-page.html"
                    class="menu-link"
                    target="_blank">
                    <div class="text-truncate" data-i18n="Payment">Barang Ditolak</div>
                  </a>
                </li>
              </ul>
            </li>
            

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-coin"></i>
                <div class="text-truncate" data-i18n="Front Pages">Penawaran</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/landing-page.html"
                    class="menu-link"
                    target="_blank">
                    <div class="text-truncate" data-i18n="Landing">Penawaran Terbaru</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a
                    href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/front-pages/pricing-page.html"
                    class="menu-link"
                    target="_blank">
                    <div class="text-truncate" data-i18n="Pricing">Cek Pemenang</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bar-chart-alt"></i>
                <div class="text-truncate" data-i18n="Front Pages">Laporan</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->