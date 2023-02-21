<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $title }} - ZIEPOS</title>

    <link rel="stylesheet" href="{{ asset('assets') }}/css/main/app.css"/>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/main/app-dark.css"/>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/main/custom.css"/>

    <link rel="shortcut icon" href="{{ asset('assets') }}/images/logo/favicon.svg" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/logo/favicon.png" type="image/png"/>

    <link rel="stylesheet" href="{{ asset('assets') }}/css/shared/iconly.css"/>
    
    <link rel="stylesheet" href="{{ asset('assets') }}/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets') }}/css/pages/datatables.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/extensions/sweetalert2/sweetalert2.min.css"/>

    <link rel="stylesheet" href="{{ asset('assets') }}/extensions/toastify-js/src/toastify.css"/>

    @stack('styles')
</head>