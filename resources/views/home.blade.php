@extends('templates/app')

@section('title', 'Esa Library')

@section('content')

<!-- <svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 100" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(23, 125, 77, 1)" offset="0%"></stop><stop stop-color="rgba(23, 125, 77, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,70L16,63.3C32,57,64,43,96,35C128,27,160,23,192,28.3C224,33,256,47,288,43.3C320,40,352,20,384,20C416,20,448,40,480,48.3C512,57,544,53,576,48.3C608,43,640,37,672,33.3C704,30,736,30,768,38.3C800,47,832,63,864,61.7C896,60,928,40,960,26.7C992,13,1024,7,1056,18.3C1088,30,1120,60,1152,71.7C1184,83,1216,77,1248,63.3C1280,50,1312,30,1344,23.3C1376,17,1408,23,1440,30C1472,37,1504,43,1536,40C1568,37,1600,23,1632,20C1664,17,1696,23,1728,35C1760,47,1792,63,1824,68.3C1856,73,1888,67,1920,58.3C1952,50,1984,40,2016,40C2048,40,2080,50,2112,60C2144,70,2176,80,2208,71.7C2240,63,2272,37,2288,23.3L2304,10L2304,100L2288,100C2272,100,2240,100,2208,100C2176,100,2144,100,2112,100C2080,100,2048,100,2016,100C1984,100,1952,100,1920,100C1888,100,1856,100,1824,100C1792,100,1760,100,1728,100C1696,100,1664,100,1632,100C1600,100,1568,100,1536,100C1504,100,1472,100,1440,100C1408,100,1376,100,1344,100C1312,100,1280,100,1248,100C1216,100,1184,100,1152,100C1120,100,1088,100,1056,100C1024,100,992,100,960,100C928,100,896,100,864,100C832,100,800,100,768,100C736,100,704,100,672,100C640,100,608,100,576,100C544,100,512,100,480,100C448,100,416,100,384,100C352,100,320,100,288,100C256,100,224,100,192,100C160,100,128,100,96,100C64,100,32,100,16,100L0,100Z"></path></svg> -->
<section id="website-info" class="base-bg">
    <div class="container">
        <div class="info">
            <h4 class="h4 fw-bold mb-2">Esa Library</h4>
            <h5 class="h5 mb-5">is an electronic information website of books that resites in Esa Unggul University.</h5>
            <a href="{{ url('/search-tags') }}" class="btn btn-outline-success btn-lg text-white border-white border-2">Explore now <i class="fas fa-rocket fa-sm"></i></a>
        </div>
    </div>
</section>
    
    <svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 100" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(23, 125, 77, 1)" offset="0%"></stop><stop stop-color="rgba(23, 125, 77, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,50L18.5,45C36.9,40,74,30,111,31.7C147.7,33,185,47,222,53.3C258.5,60,295,60,332,56.7C369.2,53,406,47,443,41.7C480,37,517,33,554,41.7C590.8,50,628,70,665,73.3C701.5,77,738,63,775,61.7C812.3,60,849,70,886,76.7C923.1,83,960,87,997,76.7C1033.8,67,1071,43,1108,41.7C1144.6,40,1182,60,1218,65C1255.4,70,1292,60,1329,53.3C1366.2,47,1403,43,1440,35C1476.9,27,1514,13,1551,16.7C1587.7,20,1625,40,1662,53.3C1698.5,67,1735,73,1772,76.7C1809.2,80,1846,80,1883,66.7C1920,53,1957,27,1994,25C2030.8,23,2068,47,2105,56.7C2141.5,67,2178,63,2215,61.7C2252.3,60,2289,60,2326,51.7C2363.1,43,2400,27,2437,18.3C2473.8,10,2511,10,2548,18.3C2584.6,27,2622,43,2640,51.7L2658.5,60L2658.5,100L2640,100C2621.5,100,2585,100,2548,100C2510.8,100,2474,100,2437,100C2400,100,2363,100,2326,100C2289.2,100,2252,100,2215,100C2178.5,100,2142,100,2105,100C2067.7,100,2031,100,1994,100C1956.9,100,1920,100,1883,100C1846.2,100,1809,100,1772,100C1735.4,100,1698,100,1662,100C1624.6,100,1588,100,1551,100C1513.8,100,1477,100,1440,100C1403.1,100,1366,100,1329,100C1292.3,100,1255,100,1218,100C1181.5,100,1145,100,1108,100C1070.8,100,1034,100,997,100C960,100,923,100,886,100C849.2,100,812,100,775,100C738.5,100,702,100,665,100C627.7,100,591,100,554,100C516.9,100,480,100,443,100C406.2,100,369,100,332,100C295.4,100,258,100,222,100C184.6,100,148,100,111,100C73.8,100,37,100,18,100L0,100Z"></path></svg>
        
<section id="mb-4">

    <div class="container py-4">
        <div class="card py-3 px-5 shadow mb-4">
            <div class="row">
                <h4 class="h4-responsive text-base fw-bold mt-4 mb-2">NEW IN SHELF</h4>
                <div id="owl-demo" class="owl-1 owl-carousel owl-theme">
                    
                </div>
            </div>
        </div>
    </div>

</section>

<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(function() {
    $.ajax({
        url: "http://128.199.65.180/api/v1/books/",
        type: "get",
        success: function($data) {
            $newData = $data.reverse();
            $.each($newData, function(index, value) {
                console.log(value)
                const trimmedString = value['judul'].length > 50 ? value['judul'].substring(0, 50 - 3) + "..." : value['judul'];
                $('.owl-carousel').append(`<div class="image item">
                        <a href="{{ url('/book-details')}}/`+value['id']+`">
                        <img class="shadow-lg" src="`+value['image_link']+`" >
                            <div class="overlay">
                                <p>
                                    `+trimmedString+`
                                </p>
                            </div>
                        </a>
                    </div>`);
                    return index < 4;
                    
            })
            $(".owl-1").owlCarousel({
                margin: 20,
                nav: true,
                navText: ["<i class='fas fa-chevron-left fa-1x p-1' aria-hidden='true'></i>","<i class='fas fa-chevron-right fa-1x p-1' aria-hidden='true'></i>"],
                loop: true,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                responsive: {
                    0: {
                    items: 1
                    },
                    600: {
                    items: 3
                    },
                    1000: {
                    items: 5
                    }
                }
            })
        }
    });
    
});
</script>
@endsection