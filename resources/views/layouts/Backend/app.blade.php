<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>HabroERP
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('Backend/css/bootstrap.min.css') }}">
    <!----css3---->
    <link rel="stylesheet" href="{{ asset('Backend/css/custom.css') }}">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        .table-plain tbody tr,
        .table-plain tbody tr:hover,
        .table-plain tbody td {
            background-color: transparent;
            border: none;
        }
    </style>
    <script>
        function display_ct6() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
            hours = x.getHours() % 12;
            hours = hours ? hours : 12;
            var x1 = x.getMonth() + 1 + "/" + x.getDate() + "/" + x.getFullYear();
            x1 = x1 + " - " + hours + ":" + x.getMinutes() + ":" + x.getSeconds() + ":" + ampm;
            document.getElementById('ct6').innerHTML = x1;
            display_c6();
        }

        function display_c6() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct6()', refresh)
        }
        display_c6()
    </script>


    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>




    <div class="wrapper">


        <div class="body-overlay"></div>


        <!-- Sidebar  -->
        @include('layouts.Backend.Partials.sidebar')


        <!-- Page Content  -->
        <div id="content">
            @include('layouts.Backend.Partials.header')

          @yield('content')

        </div>
    </div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('Backend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('Backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('Backend/js/bootstrap.min.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            $('.more-button,.body-overlay').on('click', function() {
                $('#sidebar,.body-overlay').toggleClass('show-nav');
            });

        });
    </script>





</body>

</html>
