@extends('admin/admin-app')

@section('title','Esa Library - Edit Book')

@section('content')

<!-- Begin Page Content -->
<div class="container shadow bg-white py-4 mb-4">

<form class="border border-light p-5 row form" method="POST" action="{{ url('admin/users') }}">

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h3 class="h3 mb-0 text-base fw-bold">Edit Book</h3>
    </div>
    <hr>

    <div class="col-12">
        <label class="form-label" for="textAreaExample">Cover</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="image_link">
        </div>

        <label class="form-label" for="textAreaExample">Title</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="judul">
        </div>
        
        <label class="form-label" for="textAreaExample">Pages</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="jumlah_halaman">
        </div>

        <label class="form-label" for="textAreaExample">Category</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="kategori">
        </div>

        <label class="form-label" for="textAreaExample">Publisher</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="penerbit">
        </div>

        <label class="form-label" for="textAreaExample">Author</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="penulis">
        </div>

        <label class="form-label" for="textAreaExample">Synopsis</label>
        <div class="form-outline mb-4">
            <textarea id="defaultSubscriptionFormPassword" class="form-control" name="sinopsis"></textarea>
        </div>

        <label class="form-label" for="textAreaExample">Year Published</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="tahun_terbit">
        </div>

        
        <label class="form-label" for="textAreaExample">Size</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="ukuran_buku">
        </div>
    </div>


    <div class="col-6">
        <button class="btn btn-warning btn-block" type="reset"><i class="fa-solid fa-arrows-spin"></i> Reset Input</button>
    </div>
    <div class="col-6">
        <button class="btn btn-success btn-block" type="submit"><i class="fa-solid fa-plus"></i> Edit Book</button>
    </div>

</form>

</div>

<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(function() {
    $.ajax({
        url: 'http://128.199.65.180/api/v1/books/{{$id}}',
        type: 'GET',            
        success: function(data) { 
        console.log(data);
            $('input[name="image_link"]').val(data['image_link']);
            $('input[name="judul"]').val(data['judul']);
            $('input[name="jumlah_halaman"]').val(data['jumlah_halaman']);
            $('input[name="kategori"]').val(data['kategori']);
            $('input[name="penerbit"]').val(data['penerbit']);
            $('input[name="penulis"]').val(data['penulis']);
            $('textarea[name="sinopsis"]').val(data['sinopsis']);
            $('input[name="tahun_terbit"]').val(data['tahun_terbit']);
            $('input[name="ukuran_buku"]').val(data['ukuran_buku']);
        }
    });

    $(".form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'http://128.199.65.180/api/v1/books/{{$id}}',
            type: 'PUT',
            data: $(this).serialize(),             
            success: function(data) { 
            console.log(data);
            window.location="{{url('admin')}}";        
            }
        });
    });
});
</script>
@endsection