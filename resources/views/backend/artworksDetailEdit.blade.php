@extends('layouts.main')

@section('title')
    ArtSimple
@endsection

<style>
    #modal-c {
        width: 100%;
        height: auto;
    }
    .modal-dialog-centered {
        display: flex;
        align-items: center;
        min-height: calc(100% - 1rem);
        justify-content: center;
    }
</style>

@section('mainbody')
    @if (Auth::user()->detail_user->type == "1")
    @elseif(Auth::user()->detail_user->type == "2" || Auth::user()->detail_user->type == "3")
        @if (isset($up_art))
            <form action="{{ url('uploadArtwork/update') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="container-fluid my-5" id="artworks2">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-3">

                            <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                                <img id="blah" src="{{ url(asset('storage/images/' . $up_art->image)) }}"
                                    class="img-artworkEdit" alt="your image" />
                            </a>
                            <input type='file' name="image" class="form-control mt-3" onchange="readURL(this);" />

                        </div>
                        <div class="col-12 col-md-12 col-lg-9">
                            <div class="row align-items-end">
                                <div class="col-12 my-3">
                                    <label for="email" class="form-label">Description :</label>
                                    <textarea rows="4" class="form-control" name="discript">{{ isset($up_art->description) ? $up_art->description : '' }}</textarea>
                                </div>
                                <div class="col-12 col-sm-6 my-3">
                                    <label class="form-label">Name of artwork :</label>
                                    <input type="text" class="form-control" name="name_art"
                                        value="{{ isset($up_art->name) ? $up_art->name : '' }}"
                                        placeholder="Name of artwork">
                                </div>
                                <div class="col-12 col-sm-6 my-3">
                                    <label class="form-label">Type of art :</label>
                                    <input type="text" class="form-control"
                                        value="{{ isset($up_art->type_art) ? $up_art->type_art : '' }}" name="type_art"
                                        placeholder="Abstract, Impressionism, pop art etc.">
                                </div>
                                <div class="col-12 col-sm-6 my-3">
                                    <label class="form-label">Art form :</label>
                                    <select class="form-select" name="select_art_form">
                                        @if ($up_art->art_form)
                                            <option value="{{ $art_form_s->id }}" selected>{{ $art_form_s->art_name }}
                                            </option>
                                        @else
                                            <option value="0" selected>Select Art Category</option>
                                        @endif
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
                                    <input type="text" class="form-control"
                                        value="{{ isset($up_art->art_tech) ? $up_art->art_tech : '' }}" name="art_tech"
                                        placeholder="Art technique">
                                </div>
                                <div class="col-12 col-sm-6 my-3">
                                    <label class="form-label">Certificate of Authentication :</label>
                                    <select class="form-select" name="select_cer">
                                        @if ($up_art->cer_auth == 'Not Provided')
                                            <option value="Not Provided" selected>Not Provided</option>
                                            <option value="Provided">Provided</option>
                                        @elseif($up_art->cer_auth == 'Provided')
                                            <option value="Not Provided">Not Provided</option>
                                            <option value="Provided" selected>Provided</option>
                                        @else
                                            <option value="Not Provided" selected>Not Provided</option>
                                            <option value="Provided">Provided</option>
                                        @endif

                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 my-3">
                                    <label class="form-label">Price :</label>
                                    <input type="text" class="form-control"
                                        value="{{ isset($up_art->price) ? $up_art->price : '' }}"
                                        name="price" id="myinput" placeholder="Price and currency">
                                </div>
                                <div class="col-12 col-sm-6 my-3">
                                    <label class="form-label">Frame Included :</label>
                                    <select class="form-select" name="select_frame">
                                        @if ($up_art->frame_incl == 'No')
                                            <option value="No" selected>No</option>
                                            <option value="Yes">Yes</option>
                                        @elseif($up_art->frame_incl == 'Yes')
                                            <option value="No">No</option>
                                            <option value="Yes" selected>Yes</option>
                                        @else
                                            <option value="No" selected>No</option>
                                            <option value="Yes">Yes</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 my-3">
                                    <label class="form-label">Shipment Availability :</label>
                                    <select class="form-select" name="select_ship">
                                        @if ($up_art->shipment_avail == 'Within Thailand Only')
                                            <option value="Within Thailand Only" selected>Within Thailand Only</option>
                                            <option value="Sent from abroad">Sent from abroad</option>
                                        @elseif($up_art->shipment_avail == 'Sent from abroad')
                                            <option value="Within Thailand Only">Within Thailand Only</option>
                                            <option value="Sent from abroad" selected>Sent from abroad</option>
                                        @else
                                            <option value="Within Thailand Only" selected>Within Thailand Only</option>
                                            <option value="Sent from abroad">Sent from abroad</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 my-3">
                                    <label class="form-label">Artwork Dimension :</label>
                                    <input type="text" class="form-control" name="art_dimen"
                                        value="{{ isset($up_art->art_dimen) ? $up_art->art_dimen : '' }}"
                                        placeholder="Specify the size of the workpiece, 14*20 inch etc.">
                                </div>
                                <div class="col-12 col-sm-6 my-3">
                                    <div class="form-check form-switch">
                                        @if ($up_art->show_hide == 'yes')
                                            <input class="form-check-input" type="checkbox" onclick="myFunction()"
                                                id="mySwitch" name="hide_show" value="yes" checked>
                                        @else
                                            <input class="form-check-input" type="checkbox" onclick="myFunction()"
                                                id="mySwitch" name="hide_show" value="no" checked>
                                        @endif
                                        <label class="form-check-label ms-3" for="mySwitch" id="myDIV">Show
                                            artwork</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ url('uploadArtwork/detail/' . $up_art->id) }}" class="btn btn-trans">Back</a>
                                <button type="submit" class="btn btn-black2 ms-3">
                                    Save
                                </button>
                                {{-- <a href="#" class="btn btn-black2 ms-3">Save</a> --}}
                            </div>
                            <input type="hidden" name="id" value="{{ $up_art->user_id }}">
                        </div>
                    </div>
                </div>
            </form>
        @endif
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" id="modal-c">
                    <img src="{{ url(asset('storage/images/' . $up_art->image)) }}">

                </div>
            </div>
        </div>
    @endif
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
        window.addEventListener('DOMContentLoaded', event => {

            // Toggle the side navigation
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                // Uncomment Below to persist sidebar toggle between refreshes
                // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
                //     document.body.classList.toggle('sb-sidenav-toggled');
                // }
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains(
                        'sb-sidenav-toggled'));
                });
            }

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

    {{-- zoom in/out --}}
    <script>
        const zoomableImage = document.getElementById("modal-c");
        const imgOpenModal = document.getElementById("blah");
        // console.log(zoomableImage);
        let zoom = 100;
        let currentX;
        let xOffset = 0;
        // const MIN_ZOOM = 100;
        // const MAX_ZOOM = 300;
        // const MIN_X_OFFSET = -500;
        // const MAX_X_OFFSET = 50;

        zoomableImage.addEventListener("mousedown", function(event) {
            if (event.which === 1) {
                zoom += 30;
            } else if (event.which === 3) {
                zoom -= 30;
            }
            // zoom = Math.max(MIN_ZOOM, Math.min(zoom, MAX_ZOOM));
            zoomableImage.style.width = zoom + "%";
            // console.log(zoom);
        });

        imgOpenModal.addEventListener("click",function(event) {
            event.preventDefault();
            zoom = 100;
            zoomableImage.style.width = "100%";
        });

        zoomableImage.addEventListener("mousewheel", function(event) {
            event.preventDefault();
            if (event.deltaY < 0) {
                zoom += 30;
            } else {
                zoom -= 30;
            }
            // zoom = Math.max(MIN_ZOOM, Math.min(zoom, MAX_ZOOM));
            zoomableImage.style.width = zoom + "%";
        }, {
            passive: false
        });

        zoomableImage.addEventListener("keydown", function(event) {
            switch (event.keyCode) {
                case 37: // left arrow
                    xOffset -= 10;
                    break;
                case 39: // right arrow
                    xOffset += 10;
                    break;
            }
            setTranslate(xOffset, zoomableImage);
        }, {
            passive: false
        });

        setTranslate(xOffset, zoomableImage);

        function setTranslate(xPos, el) {
            el.style.transform = "translateX(" + xPos + "px)";
        }
    </script>
@endsection
