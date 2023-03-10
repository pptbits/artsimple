@extends('layouts.main')

@section('title')
    ArtSimple
@endsection

@section('mainbody')
    {{-- {{ dd(Auth::user()->detail_user->type)}} --}}
    @if (Auth::user()->detail_user->type == '1')
        @if (isset($up_art))
            <div class="container">
                <div class="row" id="artworks">
                    @foreach ($up_art as $ua)
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                            <a href="{{ url('uploadArtworkBuy/detail/' . $ua->id) }}">
                                <div class="ProductLink2">
                                    <span class="tag-view"><img src="images/icons8-eyes-32.png" class="icon-like">0
                                        views</span>
                                    <div class="son-3"
                                        style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.67) 0%, rgba(0, 0, 0, 0.21) 16.15%,
                                 rgba(0, 0, 0, 0) 36.98%), url({{ asset('storage/images/' . $ua->image) }});"
                                        width="3840" height="2160">
                                        <div class="son-text3">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div>
                                                    <p class="mb-0">{{ $ua->name }}</p>
                                                    <span>{{ $ua->price }}</span>
                                                </div>
                                                <div>
                                                    <span class="me-2"><img src="images/icons8-facebook-like-48wh.png"
                                                            class="icon-like"> 0</span>
                                                    <span><img src="images/icons8-facebook-like-48f.png" class="icon-like">
                                                        0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @elseif(Auth::user()->detail_user->type == '2' || Auth::user()->detail_user->type == '3')
        @if (isset($up_art))
            <div class="container">
                <div class="row" id="artworks">
                    @foreach ($up_art as $ua)
                        <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                            <a href="{{ url('uploadArtwork/detail/' . $ua->id) }}">
                                <div class="ProductLink2">
                                    <span class="tag-view"><img src="images/icons8-eyes-32.png" class="icon-like">0
                                        views</span>
                                    <div class="son-3"
                                        style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.67) 0%, rgba(0, 0, 0, 0.21) 16.15%,
                                         rgba(0, 0, 0, 0) 36.98%), url({{ asset('storage/images/' . $ua->image) }});"
                                        width="3840" height="2160">
                                        <div class="son-text3">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div>
                                                    <p class="mb-0">{{ $ua->name }}</p>
                                                    <span>{{ $ua->price }}</span>
                                                </div>
                                                <div>
                                                    <span class="me-2"><img src="images/icons8-facebook-like-48wh.png"
                                                            class="icon-like"> 0</span>
                                                    <span><img src="images/icons8-facebook-like-48f.png" class="icon-like">
                                                        0</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endif
@endsection

@section('js')
@endsection
