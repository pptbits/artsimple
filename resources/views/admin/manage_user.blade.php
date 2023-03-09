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
</style>

@section('mainbody')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="tmgin-top">&nbsp;<i class="fa fa-chevron-circle-right"></i>&nbsp;Manage User</h4>
                <div class="card">
                    <div class="card-header card_head_modify" style=" background-color: black; ">
                        <div class="row mt-2">
                            <div class="col-md-10">
                                <h5 class="pull-left pt-1" style="font-size: 18px;color:white;">Manage User</h5>
                            </div>
                            {{-- <div class="col-md-2">
                                <button onclick="modal()" class="btn btn-mini form-control"
                                    style="color: black; background-color: white !important;"> <i class="fa fa-plus"
                                        aria-hidden="true"></i> Add</button>
                            </div> --}}
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
                                            <th>User Name</th>
                                            <th>Name</th>
                                            <th>User Type</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody_txt_center" style="font-size: 14px;">
                                        @if (isset($user))
                                            @foreach ($user as $item => $value)
                                                <tr>
                                                    <td>{{ $item + 1 }}</td>
                                                    <td style="text-align: left !important;">
                                                        <p> {{ isset($value) ? $value->email : '' }}</p>
                                                    </td>
                                                    <td style="text-align: left !important;">
                                                        <p> {{ isset($value) ? $value->name : '' }}</p>
                                                    </td>
                                                    <td style="text-align: left !important;">
                                                        @if ($value->type == 1)
                                                            <p>Buyer</p>
                                                        @elseif($value->type == 2 || $value->type == 3)
                                                            <p>Seller</p>
                                                        @elseif($value->type == 4)
                                                            <p>Admin</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (isset($value->approve) && $value->approve == 'Y')
                                                            <p>Approved</p>
                                                        @else
                                                            <button id="nap" class="btn-danger btn btn-sm"
                                                                style="border-radius: 5%"
                                                                onclick="approve({{ $value->id }})">Not
                                                                Approve</button>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center !important;">
                                                        <div class="row">
                                                            <div class="offset-4 col-1">
                                                                {{-- <button onclick="edit_modal({{ $value->id }})" class="btn btn-info btn-round btn-mini">แก้ไข</button> --}}
                                                                <a href="{{ url('manage_user/edit/' . $value->id) }}">
                                                                    <button class="btn btn-info btn-round btn-mini"
                                                                        style="border-radius: 50px; color: white; font-size: 10px;">แก้ไข</button>
                                                                </a>
                                                                <button onclick="del_user({{ $value->id }})"
                                                                    class="btn btn-danger btn-round btn-mini"
                                                                    style="border-radius: 50px; font-size: 10px;">ลบข้อมูล</button>
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

        function edit_modal(id) {
            $('#gen_form').attr('action', "{!! url('manage_user/update') !!}");
            $('#name').val('');
            $('#submit').text('Update');
            $.ajax({
                type: "GET",
                url: "{!! url('manage_user/edit/" + id + "') !!}",
                success: function(data) {
                    $('#name').val(data['name']);
                    $('#id').val(data['id']);
                }
            });
            $('#exampleModal').modal('toggle');
        }

        function del_user(id) {
            swal({
                title: "ต้องการลบข้อมูลหรือไม่ ?",
                text: "การลบข้อมูลจะทำให้ข้อมูลหายไปอย่างถาวร",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "GET",
                        url: "{!! url('manage_user/delete/" + id + "') !!}",
                        success: function(data) {
                            swal({
                                title: "Sucess!",
                                text: "ลบข้อมูลสำเร็จ",
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

    <script>
        approve = (id) => {
            Swal.fire({
                title: 'Do you want to Aprrove?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: 'Approve',
                // denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                // console.log(result);

                if (result.value) {
                    // Swal.fire('Saved!', '', 'success')
                    fetch("{{ url('manage_user/approve') }}", {
                            headers: {
                                // 'Accept': 'application/json, application/xml, text/plain, text/html, *.*',
                                'Content-Type': 'application/json, multipart/form-data',
                                // "X-CSRF-Token": "{{ csrf_token() }}",
                            },
                            method: "post",
                            credentials: "same-origin",
                            body: JSON.stringify({
                                "_token": "{{ csrf_token() }}",
                                "id": id,
                            }),
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            console.log("Success:", data);
                            Swal.fire('Saved!', '', 'success')
                                .then(() => {
                                    window.location.reload();
                                })
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                        });
                }
            })
        }
    </script>
@endsection
