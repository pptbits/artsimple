@extends('layouts.main')

@section('title')
    ArtSimple
@endsection

<style>
    .tmgin-top {
        margin-top: 15px !important;
    }

    .tmgin-left {
        margin-left: 15px !important;
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

    .mt {
        margin-top: 10px !important;
    }

    .mr {
        margin-right: 10px !important;
    }

    .mb {
        margin-bottom: 10px;
    }
</style>

@section('mainbody')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>&nbsp;<i class="fa fa-chevron-circle-right"></i>&nbsp;Edit User</h4>
                <div class="card">
                    <div class="card-header card_head_modify" style=" background-color: black; ">
                        <div class="row mt-2">
                            <div class="col-md-10">
                                <h5 class="pull-left pt-1" style="font-size: 18px; color:white;">Edit User</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ url('manage_user') }}">
                                    <button class="btn btn-primary form-control"
                                        style="color: black; background-color: white !important;"> <i
                                            class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url('manage_user/update') }}" method="POST" id="gen_form"
                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        {{-- {{ Form::open(['url' => ['art_form/update'], 'id' => 'gen_form', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) }} --}}
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12 mt mb mr">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right" style="text-align: right;">Name :
                                        </label>
                                        <div class="col-md-10">
                                            <input type="text" name="name" id="name"
                                                value="{{ isset($user) ? $user->name : '' }}" class="form-control"
                                                placeholder="Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb mr">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right" style="text-align: right;">User
                                            Name : </label>
                                        <div class="col-md-10">
                                            <input type="text" name="username" id="username"
                                                value="{{ isset($user) ? $user->email : '' }}" class="form-control"
                                                placeholder="User Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb mr">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right"
                                            style="text-align: right;">Password : </label>
                                        <div class="col-md-10">
                                            <input type="password" name="password" id="password" value=""
                                                class="form-control" placeholder="Password">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb mr">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right" style="text-align: right;">Type :
                                        </label>
                                        <div class="col-md-10">
                                            <select name="select_type" id="">
                                                @if ($user->type == 1)
                                                    <option value="1" selected>Buyer</option>
                                                    <option value="2">Seller</option>
                                                    <option value="3">Seller</option>
                                                    <option value="4">Admin</option>
                                                @elseif($user->type == 2)
                                                    <option value="1">Buyer</option>
                                                    <option value="2" selected>Seller</option>
                                                    <option value="3">Seller</option>
                                                    <option value="4">Admin</option>
                                                @elseif($user->type == 3)
                                                    <option value="1">Buyer</option>
                                                    <option value="2">Seller</option>
                                                    <option value="3" selected>Seller</option>
                                                    <option value="4">Admin</option>
                                                @elseif($user->type == 4)
                                                    <option value="1">Buyer</option>
                                                    <option value="2">Seller</option>
                                                    <option value="3">Seller</option>
                                                    <option value="4" selected>Admin</option>
                                                @else
                                                    <option value="0" selected>select type</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">Seller</option>
                                                    <option value="3">Buyer</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="id" id="id"
                                    value="{{ isset($package) ? $package->id : '' }}">

                            </div>
                            <div class="row">
                                <div class="col-md-2 tmgin-top" style="margin: auto; text-align: center">
                                    <button type="submit" id="submit"
                                        class="form-control btn btn-primary">{{ isset($package) ? 'Update' : 'Save' }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    {{-- {{ Form::close() }} --}}
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
            $('#name').val('');
            $('#submit').text('Update');
            $.ajax({
                type: "GET",
                url: "{!! url('package/edit/" + id + "') !!}",
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
                        url: "{!! url('package/delete/" + id + "') !!}",
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
@endsection
