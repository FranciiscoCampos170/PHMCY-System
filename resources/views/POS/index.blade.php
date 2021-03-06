<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    <link rel="stylesheet" href="{{asset('icons/bold.css')}}">

    <link rel="stylesheet" href="{{asset('css/scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('images/favicon.svg')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @livewireStyles
</head>


<body>
<livewire:p-o-s/>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    window.addEventListener('openModal', event => {
        $("#exampleModal").modal('show');
    })
    window.addEventListener('closeEditProductModal', event => {
        $("#exampleModal").modal('hide');
    })
    window.addEventListener('openCategoryModal', event => {
        $("#listCategoryModal").modal('show');
    })
    window.addEventListener('addCustomer', event => {
        $("#add_customer").modal('show');
    })

    window.addEventListener('openAddQuantityModal', evt => {
        $("#addQuantityModal").modal('show');
    })

    window.addEventListener('closeAddQuantityModal', event => {
        $("#addQuantityModal").modal('hide');
    })
    window.addEventListener('openStockAlert', event => {
        $("#stockAlert").prop('hidden', false);
        window.setTimeout(function() {
            $("#stockAlert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 2000);
    })
</script>
@livewireScripts
</body>

</html>
