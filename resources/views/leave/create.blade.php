@extends('layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>จัดการข้อมูลการลา</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">หน้าหลัก</a></li>
                        <li class="breadcrumb-item"><a href="{{url('leave')}}">จัดการข้อมูลการลา</a></li>
                        <li class="breadcrumb-item active">เพิ่มข้อมูล</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <form id="WebForm" action="{{url('backend/user/add')}}" method="post">

                <div class="card-header">
                    <h3 class="card-title">เพิ่มข้อมูลการลา</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>ประเภทการลา</label>
                                        <select class="custom-select" name="leave_type">
                                            <option value="sick">ลาป่วย</option>
                                            <option value="personal">ลากิจ</option>
                                            <option value="vacation">ลาพักผ่อน</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>ตั้งแต่วันที่</label>
                                        <input type="text" name="start_date" class="form-control input-date"
                                               placeholder="วว/ดด/ปปปป พุทธศักราช">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>ถึงวันที่</label>
                                        <input type="text" name="end_date" class="form-control input-date"
                                               placeholder="วว/ดด/ปปปป พุทธศักราช">
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>สาเหตุการลา</label>
                                        <input type="text" name="leave_cause" class="form-control"
                                               placeholder="สาเหตุการลา">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">บันทึก</button>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@stop

@push('scripts')
    <script src="{{ asset('plugins/jquery/jquery.mask.js') }}"></script>
    <script src="{{ asset('js/popper.js') }} "></script>
    <script src="{{ asset('js/owl.carousel.min.js') }} "></script>
    <script src="{{ asset('js/main.js') }} "></script>
    <script>
        (function ($) {
            $('input.input-date').mask('00/00/0000');
            $('#WebForm').validate({

                rules: {
                    start_date: {
                        required: true
                    },
                    end_date: {
                        required: true
                    },
                    leave_cause: {
                        required: true
                    },
                },
                submitHandler: function (form) {
                    let data = $(form).serializeArray();
                    app.showSpinner();
                    $.ajax({
                        method: "post",
                        url: app.url('service/request-leave'),
                        data: data
                    }).done(function (rs) {
                        if(rs.status === 'ok'){
                            Swal.fire({
                                icon: 'success',
                                title: "สำเร็จ !!!",
                                text: "บันทึกข้อมูลของท่านเรียบร้อยแล้ว",
                                confirmButtonText: 'ปิด'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    app.hideSpinner();
                                    $(location).prop("href", app.url('leave'))
                                }
                            })
                        }
                    });
                }
            });

            jQuery.extend(jQuery.validator.messages, {
                required: "กรุณากรอกข้อมูล",
                remote: "Please fix this field.",
                email: "Please enter a valid email address.",
                url: "Please enter a valid URL.",
                date: "Please enter a valid date.",
                dateISO: "Please enter a valid date (ISO).",
                number: "Please enter a valid number.",
                digits: "Please enter only digits.",
                creditcard: "Please enter a valid credit card number.",
                equalTo: "Please enter the same value again.",
                accept: "Please enter a value with a valid extension.",
                maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
                minlength: jQuery.validator.format("Please enter at least {0} characters."),
                rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
                range: jQuery.validator.format("Please enter a value between {0} and {1}."),
                max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
                min: jQuery.validator.format("Please enter a value greater than or equal to {0}."),
                inheritValidate: "กรุณากรอกข้อมูล",
                narcoticValidate: "กรุณาระบุชื่อสิ่งเสพติดอย่างน้อย 1 ชนิด"
            });
        })(jQuery);

    </script>
@endpush
