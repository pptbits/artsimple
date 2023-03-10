@extends('layouts.main')

@section('title')
    ArtSimple
@endsection

<style>
    .tmgin-top {
        margin-top: 15px !important;
    }

    .tmgin-left {
        margin-left: 10px !important;
    }

    .tmgin-right {
        margin-right: 10px !important;
    }

    .tmgin-bottom {
        margin-bottom: 15px !important;
    }

    .table.dataTable {
        border-collapse: collapse !important;
    }

    .thead {
        display: table-header-group;
        vertical-align: middle;
        border-color: inherit;
    }

    .tr {
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
    }

    .th {
        display: table-cell;
        vertical-align: inherit;
        font-weight: bold;
        text-align: -internal-center;
    }

    .table td,
    .table th {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #e9ecef;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #e9ecef;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #e9ecef;
    }

    .table-bordered thead td,
    .table-bordered thead th {
        border-bottom-width: 2px;
    }

    .table.dataTable td,
    table.dataTable th {
        -webkit-box-sizing: content-box;
        box-sizing: content-box;
    }

    .thead_txt_center>tr>th {
        text-align: center !important;
    }

    .table>thead>tr>th {
        border-bottom-color: #ccc;
    }

    .table.dataTable.nowrap th,
    table.dataTable.nowrap td {
        white-space: nowrap;
    }

    .table.dataTable thead .sorting,
    table.dataTable thead .sorting_asc,
    table.dataTable thead .sorting_desc,
    table.dataTable thead .sorting_asc_disabled,
    table.dataTable thead .sorting_desc_disabled {
        cursor: pointer;
        position: relative;
    }

    .table.table-bordered.dataTable th,
    table.table-bordered.dataTable td {
        border-left-width: 0;
    }

    .table.dataTable thead>tr>th.sorting_asc,
    .table.dataTable thead>tr>th.sorting_desc,
    .table.dataTable thead>tr>th.sorting,
    .table.dataTable thead>tr>td.sorting_asc,
    .table.dataTable thead>tr>td.sorting_desc,
    .table.dataTable thead>tr>td.sorting {
        padding-right: 30px;
    }

    .modal-open .modal {
        overflow-x: hidden;
        overflow-y: auto;
    }

    .fade.show {
        opacity: 1;
    }

    .modal {
        z-index: 99999999999;
    }

    .modal {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1050;
        display: none;
        overflow: hidden;
        outline: 0;
    }

    .fade {
        opacity: 0;
        transition: opacity .15s linear;
    }

    .modal-dialog {
        position: relative;
        width: auto;
        margin: 10px;
    }

    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 500px;
            margin: 30px auto;
        }
    }

    .modal.fade .modal-dialog {
        transition: -webkit-transform .3s ease-out;
        transition: transform .3s ease-out;
        transition: transform .3s ease-out, -webkit-transform .3s ease-out;
        -webkit-transform: translate(0, -25%);
        transform: translate(0, -25%);
    }

    .modal.show .modal-dialog {
        -webkit-transform: translate(0, 0);
        transform: translate(0, 0);
    }

    .modal-content {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 0.3rem;
        outline: 0;
    }

    .modal-body {
        position: relative;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 15px;
    }

    .modal-header {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 15px;
        border-bottom: 1px solid #e9ecef;
    }

    .button.close {
        padding: 0;
        background: 0 0;
        border: 0;
        -webkit-appearance: none;
    }

    .button.close {
        margin-top: 7px;
        margin-bottom: 0;
    }

    .close {
        font-size: 16px;
        margin-top: 5px;
    }

    .close {
        cursor: pointer;
    }

    .close {
        float: right;
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1;
        color: #000;
        text-shadow: 0 1px 0 #fff;
        opacity: .5;
    }

    .pagination {
        display: flex;
        padding-left: 0;
        list-style: none;
        float: right;
    }

    .offset-4 {
        margin-left: 0% !important;
    }

    .mb {
        margin-bottom: 10px;
    }
</style>

