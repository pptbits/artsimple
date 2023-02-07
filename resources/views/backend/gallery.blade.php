@extends('layouts.main')

@section('title')
    ArtSimple
@endsection

@section('mainbody')
    @if (Auth::user()->type == 'Buyer')
        <div class="container">
            <div class="row" id="artworks">
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                    <a href="artworksDetail.php">
                        <div class="ProductLink2">
                            <span class="tag-view"><img src="images/icons8-eyes-32.png" class="icon-like">1.12 views</span>
                            <div class="son-3"
                                style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.67) 0%, rgba(0, 0, 0, 0.21) 16.15%, rgba(0, 0, 0, 0) 36.98%), url('images/1.png');">
                                <div class="son-text3">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <p class="mb-0">Flower Dark</p>
                                            <span>฿1,000</span>
                                        </div>
                                        <div>
                                            <span class="me-2"><img src="images/icons8-facebook-like-48wh.png"
                                                    class="icon-like"> 15250k</span>
                                            <span><img src="images/icons8-facebook-like-48f.png" class="icon-like"> 5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                    <a href="artworksDetail.php">
                        <div class="ProductLink2">
                            <span class="tag-view"><img src="images/icons8-eyes-32.png" class="icon-like">1.12 views</span>
                            <div class="son-3"
                                style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.67) 0%, rgba(0, 0, 0, 0.21) 16.15%, rgba(0, 0, 0, 0) 36.98%), url('images/2.png');">
                                <div class="son-text3">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <p class="mb-0">Flower Dark</p>
                                            <span>฿1,000</span>
                                        </div>
                                        <div>
                                            <span class="me-2"><img src="images/icons8-facebook-like-48wh.png"
                                                    class="icon-like"> 15250k</span>
                                            <span><img src="images/icons8-facebook-like-48f.png" class="icon-like"> 5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                    <a href="artworksDetail.php">
                        <div class="ProductLink2">
                            <span class="tag-view"><img src="images/icons8-eyes-32.png" class="icon-like">1.12 views</span>
                            <div class="son-3"
                                style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.67) 0%, rgba(0, 0, 0, 0.21) 16.15%, rgba(0, 0, 0, 0) 36.98%), url('images/3.png');">
                                <div class="son-text3">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <p class="mb-0">Flower Dark</p>
                                            <span>฿1,000</span>
                                        </div>
                                        <div>
                                            <span class="me-2"><img src="images/icons8-facebook-like-48wh.png"
                                                    class="icon-like"> 15250k</span>
                                            <span><img src="images/icons8-facebook-like-48f.png" class="icon-like"> 5</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-lg-6 col-xl-4">
                    <a href="artworksDetail.php">
                        <div class="ProductLink2">
                            <span class="tag-view"><img src="images/icons8-eyes-64.png" class="icon-like">Hidden</span>
                            <div class="son-3"
                                style="background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.67) 0%, rgba(0, 0, 0, 0.21) 16.15%, rgba(0, 0, 0, 0) 36.98%), url('images/4.png');">
                                <div class="son-text3">
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div>
                                            <p class="mb-0">Flower Dark</p>
                                            <span>฿1,000</span>
                                        </div>
                                        <div>
                                            <span class="me-2"><img src="images/icons8-facebook-like-48wh.png"
                                                    class="icon-like"> 0</span>
                                            <span><img src="images/icons8-facebook-like-48f.png" class="icon-like"> 0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->type == 'Seller')
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
                                        style="background-image: url({{ asset('storage/images/' . $ua->image) }});"
                                        width="3840" height="2160">
                                        <div class="son-text3">
                                            <div class="d-flex justify-content-between align-items-end">
                                                <div>
                                                    <p class="mb-0">{{ $ua->name }}</p>
                                                    <span>฿{{ number_format($ua->price, 2) }}</span>
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
