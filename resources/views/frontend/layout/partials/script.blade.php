<!-- ***** All jQuery Plugins ***** -->

    <!-- jQuery(necessary for all JavaScript plugins) -->
    <script src="{{ asset('frontend/assets/js/jquery/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('frontend/assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Plugins js -->
    <script src="{{ asset('frontend/assets/js/plugins/plugins.min.js') }}"></script>


    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var Toast = Swal.mixin({
            toast: true,
            animation: true,
            position: 'top-right',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    </script>

    <!-- Active js -->
    <script src="{{ asset('frontend/assets/js/active.js') }}"></script>