@section('mainbody')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="tmgin-top">&nbsp;<i class="fa fa-chevron-circle-right"></i>&nbsp;Package</h4>
                <div class="card">
                    <div class="card-header card_head_modify" style=" background-color: black; ">
                        <div class="row mt-2">
                            <div class="col-md-10">
                                <h5 class="pull-left pt-1" style="font-size: 18px;color:white;">Package</h5>
                            </div>
                            <div class="col-md-2">
                                <button onclick="modal()" class="btn btn-mini form-control"
                                    style="color: black; background-color: white !important;"> <i class="fa fa-plus"
                                        aria-hidden="true"></i> Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-block tmgin-top tmgin-left tmgin-right">
                        <div class="row">
                            <div class="dt-responsive table-responsive">
                                <table id="table_data" style="width:100%;"
                                    class="table table-striped table-bordered nowrap">
                                    <thead class="thead_txt_center">
                                        <tr style="width:100%;">
                                            <th>#</th>
                                            <th>Package Name</th>
                                            <th>Price</th>
                                            <th>Posting</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody_txt_center" style="font-size: 14px;">
                                        @if (isset($package))
                                            @foreach ($package as $item => $value)
                                                <tr>
                                                    <td>{{ $item + 1 }}</td>
                                                    <td style="text-align: left !important;">
                                                        <p> {{ isset($value) ? $value->name : '' }}</p>
                                                    </td>
                                                    <td>
                                                        <p> {{ $value->price }} THB</p>
                                                    </td>
                                                    <td>
                                                        <p> {{  $value->posting }} Posting</p>
                                                    </td>
                                                    <td>
                                                        <p> {{ $value->day }} days</p>
                                                    <td>
                                                        <div class="row">
                                                            <div class="offset-4 col-1">
                                                                {{-- <button onclick="edit_modal({{ $value->id }})" class="btn btn-info btn-round btn-mini">???????????????</button> --}}
                                                                <a href="{{ url('package/edit/' . $value->id) }}">
                                                                    <button class="btn btn-info btn-round btn-mini"
                                                                        style="border-radius: 50px; color: white; font-size: 10px;">???????????????</button>
                                                                </a>
                                                                <button onclick="del_user({{ $value->id }})"
                                                                    class="btn btn-danger btn-round btn-mini"
                                                                    style="border-radius: 50px; font-size: 10px;">????????????????????????</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width:50%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Package</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    <form action="{{ url('package/store') }}" method="POST" id="gen_form" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12 mb">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right" style="text-align: right;">Name :
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="pack_name" id="pack_name" value=""
                                                class="form-control" placeholder="Package Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right" style="text-align: right;">Date :
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" name="day" id="day" value=""
                                                class="form-control" placeholder="Day" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right" style="text-align: right;">Posting
                                            : </label>
                                        <div class="col-md-10">
                                            <input type="number" name="posting" id="posting" value=""
                                                class="form-control" placeholder="Posting" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right" style="text-align: right;">Price :
                                        </label>
                                        <div class="col-md-10">
                                            <input type="number" name="price" id="price" value=""
                                                class="form-control" placeholder="Price" required>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="id" id="id">
                            </div>
                            <div class="row">
                                <div class="col-md-3 tmgin-top" style="margin: auto; text-align: center">
                                    <button type="submit" id="submit"
                                        class="form-control btn btn-primary">{{ isset($package) ? 'Update' : 'Save' }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#table_data').DataTable({});
            @if (!empty(Session::get('error')) and Session::get('error') == 'error')
                swal({
                    title: 'Duplicate Mission name',
                    type: 'warning',
                    confirmButtonColor: '#999999',
                    confirmButtonText: 'Close'
                }).then((result) => {
                    {
                        {
                            Session::put('error', '-')
                        }
                    }
                })
            @endif
        });

        function modal() {
            $('#gen_form').attr('action', "{!! url('package/store') !!}");
            $('#name').val('');
            $('#submit').text('Save');
            $('#exampleModal').modal('toggle');
        }

        function edit_modal(id) {
            $('#gen_form').attr('action', "{!! url('package/update') !!}");
            $('#day').val('');
            $('#posting').val('');
            $('#price').val('');
            $('#submit').text('Update');
            $.ajax({
                type: "GET",
                url: "{!! url('package/edit/" + id + "') !!}",
                success: function(data) {
                    $('#name').val(data['name']);
                    $('#day').val(data['day']);
                    $('#posting').val(data['posting']);
                    $('#price').val(data['price']);
                    $('#id').val(data['id']);
                }
            });
            $('#exampleModal').modal('toggle');
        }

        function del_user(id) {
            swal({
                title: "?????????????????????????????????????????????????????????????????? ?",
                text: "??????????????????????????????????????????????????????????????????????????????????????????????????????????????????",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "GET",
                        url: "{!! url('package/delete/" + id + "') !!}",
                        success: function(data) {
                            swal({
                                title: "Sucess!",
                                text: "??????????????????????????????????????????",
                                type: "success",
                            }).then(() => {
                                location.reload();
                            })
                        }
                    });
                }
            })
        }
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("myDIV");
            if (x.innerHTML === "Hide artwork") {
                x.innerHTML = "Show artwork";
            } else {
                x.innerHTML = "Hide artwork";
            }
        }
    </script>
@endsection
