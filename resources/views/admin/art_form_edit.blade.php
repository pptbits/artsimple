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
</style>

@section('mainbody')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>&nbsp;<i class="fa fa-chevron-circle-right"></i>&nbsp;Edit Category</h4>
                <div class="card">
                    <div class="card-header card_head_modify" style=" background-color: black; ">
                        <div class="row mt-2">
                            <div class="col-md-10">
                                <h5 class="pull-left pt-1" style="font-size: 18px; color:white;">Edit Category</h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ url('art_form') }}">
                                    <button class="btn btn-primary form-control"
                                        style="color: black; background-color: white !important;"> <i
                                            class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url('art_form/update') }}" method="POST" id="gen_form" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        {{-- {{ Form::open(['url' => ['art_form/update'], 'id' => 'gen_form', 'autocomplete' => 'off', 'enctype' => 'multipart/form-data']) }} --}}
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-12 tmgin-top">
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label text-right tmgin-left"
                                            style="text-align: right;">Category Name : </label>
                                        <div class="col-md-8">
                                            <input type="text" name="art_name" id="art_name" required
                                                value="{{ isset($art_form) ? $art_form->art_name : '' }}"
                                                class="form-control" placeholder="email">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="id" id="id"
                                    value="{{ isset($art_form) ? $art_form->id : '' }}">

                            </div>
                            <div class="row">
                                <div class="col-md-2 tmgin-top" style="margin: auto; text-align: center">
                                    <button type="submit" id="submit"
                                        class="form-control btn btn-primary">{{ isset($art_form) ? 'Update' : 'Save' }}</button>
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
            $('#gen_form').attr('action', "{!! url('art_form/store') !!}");
            $('#art_name').val('');
            $('#submit').text('Save');
            $('#exampleModal').modal('toggle');
        }

        function edit_modal(id) {
            $('#gen_form').attr('action', "{!! url('art_form/update') !!}");
            $('#art_name').val('');
            $('#submit').text('Update');
            $.ajax({
                type: "GET",
                url: "{!! url('art_form/edit/" + id + "') !!}",
                success: function(data) {
                    $('#art_name').val(data['art_name']);
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
                        url: "{!! url('art_form/delete/" + id + "') !!}",
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
