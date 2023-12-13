<!--Start nav
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"></script>
</head>

<body>
    <div class="header">

        <div class="menu-bar">
            <div class="custom-container-sh">
                <nav class="navbar navbar-expand-lg navbar-light bg-white px-0">
                    <a class="navbar-brand" href="/home">
                        <img src="{{asset('/img/sh-svg/logo.svg')}}" alt="logo" style="width:70px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="navbar-nav ms-auto me-0 d-sm-flex">
                            <x-menu-header />
{{--                            <li class="nav-item">--}}
{{--                                @php $lives = \App\Models\Live::latest()->first() @endphp--}}
{{--                                <a target="_blank" href="{{ $lives->link }}">--}}
{{--                                    <img src="\popup\live.svg" style="width:70px;"></a>--}}
{{--                            </li>--}}
                            <div class="dropdown-btn">
                                <button class="dropbtn"><img src="\popup\Icon material-menu.png"></button>
                                <div class="dropdown-content">
                                    @foreach (\App\Models\Submenu::where(['menu_id' => 2])->get() as $menu)
                                    <a href="{{ $menu->link }}">{{ $menu->label }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </nav>
            </div>
        </div>
    </div>


    <!-- End nav
 -->
