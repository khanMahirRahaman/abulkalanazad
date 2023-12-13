@extends('frontend.magz.index')




@section('content')
    <section class="category">
        <div class="container-lg">
            <div class="row p-0">
                <div class=" col-lg-12 text-left">
                    <div class="container">
                        <div class="col-lg-12 col-md-12 col-sm-12 p-0 col">
                            <div class="d-flex">
                                <div class="mr-auto p-2">
                                    <a href="#">
                                        <div class="flexbox-2">
                                            <b>ছবি</b>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="bar"></div>

                        <div class="row p-0">
                            <div class="col-md-6 col-sm-12  p-0 ">
                                <div class="flex-container1 p-0">
                                    <img src="/popup/body/3rd.png">
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12 p-0 ">
                                <div class="flex-container2 px-0">
                                    <div class="row p-0">
                                        <div class="row p-0">
                                            <div class="col-md-6 col-sm-12 p-0 ">
                                                <div class="photo1">
                                                    <img src="/popup/body/5th.png">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 p-0 ">
                                                <div class="photo2">
                                                    <img src="/popup/body/4th.png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-0">
                                            <div class="col-md-6 col-sm-12 p-0 ">
                                                <div class="photo1">
                                                    <img src="/popup/body/2nd-new.png">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 p-0 ">
                                                <div class="photo2">
                                                    <img src="/popup/body/1st.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row p-0">
                            <div class="col-md-6 col-sm-12 p-0 ">
                                <div class="flex-container2 px-0">
                                    <div class="row p-0">
                                        <div class="row p-0">
                                            <div class="col-md-6 col-sm-12 p-0 ">
                                                <div class="photo1">
                                                    <img src="/popup/body/5th.png">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 p-0 ">
                                                <div class="photo2">
                                                    <img src="/popup/body/4th.png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-0">
                                            <div class="col-md-6 col-sm-12 p-0 ">
                                                <div class="photo1">
                                                    <img src="/popup/body/2nd-new.png">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 p-0 ">
                                                <div class="photo2">
                                                    <img src="/popup/body/1st.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 p-0 ">
                                <div class="flex-container2 px-0">
                                    <div class="row p-0">
                                        <div class="row p-0">
                                            @foreach (App\Models\Gallery::where(['post_type' => 'gallery'])->take(8)->get() as $photos)
                                                <div class="col-lg-3 col-md-6 col-sm-12 p-0 ">
                                                    <img src="/gallery/show/{{ $photos->post_guid }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @include('frontend.magz.template-parts.latest-news')
        </div>


    </section>
@stop
