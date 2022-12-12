<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Loveable - @yield("title") </title>

    @include('layouts.css.style_css')

    @yield("component_css")

</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar.v_sidebar')
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.navbar.v_navbar')

                <div class="container-fluid">
                  @yield("title_breadcrumb")
                    <hr>
                  @yield("content")
                </div>
            </div>

            <!-- Footer -->
            @include('layouts.footer.v_footer')
            <!-- End Footer -->
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    @include('layouts.logout-modal.v_logout')
    <!-- End Logout -->

    @include('layouts.js.style_js')

    @yield("component_js")

</body>

</html>
