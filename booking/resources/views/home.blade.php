@extends('layouts.app')

@section('title', 'Hotel Perla Somesului')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />

@endsection

@section('content')

<section id="home" class="about-us">
    <div class="container">
        <div class="about-us-content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="single-about-us">
                        <div class="about-us-txt">
                            <h2>
                              Bucură-te de Munții Rodnei cu o cazare de vis
                            </h2>
                        </div><!--/.about-us-txt-->
                    </div><!--/.single-about-us-->
                </div><!--/.col-->
                <div class="col-sm-0">
                    <div class="single-about-us">

                    </div><!--/.single-about-us-->
                </div><!--/.col-->
            </div><!--/.row-->
        </div><!--/.about-us-content-->
    </div><!--/.container-->

    <div id="description" style="margin-top: 850px;"></div>
    
</section><!--/.about-us-->
<!--about-us end -->



<div class="row" style="background-color: white; padding-left: 100px; padding-right: 100px; text-align: center;">
    <h3 style="margin-top: 70px; margin-bottom: 30px;">
        <b>Hotel Perla Somesului - cazare de 3 stele si servicii de top</b>
    </h3>
    <hr style="width: 400px; border-width: 2px; margin: 0 auto; margin-bottom: 40px; border-color: darkgray;">
    <h4 style="line-height: 2;">
        Bucură-te de o escapadă relaxantă la munte într-unul dintre cele mai rafinate și primitoare hoteluri din zonă!
        Situat în inima peisajelor pitorești ale munților, hotelul nostru este o oază de liniște și confort,
        unde fiecare moment se transformă într-o experiență memorabilă. Fie că ești în căutarea unei evadări romantice
        sau a unei vacanțe de relaxare în familie, aici vei găsi o combinație perfectă între lux și natură.

        Camerele noastre spațioase și elegante te așteaptă să te relaxezi și să te destindă într-un decor de vis.
        Indiferent că privești pe fereastra către vârfurile înzăpezite ale munților sau că te bucuri de priveliștea
        îmbietoare a pădurilor de conifere, vei fi învăluit de o atmosferă de liniște și armonie.
        <br>
        <br>
    </h4>
    <div class="col-md-4" style="margin-bottom: 50px;">
    <img src="{{asset('images/hotel.jpg')}}">
    </div>
    <div class="col-md-8" style="margin-bottom: 50px;">
        <h5 style="line-height: 2; text-align: justify;">
            Fiecare weekend este dedicat drumetiilor pe munte, oferindu-va oportunitatea de a descoperi peisaje unice, 
            cascade ascunse si trasee spectaculoase. Ghizii nostri experimentati va vor insoti pe cele mai captivante 
            trasee si va vor impartasi secretele acestor locuri fermecatoare.
            <br>
            Pentru cei pasionati de adrenalina, avem ATV-uri moderne de inchiriat, pregatite sa va ofere o experienta de neuitat. 
            Explorati padurile inconjuratoare pe patru roti, simtind rafalele de vant si privind privelistile panoramice. 
            Fie ca sunteti un incepator entuziasmat sau un expert experimentat, hotelul va ofera oportunitati nelimitate 
            de distractie si aventura.
            <br>
            <br>
            Pentru cei care doresc sa se bucure de meci de fotbal, avem un teren special amenajat, perfect pentru a va 
            testa abilitatile si a va distra alaturi de prieteni sau familie. Puteti organiza turnee amicale sau 
            antrenamente intense, avand garantia unor momente de competitie si distractie.
        </h5>
    </div>
</div>

