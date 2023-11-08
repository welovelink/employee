@extends('layouts.layout')

@section('title', ' จัดการข้อมูลการลา')

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
                        <li class="breadcrumb-item active">จัดการข้อมูลการลา</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ข้อมูลการลา</h3>

                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link btn-sm btn-success active" href="{{url('leave/create')}}"><i
                                    class="fa fa-plus-circle"></i> เพิ่มข้อมูล</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover tbl-data">
                            <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ประเภทการลา</th>
                                <th>จำนวนวันลา</th>
                                <th>ตั้งแต่วันที่</th>
                                <th>ถึงวันที่</th>
                                <th>วันที่ส่งคำขอ</th>
                                <th>สถานะ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($record as $no => $row)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{ $row->leave_type }}</td>
                                    <td>{{ $row->count }}</td>
                                    <td>{{ $row->start_date }}</td>
                                    <td>{{ $row->end_date}}</td>
                                    <td>{{ $row->created_at}}</td>
                                    <td>{{ $row->leave_status }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

@stop

@push('styles')

    <style>
        table.tbl-data th, table.tbl-data td  {
            text-align: center;
        }

        table.tbl-data th:nth-child(1) {
            width: 50px;
        }

        table.tbl-data th:nth-child(2),table.tbl-data th:nth-child(3) {
            width: 100px;
        }

        table.tbl-data th:nth-child(4) {
            width: 150px;
        }

        table.tbl-data th:nth-child(5) {
            width: 140px;
        }

        table.tbl-data th:nth-child(6) {
            width: 150px;
        }

        table.tbl-data th:last-child {
            width: 150px;
        }
    </style>

@endpush

@push('scripts')
    <script src="{{ asset('plugins/jquery/jquery.mask.js') }}"></script>
    <script type="text/javascript">
        (function ($) {
            $('input.date').mask('00/00/0000');
            $("table tbody tr").css("cursor", "pointer")
            $(document).on("click", "table tbody tr", function () {
                const url = $(this).data("url");
                $(location).prop("href", url)
            });
        })(jQuery);
    </script>
@endpush
