<!doctype html>
<html lang="en">
  <!-- [Head] start -->
<head>
    <base href="/public">
    <title>{{ $pageTitle }}</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- [Google Font : Public Sans] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />

    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="{{ asset("../backend/fonts/phosphor/duotone/style.css") }}?v={{ time() }}" />
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="{{ asset("../backend/fonts/tabler-icons.min.css") }}?v={{ time() }}" />

    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ asset("../backend/fonts/feather.css") }}?v={{ time() }}" />

    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="{{ asset("../backend/fonts/fontawesome.css") }}?v={{ time() }}" />

    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="{{ asset("../backend/fonts/material.css") }}?v={{ time() }}" />

    <!-- [Remix Icons] https://remixicon.com -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("../frontend/img/favicon/apple-touch-icon.png") }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("../frontend/img/favicon/favicon-32x32.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("../frontend/img/favicon/favicon-16x16.png") }}">
    <link rel="manifest" href="{{ asset("img/favicon/site.webmanifest") }}"><link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Google Fonts(Raleway & Libre) -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Caslon+Display&amp;family=Outfit:wght@300;400&amp;display=swap">

    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="{{ asset("../backend/css/style.css") }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset("../backend/css/style-preset.css") }}" />
</head>
<!-- [Head] end -->
<body data-pc-preset="preset-1" data-pc-sidebar-theme="dark" data-pc-sidebar-caption="false" data-pc-direction="ltr" data-pc-theme="dark" style="background: #101010;">
