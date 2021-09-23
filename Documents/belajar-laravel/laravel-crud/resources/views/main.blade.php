<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>All Posts</title>
</head>
<body>
    <div style="max-width: 900px" class="container max-w-full mx-auto pt-8">
        @yield('content')
    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function(){
    $(document).on('click','#delete',function(e){
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'bg-green-500 text-white px-5 py-2 rounded',
            cancelButton: 'bg-red-500 text-white px-5 py-2 rounded'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            ).then(function(){
                $('#form-delete').submit()
            })
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    })  
})

</script>
</body>
</html>