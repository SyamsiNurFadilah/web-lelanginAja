<!doctype html>

<html
  lang="en"
  class="layout-menu-fixed layout-compact"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('/vendor/fonts/iconify-icons.css') }}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{ asset('/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- endbuild -->

    <link rel="stylesheet" href="{{ asset('/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="{{ asset('/js/config.js') }}"></script>

    <!-- Loading Screen -->
    <div id="loading-screen" style="display:none; position:fixed; z-index:9999; top:0; left:0; right:0; bottom:0; background-color: rgba(255, 255, 255, 0.7); justify-content:center; align-items:center;">
        <lottie-player
            src="/lottie/loader.json"
            background="transparent"
            speed="1"
            style="width: 200px; height: 200px;"
            loop
            autoplay>
        </lottie-player>
    </div>

    <!-- Lottie Library -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const links = document.querySelectorAll('.menu-link[href]:not([href="javascript:void(0);"])');
            links.forEach(link => {
                link.addEventListener('click', function (e) {
                    document.getElementById("loading-screen").style.display = "flex";
                });
            });
        });
    </script>

    <script>
    function hideLoadingScreen() {
        const loadingScreen = document.getElementById('loading-screen');
        if (loadingScreen) {
            loadingScreen.style.display = 'none';
        }
    }

    // Saat halaman dimuat normal
    window.addEventListener('load', hideLoadingScreen);

    // Saat halaman kembali dari cache (back/forward)
    window.addEventListener('pageshow', hideLoadingScreen);
</script>


    @yield('css')

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        @include('partials.admin.sidebar')

        <!-- Layout container -->
        <div class="layout-page">

            @include('partials.admin.navbar')

            @yield('content')

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
    <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->

    <script src="{{ asset('/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>

    <script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->

    <script src="{{ asset('/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function confirmDeleteAdmin(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus admin ini?',
            text: "Data admin tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-delete-admin' + id).submit();
            }
        });
      }
    </script>

    <script>
    function confirmBlock(id) {
        Swal.fire({
            title: 'Yakin ingin memblokir pelelang ini?',
            text: "Status pelelang tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, blokir!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-block-' + id).submit();
            }
        });
      }
    </script>

    <script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus pelelang ini?',
            text: "Data pelelang tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-delete-' + id).submit();
            }
        });
      }
    </script>

  <script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
            showConfirmButton: true
        });
    @endif
  </script>

  </body>
</html>
