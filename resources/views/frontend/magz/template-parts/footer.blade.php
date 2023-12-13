<!--================Footer Area =================-->
<footer class="footer_area">
    <div class="footer_widgets">
        <div class="container-md">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="logo w-50 mx-auto">
                            <img src="/popup/logo_white.svg">
                        </div>


                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="row nevlink-footer w-100 mx-auto">
                        <ul class="text">
                            <li><a href="{{ url('/') }}">প্রচ্ছদ</a></li>
                            <li><a href="{{ url('/category/sonar-banglar-rupokar') }}">সোনার বাংলা
                                    রুপকার</a></li>
                            <li> <a href="{{ url('/category/news-on-the-day') }}">রোজনামচা</a></li>
                            <li><a href="{{ url('/category/aponjon') }}"> আপনজন</a></li>
                            <li> <a href="{{ url('/category/news') }}">সংবাদ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="row nevlink-footer w-100 mx-auto">
                        <ul class="text">
                            <li> <a href="{{ url('/category/bio-data') }}">জীবনবৃত্তান্ত </a> </li>
                            <li> <a href="{{ url('/category/interview') }}">সাক্ষাৎকার</a></li>
                            <li> <a href="{{ url('/category/speech') }}">বক্তব্য ও ভাষন</a></li>
                            <li><a href="{{ url('/category/sheikh-hasina-in-the-election') }}">নির্বাচনে শেখ
                                    হাসিনা</a></li>
                            <li><a href="{{ url('/category/digital-bangladesh') }}">ডিজিটাল বাংলাদেশ</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="row nevlink-footer">
                        <div class="icons">
                            <p> Follow us on</p>
                            <p>
                                <a href="#"><img src="/img/fb.svg" alt=""></a></li>
                                <a href="#"><img src="/img/yt.svg" alt=""></a></li>
                                <a href="#"><img src="/img/in.svg" alt=""></a></li>
                                <a href="#"><img src="/img/tw.svg" alt=""></a></li>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="copyright home-copyright pt-0 mt-3">
                        @include('frontend.magz.inc._credit-footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
