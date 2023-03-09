<style>
    #loader-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
    }

    #loader {
        display: block;
        position: relative;
        left: 50%;
        top: 50%;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #3498db;

        -webkit-animation: spin 2s linear infinite;
        /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 2s linear infinite;
        /* Chrome, Firefox 16+, IE 10+, Opera */

        z-index: 1001;
    }

    #loader:before {
        content: "";
        position: absolute;
        top: 5px;
        left: 5px;
        right: 5px;
        bottom: 5px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #e74c3c;

        -webkit-animation: spin 3s linear infinite;
        /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 3s linear infinite;
        /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    #loader:after {
        content: "";
        position: absolute;
        top: 15px;
        left: 15px;
        right: 15px;
        bottom: 15px;
        border-radius: 50%;
        border: 3px solid transparent;
        border-top-color: #f9c922;

        -webkit-animation: spin 1.5s linear infinite;
        /* Chrome, Opera 15+, Safari 5+ */
        animation: spin 1.5s linear infinite;
        /* Chrome, Firefox 16+, IE 10+, Opera */
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);
            /* IE 9 */
            transform: rotate(0deg);
            /* Firefox 16+, IE 10+, Opera */
        }

        100% {
            -webkit-transform: rotate(360deg);
            /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);
            /* IE 9 */
            transform: rotate(360deg);
            /* Firefox 16+, IE 10+, Opera */
        }
    }

    @keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(0deg);
            /* IE 9 */
            transform: rotate(0deg);
            /* Firefox 16+, IE 10+, Opera */
        }

        100% {
            -webkit-transform: rotate(360deg);
            /* Chrome, Opera 15+, Safari 3.1+ */
            -ms-transform: rotate(360deg);
            /* IE 9 */
            transform: rotate(360deg);
            /* Firefox 16+, IE 10+, Opera */
        }
    }

    #loader-wrapper .loader-section {
        position: fixed;
        top: 0;
        width: 51%;
        height: 100%;
        background: #222222;
        z-index: 1000;
        -webkit-transform: translateX(0);
        /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: translateX(0);
        /* IE 9 */
        transform: translateX(0);
        /* Firefox 16+, IE 10+, Opera */
    }

    #loader-wrapper .loader-section.section-left {
        left: 0;
    }

    #loader-wrapper .loader-section.section-right {
        right: 0;
    }

    /* Loaded */
    .loaded #loader-wrapper .loader-section.section-left {
        -webkit-transform: translateX(-100%);
        /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: translateX(-100%);
        /* IE 9 */
        transform: translateX(-100%);
        /* Firefox 16+, IE 10+, Opera */

        -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
        transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    }

    .loaded #loader-wrapper .loader-section.section-right {
        -webkit-transform: translateX(100%);
        /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: translateX(100%);
        /* IE 9 */
        transform: translateX(100%);
        /* Firefox 16+, IE 10+, Opera */

        -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
        transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
    }

    .loaded #loader {
        opacity: 0;
        -webkit-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
    }

    .loaded #loader-wrapper {
        visibility: hidden;

        -webkit-transform: translateY(-100%);
        /* Chrome, Opera 15+, Safari 3.1+ */
        -ms-transform: translateY(-100%);
        /* IE 9 */
        transform: translateY(-100%);
        /* Firefox 16+, IE 10+, Opera */

        -webkit-transition: all 0.3s 1s ease-out;
        transition: all 0.3s 1s ease-out;
    }

    /* JavaScript Turned Off */
    .no-js #loader-wrapper {
        display: none;
    }

    .no-js h1 {
        color: #222222;
    }

    #content {
        margin: 0 auto;
        padding-bottom: 50px;
        width: 80%;
        max-width: 978px;
    }
</style>

