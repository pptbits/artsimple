@extends('layouts.main')

@section('title')
    ArtSimple
@endsection

@section('mainbody')
    <form action="{{ url('uploadArtwork/store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="container-fluid my-5" id="artworks2">
            <div class="row">

                <div class="col-12 col-md-12 col-lg-3">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                        <img id="blah" src="images/imagePase.png" class="img-artworkEdit" alt="your image" />
                    </a>
                    <input type='file' name="image" class="form-control mt-3" onchange="readURL(this);" />
                </div>
                <div class="col-12 col-md-12 col-lg-9">
                    <div class="row">
                        <div class="col-12 my-3">
                            <label for="email" class="form-label">Description :</label>
                            <textarea rows="4" class="form-control" name="discript" placeholder="description"></textarea>
                        </div>
                        <div class="col-12 col-sm-6 my-3">
                            <label class="form-label">Name of artwork :</label>
                            <input type="text" class="form-control" name="name_art" placeholder="name of artwork">
                        </div>
                        <div class="col-12 col-sm-6 my-3">
                            <label class="form-label">Type of art :</label>
                            <input type="text" class="form-control" name="type_art"
                                placeholder="Abstract, Impressionism, pop art etc.">
                        </div>
                        <div class="col-12 col-sm-6 my-3">
                            <label class="form-label">Art form :</label>
                            <select class="form-select" name="select_art_form">
                                <option value="0" selected>Select Art Category</option>
                                @foreach ($art_form as $art)
                                    <option value="{{ $art->id }}">{{ $art->art_name }}</option>
                                @endforeach
                                {{-- <option>Drawing</option>
                            <option>Painting </option>
                            <option>Printmaking</option>
                            <option>Architectural painting</option>
                            <option>Architectural drawing</option>
                            <option>Architectural model art</option>
                            <option>Sculpture</option>
                            <option>Computer art </option>
                            <option>Other</option> --}}
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 my-3">
                            <label class="form-label">Art technique :</label>
                            <input type="text" class="form-control" name="art_tech" placeholder="Art technique">
                        </div>
                        <div class="col-12 col-sm-6 my-3">
                            <label class="form-label">Certificate of Authentication :</label>
                            <select class="form-select" name="select_cer">
                                <option value="Not Provided" selected>Not Provided</option>
                                <option value="Provided">Provided</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 my-3">
                            <label class="form-label">Price :</label>
                            <input type="text" class="form-control" name="price" id="myinput"
                                placeholder="Price and currency">
                        </div>
                        <div class="col-12 col-sm-6 my-3">
                            <label class="form-label">Frame Included :</label>
                            <select class="form-select" name="select_frame">
                                <option value="No" selected>No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 my-3">
                            <label class="form-label">Shipment Availability :</label>
                            <select class="form-select" name="select_ship">
                                <option value="Within Thailand Only" selected>Within Thailand Only</option>
                                <option value="Sent from abroad">Sent from abroad</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 my-3">
                            <label class="form-label">Artwork Dimension :</label>
                            <input type="text" class="form-control" name="art_dimen"
                                placeholder="Specify the size of the workpiece, 14*20 inch etc.">
                        </div>
                        <div class="col-12 col-sm-6 my-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" onclick="myFunction()" id="mySwitch"
                                    name="hide_show" value="yes" checked>
                                <label class="form-check-label ms-3" for="mySwitch" id="myDIV">Show artwork</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-black2 ms-3">
                            Upload
                        </button>
                        {{-- <a href="#" class="btn btn-black2 ms-3">Upload</a> --}}
                    </div>
                    {{-- <input type="hidden" name="id" value="{{ Auth::user()->id }}"> --}}
                </div>
            </div>
        </div>
    </form>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{-- <img src="images/1.png" class="w-100"> --}}

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>

    <script>
        var myInput = new AutoNumeric('#myinput', {
            decimalPlaces: 2,
            currencySymbol: '฿',
            digitGroupSeparator: ','
        });
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#blah").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
