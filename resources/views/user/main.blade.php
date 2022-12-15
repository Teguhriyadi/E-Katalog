<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>STUDIO FOTO</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    @include("user.layout.partials.css.style_css")

</head>

<body>
    <!-- ======= Header ======= -->
    @include("user.layout.partials.header.header")
    <!-- End Header -->

    <main id="main">
        @yield("content")

        <!-- ======= Contact Section ======= -->
        @include("user.layout.partials.contact.v_contact")
        <!-- ======= Footer ======= -->
        @include("user.layout.partials.footer.footer")
        <!-- End Footer -->
    </main>
    <!-- End #main -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <div id="preloader"></div>

    @include('user.layout.partials.js.style_js')

</body>

</html>
