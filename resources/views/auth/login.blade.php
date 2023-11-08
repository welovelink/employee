<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee - Log in</title>
    <base href="{{ url('') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link href="{{ asset('plugins/sweetalert/sweetalert2.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>Admin</b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Employee Leave</p>

            <form id="WebForm" method="post" action="login">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('plugins/sweetalert/sweetalert2.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
<script>


    (function ($) {
        /*$(document).on('click', 'button', function () {
            let email = $('input[name="email"]').val();
            let password = $('input[name="password"]').val();
            if(email.trim().length <= 0){
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'กรุณากรอก username',
                    confirmButtonText: 'ปิด',
                    confirmButtonColor: "#DD6B55",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('input[name="email"]').focus();
                    }
                })
            }else if(password.trim().length <= 0){
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'กรุณากรอก password',
                    confirmButtonText: 'ปิด',
                    confirmButtonColor: "#DD6B55",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('input[name="password"]').focus();
                    }
                })
            }else{
                $.ajax({
                    url: 'http://localhost/api/v1/login',
                    type: "POST",
                    data: $('#WebForm').serialize()
                }).done(function (result) {
                    console.log(result);
                });
            }

        });*/
        /*$('#WebForm').validate({

            rules: rules,

            submitHandler: function (form) {
                let data = $(form).serializeArray();

                app.showSpinner();
                $.ajax({
                    method: "post",
                    url: app.url('accept/save-more-info'),
                    data: data
                }).done(function (rs) {


                    if(rs.status === 'ok'){
                        // Swal.fire({
                        //     icon: 'success',
                        //     title: 'บันทึกข้อมูลของท่านเรียบร้อยแล้ว',
                        //     text: rs.message,
                        //     confirmButtonText: 'ปิด'
                        // }).then((result) => {
                        //     if (result.isConfirmed) {

                        //     }
                        // })

                        app.hideSpinner();
                        let apply_token= rs.apply_token;
                        let url = app.url('accept/consent-form/') + apply_token;
                        $(location).prop("href", url)
                    }
                });
            }
        });

        */
    })(jQuery);

</script>
</body>
</html>
