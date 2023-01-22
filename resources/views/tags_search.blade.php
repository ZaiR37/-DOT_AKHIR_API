@extends('templates/app')

@section('title','Esa Library - Book Search')

@section('content')

<section id="book-listing">
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="justify-content-center col-lg-3">
                <div class="p-3 shadow bg-white">
                    <h6 class="h5-responsive text-base fw-bold">Book Filter</h6>
                    <hr>
                    <div class="list-group category-container">
                    <label class="list-group-item">
                    <input type="radio" value="all" class="text-decoration-none all" name="kategori" checked>
                        All
                    </label>
                        </div>
                    </div>
                </div>
            
                <div class="col-lg-9 shadow rounded bg-white">
                <h6 class="h5-responsive text-base fw-bold m-3 result"></h6>
                <hr class="m-3">
                <div class="container mt-4">
                    <div class="row justify-content-evenly book-container">

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(function() {
    all();

    $(".all").on("click", function(){
        all();
    })

    $.ajax({
        url: "http://128.199.65.180/api/v1/books/",
        type: "GET",
        success: function(data) {
            console.log(data);

            kategori = [];
            
            $.each(data, function(i,v){
                var same_item = $.grep(kategori, function(item){
                    return item.kategori === v.kategori;
                })

                if(same_item.length === 0){
                    kategori.push(v);
                }

            })

            $.each(kategori, function(i,v){
                $('.category-container').append(`<label class="list-group-item">
                    <input type="radio" value="`+v['kategori']+`" class="text-decoration-none kategori" name="kategori">
                    `+v['kategori']+`
                </label>`)
            })
            
            
        }
    });
    // get all books
    function all(){
        $.ajax({
            url: "http://128.199.65.180/api/v1/books/",
            type: "GET",
            success: function(data) {
                console.log(data);
                $('.book-container').children().remove();

                $.each(data, function(index,value){
                    const trimmedStringJudul = value['judul'].length > 15 ? 
                    value['judul'].substring(0, 15 - 3) + "..." : 
                    value['judul'];
                    
                    const trimmedStringSinopsis = value['sinopsis'].length > 80 ? 
                    value['sinopsis'].substring(0, 80 - 3) + "..." : 
                    value['sinopsis'];
                        $('.book-container').append(`<div class="col-lg-6">
                            <div class="tag-book row g-0 border rounded overflow-hidden flex-md-row mb-4">
                            <img class="col img image" src="`+value['image_link']+`" alt="">
                                <div class="col py-2 px-3 d-flex flex-column position-static">
                                    <div class="d-flex justify-content-between">
                                        <strong class="mb-2 text-success">`+value['kategori']+`</strong>
                                        `+(value['id_peminjam'] !== null && value['id_peminjam'] !== "" ? '<span class="badge bg-danger text-white align-self-center mb-2">Borrowed</span>' : '')+`
                                    </div>
                                    <h3 class="mb-0"> 
                                        `+trimmedStringJudul+`
                                    </h3>
                                    <p class="mb-2">
                                        `+trimmedStringSinopsis+`
                                    </p>
                                    <a class="btn btn-outline-success mt-auto" href="{{ url('/book-details')}}/`+value['id']+`">Book details</a>
                                </div>
                            </div>
                        </div>`);

                        $('.result').html('Books total : '+ (index+1) +' item(s)');
                    })
            }
        });
    }

    // get category book
    $('body').on('click', '.kategori', function () {
        // $("input:radio.kategori").click(function(){
        var kategori = $(this).val();
        console.log(kategori);
        $.ajax({
            url: "http://128.199.65.180/api/v1/books/kategori/"+kategori,
            type: "GET",
            success: function(data) {
                
            $('.book-container').children().remove();
            $.each(data, function(index,value){
                        const trimmedStringJudul = value['judul'].length > 15 ? 
                        value['judul'].substring(0, 15 - 3) + "..." : 
                        value['judul'];
                        
                        const trimmedStringSinopsis = value['sinopsis'].length > 80 ? 
                        value['sinopsis'].substring(0, 80 - 3) + "..." : 
                        value['sinopsis'];
                            $('.book-container').append(`<div class="col-lg-6">
                                <div class="tag-book row g-0 border rounded overflow-hidden flex-md-row mb-4">
                                <img class="col img image" src="`+value['image_link']+`" alt="">
                                    <div class="col py-2 px-3 d-flex flex-column position-static">
                                        <strong class="d-inline-block mb-2 text-success">`+value['kategori']+`</strong>
                                        <h3 class="mb-0"> 
                                            `+trimmedStringJudul+`
                                        </h3>
                                        <p class="mb-2">
                                            `+trimmedStringSinopsis+`
                                        </p>
                                        <a class="btn btn-outline-success mt-auto" href="{{ url('/book-details')}}/`+value['id']+`">Book details</a>
                                    </div>
                                </div>
                            </div>`);
    
                            $('.result').html('Book searched for '+kategori+'... '+ (index+1)+' item(s)');
            })
            }
        });
    })
})

</script>

@endsection