<!--galley start-->
<section class="gallery" style="background-color: rgba(0,0,0,0.4);">
    <!--travel-box start-->
    <section class="travel-box">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-travel-boxes" style="margin-top: 200px; margin-bottom: 50px;">
                        <div id="desc-tabs" class="desc-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#tours" aria-controls="tours" role="tab" data-toggle="tab" style="border-top-left-radius: 0px; border-top-right-radius: 0px;">
                                        <i class="fas fa-bed"></i>
                                        Camere
                                    </a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active fade in" id="tours">
                                    <div class="tab-para">
                                        <form method="post" action="{{route('search')}}">
                                            @csrf

                                            <div class="row">

                                                <div class="col-lg-2 col-md-3 col-sm-4">
                                                    <div class="single-tab-select-box">
                                                        <h2>check in</h2>
                                                        <div class="travel-check-icon">
                                                            <input type="text" name="check_in" class="form-control" data-toggle="datepicker" value="{{date('m/d/Y')}}">
                                                        </div><!-- /.travel-check-icon -->
                                                    </div><!--/.single-tab-select-box-->
                                                </div><!--/.col-->

                                                <div class="col-lg-2 col-md-3 col-sm-4">
                                                    <div class="single-tab-select-box">
                                                        <h2>check out</h2>
                                                        <div class="travel-check-icon">
                                                            @php
                                                            $datet = explode("/", date('m/d/Y'));
                                                            $datet[1] = intval($datet[1]) + 1;
                                                            @endphp
                                                            <input type="text" name="check_out" class="form-control" data-toggle="datepicker" value="{{$datet[0] . '/' . $datet[1] . '/'. $datet[2]}}">
                                                        </div><!-- /.travel-check-icon -->
                                                    </div><!--/.single-tab-select-box-->
                                                </div><!--/.col-->

                                                @php
                                                use App\Models\RoomType;
                                                $roomtypes = RoomType::all();
                                                @endphp

                                                <div class="col-lg-3 col-md-2 col-sm-5">
                                                    <div class="single-tab-select-box">
                                                        <h2>Tip camera</h2>
                                                        <select name='type' class="form-control" style="height: 48px">
                                                            @foreach ($roomtypes as $roomtype)
                                                            <option value="{{$roomtype->id_RoomType}}">{{$roomtype->type}}</option>
                                                            @endforeach
                                                            <option value="no" selected>Selecteaza tipul</option>
                                                        </select>
                                                    </div><!--/.single-tab-select-box-->
                                                </div><!--/.col-->

                                                <div class="col-lg-4 col-md-1 col-sm-4">
                                                    <div class="single-tab-select-box" style="text-align: center">
                                                        <h2>Pret</h2>
                                                        <div class="travel-filter">
                                                            <div class="info_widget">
                                                                <div class="price_filter">
                                                                    <input type="text" id="rangePrimary" name="rangePrimary" value="" />
                                                                    <p id="priceRangeSelected"></P>
                                                                </div><!--/.price-filter-->
                                                            </div><!--/.info_widget-->
                                                        </div><!--/.travel-filter-->
                                                    </div><!--/.col-->
                                                </div>
                                            </div><!--/.row-->

                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <div class="about-btn travel-mrt-0 pull-left">
                                                        <button class="about-view travel-btn">
                                                            cauta
                                                        </button><!--/.travel-btn-->
                                                    </div><!--/.about-btn-->
                                                </div><!--/.col-->
                                            </div><!--/.row-->
                                        </form>
                                    </div><!--/.tab-para-->
                                </div><!--/.tabpannel-->
                            </div><!--/.tab content-->
                        </div><!--/.desc-tabs-->
                    </div><!--/.single-travel-box-->
                </div><!--/.col-->
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/.travel-box-->
    <!--travel-box end-->

    <div id="gallery" style="margin-bottom: 20px;"></div>

    <div class="container">
        <div class="gallery-details" style="margin-top: 74px;">
            <div class="gallary-header text-center">
                <h2 style="color: white;">
                    Exploreaza
                </h2>
                <p style="color: white;">
                    Alege una dintre camerele noastre
                </p>
            </div><!--/.gallery-header-->
            <div class="owl-carousel owl-theme" id="testemonial-carousel">
                @php
                use App\Models\Room;
                $rooms = Room::all();
                @endphp

                @foreach ($rooms as $room)
                @php
                $data = RoomType::find($room->id_RoomType);
                @endphp
                <div class="home1-testm item">
                    <div class="home1-testm-single text-center">
                        <div class="home1-testm-img">
                            <a href="{{route('room', ['id' => $room->id_Room])}}"><img src="{{asset('/images/' . $room->image)}}" alt="img" style="height: 350px" /></a>
                        </div><!--/.home1-testm-img-->
                        <div class="home1-testm-txt">
                            <h3>
                                <a href="{{route('room', ['id' => $room->id_Room])}}">
                                    {{$data->type}}
                                </a>
                            </h3>
                            <h4>Pret: {{$data->price}} RON / noapte</h4>
                            <h4><i class="fa-solid fa-user"></i>: {{$data->capacity}}</h4>
                        </div><!--/.home1-testm-txt-->
                    </div><!--/.home1-testm-single-->

                </div><!--/.item-->
                @endforeach

            </div><!--/.testemonial-carousel-->
        </div><!--/.gallery-details-->
    </div><!--/.container-->

</section><!--/.gallery-->
<!--gallery end-->

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
<script src="https://kit.fontawesome.com/045d1ece88.js" crossorigin="anonymous"></script>

<script>
    $("#rangePrimary").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 1000,
        from: 200,
        to: 800,
        prefix: "RON"
    });
</script>
@endsection