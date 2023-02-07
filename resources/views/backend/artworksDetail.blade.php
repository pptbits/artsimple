@extends('layouts.main')

@section('title')
    ArtSimple
@endsection

@section('mainbody')
    @if (Auth::user()->detail_user->type == "1")
    @elseif(Auth::user()->detail_user->type == "2" || Auth::user()->detail_user->type == "3")
        @if (isset($up_art))
            <div class="container my-5">
                <div class="artworkImageSet">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                        {{-- <img src="{{ url(asset('storage/images/' . $up_art->image)) }}" class="img-artwork" width="550px;"
                            height="450px;"> --}}

                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">
                            <img id="blah" src="{{ url(asset('storage/images/' . $up_art->image)) }}"
                                class="img-artworkEdit" width="550px;" height="450px;" alt="your image" />
                        </a>
                    </a>

                    <div class="detailView">
                        <span class="me-4"><img src="{{ asset('images/icons8-facebook-like-48.png') }}" class="icon-like">
                            0</span>
                        <span class="me-4"><img src="{{ asset('images/icons8-facebook-like-48ff.png') }}"
                                class="icon-like"> 0</span>
                        <span class="me-4"><img src="{{ asset('images/icons8-eyes-32.png') }}" class="icon-like">0
                            views</span>
                    </div>
                </div>
                <div class="mt-4">
                    <h5 class="name-artworks">{{ isset($up_art->name) ? $up_art->name : '' }}</h5>
                    <p class="detail-artworks">{{ isset($up_art->description) ? $up_art->description : '' }}</p>
                    <p class="list-detail">Art form : <span>{{ isset($up_art->art_form) ? $up_art->art_form : '' }}</span>
                    </p>
                    <p class="list-detail">Type of art :<span>{{ isset($up_art->type_art) ? $up_art->type_art : '' }}</span>
                    </p>
                    <p class="list-detail">Art technique
                        :<span>{{ isset($up_art->art_tech) ? $up_art->art_tech : '' }}</span></p>
                    <p class="list-detail">Certificate of Authentication
                        :<span>{{ isset($up_art->cer_auth) ? $up_art->cer_auth : '' }}</span></p>
                    <p class="list-detail">Artist :<span>{{ Auth::user()->name }}</span></p>
                    <p class="list-detail">Price
                        :<span>{{ isset($up_art->price) ? $up_art->price : '' }}</span></p>
                    <p class="list-detail">Frame Included
                        :<span>{{ isset($up_art->frame_incl) ? $up_art->frame_incl : '' }}</span></p>
                    <p class="list-detail">Shipment Availability:
                        <span>{{ isset($up_art->shipment_avail) ? $up_art->shipment_avail : '' }}</span>
                    </p>
                    <p class="list-detail">Artwork Dimension:
                        <span>{{ isset($up_art->art_dimen) ? $up_art->art_dimen : '' }}</span>
                    </p>
                    <a href="{{ url('uploadArtwork/edit/' . $up_art->id) }}" class="btn btn-edit mt-3"><i
                            class="fas fa-sliders-h"></i> Edit</a>
                </div>
            </div>
        @endif
        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <img src="{{ url(asset('storage/images/' . $up_art->image)) }}" class="w-100">

                </div>
            </div>
        </div>
    @endif
@endsection

@section('js')
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
