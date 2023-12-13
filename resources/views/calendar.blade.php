

@extends('frontend.magz.index')

@section('content')
    <section class="home">
        <div class="container-md">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                    <div class="row">
                        <div class="col-6 text-left"><button>{{$prevMonth}}</button></div>
                    <div class="col-6 text-right"><button>{{$nextMonth}}</button></div>
                    </div>
                    {!! $calendar !!}

                    @if (Ads::checkAdPlacementActive('home-horizontal'))
                        <x-ads-home-horizontal/>
                    @endif

                    <div class="line transparent little"></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 trending-tags">
                            <x-trending-tags/>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <x-hot-news/>
                        </div>
                    </div>
                    <x-just-another-news/>
                </div>

                <div class="col-sm-6 col col-lg-4 sidebar" id="sidebar">
                    @include('frontend.magz.template-parts.sidebar-right')
                </div>
            </div>
        </div>
    </section>

@endsection

