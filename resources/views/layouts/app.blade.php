<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('icons/bold.css')}}">

    <link rel="stylesheet" href="{{asset('css/scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('images/favicon.svg')}}" type="image/x-icon">
    @livewireStyles
</head>


<body>
<div id="app">
    @include('layouts.sidebar')
    <div id="main">

        <div class="page-content">
            @yield('container')
        </div>
        @include('layouts.footer')

    </div>
</div>
<script>



    window.addEventListener('swal:modal', event => {

        swal({

            title: event.detail.message,

            text: event.detail.text,

            icon: event.detail.type,

        });

    });



    window.addEventListener('swal:confirm', event => {

        swal({

            title: event.detail.message,

            text: event.detail.text,

            icon: event.detail.type,

            buttons: true,

            dangerMode: true,

        })

            .then((willDelete) => {

                if (willDelete) {

                    window.livewire.emit('remove');

                }

            });

    });
</script>
<script src="{{{asset('js/perfect-scrollbar.min.js')}}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{asset('js/apexcharts.js')}}"></script>
<script src="{{asset('js/dashboard.js')}}"></script>

<script src="{{asset('js/main.js')}}"></script>
@livewireScripts
</body>

</html>
