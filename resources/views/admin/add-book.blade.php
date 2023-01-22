@extends('admin/admin-app')

@section('title','Esa Library - Add Book')

@section('content')

<!-- Begin Page Content -->
<div class="container shadow bg-white py-3 mb-4">

<form class="border border-light p-5 row form" action="{{ url('admin') }}" method="GET">

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h3 class="h3 mb-0 text-base fw-bold">Add Book</h3>
    </div>
    <hr>

    <div class="col-12">
        
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="image_link">
            <label class="form-label" for="textAreaExample">Cover</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="judul">
            <label class="form-label" for="textAreaExample">Title</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="jumlah_halaman">
            <label class="form-label" for="textAreaExample">Pages</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="kategori">
            <label class="form-label" for="textAreaExample">Category</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="penerbit">
            <label class="form-label" for="textAreaExample">Publisher</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="penulis">
            <label class="form-label" for="textAreaExample">Author</label>
        </div>

        <div class="form-outline mb-4">
            <textarea id="defaultSubscriptionFormPassword" class="form-control" name="sinopsis"></textarea>
            <label class="form-label" for="textAreaExample">Synopsis</label>
        </div>

        <label class="form-label" for="textAreaExample">Year Published</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="tahun_terbit">
        </div>

        
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="ukuran_buku">
            <label class="form-label" for="textAreaExample">Size</label>
        </div>


    </div>

    <div class="col-6">
        <button class="btn btn-warning btn-block" type="reset"><i class="fa-solid fa-arrows-spin"></i> Reset Input</button>
    </div>
    <div class="col-6">
        <button class="btn btn-success btn-block" type="submit"><i class="fa-solid fa-plus"></i> Add Book</button>
    </div>

</form>

</div>
<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(function() {
    $(".form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'http://128.199.65.180/api/v1/books/',
            type: 'POST',
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