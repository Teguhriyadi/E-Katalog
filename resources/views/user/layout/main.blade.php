
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Loveable - @yield("title")</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    @include("user.layout.partials.css.style_css")

</head>

<body>

    @include("user.layout.partials.header.header")

    @yield("content")

    @include("user.layout.partials.footer.footer")

    @include("user.layout.partials.js.style_js")

</body>

</html>
