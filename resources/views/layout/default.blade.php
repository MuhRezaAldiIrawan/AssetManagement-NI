<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Marga Utama Nusantara</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/others/mun.png')}}">

    <!-- page css -->
    <link href="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">

    <!-- Core css -->
    <link href="{{ asset('css/app.min.css')}}" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            @include('components.header')
            <!-- Header END -->

            <!-- Side Nav START -->
            @include('components.sidebar')
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                
                <!-- Content Wrapper START -->
                @yield('content')
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                {{-- @include('components.footer') --}}
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->

            <!-- Search End-->

            <!-- Quick View START -->

            <!-- Quick View END -->
        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="{{ asset(('js/vendors.min.js')) }}"></script>

    <!-- page js -->
    <script src="{{ asset('vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/pages/dashboard-project.js') }}"></script>

    <!-- Core JS -->
    <script src="{{ asset('js/app.min.js') }}"></script>

</body>

</html>