<section id="">
    <div class="d-flex" id="wrapper">
        <div id="loader-wrapper">
            <div id="loader"></div>

            {{-- <div class="loader-section section-left"></div> --}}
            {{-- <div class="loader-section section-right"></div> --}}

        </div>
        <!-- Sidebar-->
        <div class="border-end bg-black" id="sidebar-wrapper">
            <div class="sidebar-heading bg-black">
                <a href="{{ url('home') }}">
                    <img src="{{ asset('images/logo_dark.png') }}" class="logo-img">
                </a>
            </div>

            <div class="list-group list-group-flush">
                @if (Auth::user()->detail_user->type == 1)
                    <a class="list-group-item list-group-item-action p-3" href="{{ url('home') }}"><img
                            src="{{ asset('images/icons8-apps-48.png') }}" class="icon-sidebar">Gallery</a>
                    {{-- <a class="list-group-item list-group-item-black p-3" href="#!"><img src="{{ asset('images/logout.png') }}"
                            class="icon-sidebar">Log out</a> --}}
                    <a class="list-group-item list-group-item-black p-3" href="{{ route('logout.perform') }}"
                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><img
                            src="{{ asset('images/logout.png') }}" class="icon-sidebar">
                        Log out</a>
                    <form id="logout-form" action="{{ route('logout.perform') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @elseif(Auth::user()->detail_user->type == 2 || Auth::user()->detail_user->type == 3)
                    @if (request()->route()->uri == 'home')
                        <a class="list-group-item list-group-item-action p-3" href="{{ url('home') }}"><img
                                src="{{ asset('images/icons8-apps-48.png') }}" class="icon-sidebar">My Gallery</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('uploadArtwork') }}"><img
                                src="{{ asset('images/icons8-upload-to-cloud-50ac.png') }}" class="icon-sidebar">Upload
                            Artwork</a>
                        {{-- <a class="list-group-item list-group-item-black p-3" href="#!"><img src="{{ asset('images/logout.png') }}"
                            class="icon-sidebar">Log out</a> --}}
                        <a class="list-group-item list-group-item-black p-3" href="{{ route('logout.perform') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><img
                                src="{{ asset('images/logout.png') }}" class="icon-sidebar">
                            Log out</a>
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @elseif(request()->route()->uri == 'uploadArtwork')
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('home') }}"><img
                                src="{{ asset('images/icons8-apps-48wh.png') }}" class="icon-sidebar">My Gallery</a>
                        <a class="list-group-item list-group-item-action p-3" href="{{ url('uploadArtwork') }}"><img
                                src="{{ asset('images/icons8-upload-to-cloud-50.png') }}" class="icon-sidebar">Upload
                            Artwork</a>
                        {{-- <a class="list-group-item list-group-item-black p-3" href="#!"><img src="{{ asset('images/logout.png') }}"
                            class="icon-sidebar">Log out</a> --}}
                        <a class="list-group-item list-group-item-black p-3" href="{{ route('logout.perform') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><img
                                src="{{ asset('images/logout.png') }}" class="icon-sidebar">
                            Log out</a>
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @elseif(request()->route()->uri == 'uploadArtwork/detail/{id}')
                        <a class="list-group-item list-group-item-action p-3" href="{{ url('home') }}"><img
                                src="{{ asset('images/icons8-apps-48.png') }}" class="icon-sidebar">My Gallery</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('uploadArtwork') }}"><img
                                src="{{ asset('images/icons8-upload-to-cloud-50ac.png') }}" class="icon-sidebar">Upload
                            Artwork</a>
                        {{-- <a class="list-group-item list-group-item-black p-3" href="#!"><img src="{{ asset('images/logout.png') }}"
                    class="icon-sidebar">Log out</a> --}}
                        <a class="list-group-item list-group-item-black p-3" href="{{ route('logout.perform') }}"
                            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><img
                                src="{{ asset('images/logout.png') }}" class="icon-sidebar">
                            Log out</a>
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @elseif(request()->route()->uri == 'uploadArtwork/edit/{id}')
                        <a class="list-group-item list-group-item-action p-3" href="{{ url('home') }}"><img
                                src="{{ asset('images/icons8-apps-48.png') }}" class="icon-sidebar">My Gallery</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('uploadArtwork') }}"><img
                                src="{{ asset('images/icons8-upload-to-cloud-50ac.png') }}" class="icon-sidebar">Upload
                            Artwork</a>
                        {{-- <a class="list-group-item list-group-item-black p-3" href="#!"><img src="{{ asset('images/logout.png') }}"
            class="icon-sidebar">Log out</a> --}}
                        <a class="list-group-item list-group-item-black p-3" href="{{ route('logout.perform') }}"
                            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"><img
                                src="{{ asset('images/logout.png') }}" class="icon-sidebar">
                            Log out</a>
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endif
                @elseif(Auth::user()->detail_user->type == 4)
                    @if (request()->route()->uri == 'home')
                        <a class="list-group-item list-group-item-action p-3" href="{{ url('art_form') }}">Category
                            Art</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('package') }}">Package
                        </a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('manage_user') }}">Manage
                            User</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ route('logout.perform') }}"
                            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"><img
                                src="{{ asset('images/logout.png') }}" class="icon-sidebar">
                            Log out</a>
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                    @elseif (request()->route()->uri == 'art_form')
                        <a class="list-group-item list-group-item-action p-3" href="{{ url('art_form') }}">Category
                            Art</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('package') }}">Package
                        </a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('manage_user') }}">Manage
                            User</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ route('logout.perform') }}"
                            onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><img
                                src="{{ asset('images/logout.png') }}" class="icon-sidebar">
                            Log out</a>
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                    @elseif (request()->route()->uri == 'art_form/edit/{id}')
                        <a class="list-group-item list-group-item-action p-3" href="{{ url('art_form') }}">Category
                            Art</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('package') }}">Package
                        </a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('manage_user') }}">Manage
                            User</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ route('logout.perform') }}"
                            onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"><img
                                src="{{ asset('images/logout.png') }}" class="icon-sidebar">
                            Log out</a>
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                    @elseif(request()->route()->uri == 'package')
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('art_form') }}">Category
                            Art</a>
                        <a class="list-group-item list-group-item-action p-3" href="{{ url('package') }}">Package
                        </a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('manage_user') }}">Manage
                            User</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ route('logout.perform') }}"
                            onclick="event.preventDefault();
             document.getElementById('logout-form').submit();"><img
                                src="{{ asset('images/logout.png') }}" class="icon-sidebar">
                            Log out</a>
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                    @elseif (request()->route()->uri == 'package/edit/{id}')
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('art_form') }}">Category
                            Art</a>
                        <a class="list-group-item list-group-item-action p-3" href="{{ url('package') }}">Package
                        </a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('manage_user') }}">Manage
                            User</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ route('logout.perform') }}"
                            onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"><img
                                src="{{ asset('images/logout.png') }}" class="icon-sidebar">
                            Log out</a>
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                    @elseif(request()->route()->uri == 'manage_user')
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('art_form') }}">Category
                            Art</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('package') }}">Package
                        </a>
                        <a class="list-group-item list-group-item-action p-3" href="{{ url('manage_user') }}">Manage
                            User</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ route('logout.perform') }}"
                            onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();"><img
                                src="{{ asset('images/logout.png') }}" class="icon-sidebar">
                            Log out</a>
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                    @elseif (request()->route()->uri == 'manage_user/edit/{id}')
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('art_form') }}">Category
                            Art</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ url('package') }}">Package
                        </a>
                        <a class="list-group-item list-group-item-action p-3" href="{{ url('manage_user') }}">Manage
                            User</a>
                        <a class="list-group-item list-group-item-black p-3" href="{{ route('logout.perform') }}"
                            onclick="event.preventDefault();
             document.getElementById('logout-form').submit();"><img
                                src="{{ asset('images/logout.png') }}" class="icon-sidebar">
                            Log out</a>
                        <form id="logout-form" action="{{ route('logout.perform') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                    @endif
                @endif
                {{-- <a class="list-group-item list-group-item-action p-3" href="gallery.php"><img
                        src="images/icons8-apps-48.png" class="icon-sidebar">Gallery</a>
                <a class="list-group-item list-group-item-black p-3" href="uploadArtwork.php"><img
                        src="images/icons8-upload-to-cloud-50ac.png" class="icon-sidebar">Upload Artwork</a>
                <a class="list-group-item list-group-item-black p-3" href="#!"><img src="{{ asset('images/logout.png') }}"
                        class="icon-sidebar">Log out</a> --}}
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-dark" id="sidebarToggle">Toggle Menu</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse me-5" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" id="navbarDropdown"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <div class="d-flex">
                                        {{-- <img src="images/img.png" class="profile-img me-3"> --}}
                                        <div class="me-3">
                                            <p class="mb-0">{{ Auth::user()->name }}</p>
                                            {{-- <span>(b.1994) </span> --}}
                                        </div>
                                    </div>
                                </a>
                                {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout.perform') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout.perform') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="#!"> <i class="fas fa-sign-out-alt"></i> Log
                                        out</a>
                                </div> --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
