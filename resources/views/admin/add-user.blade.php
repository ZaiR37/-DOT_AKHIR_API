@extends('admin/admin-app')

@section('title','Esa Library - Add User')

@section('content')

<!-- Begin Page Content -->
<div class="container shadow bg-white py-3 mb-4">

<form class="border border-light p-5 row form" action="{{ url('admin/users') }}" method="GET">

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h3 class="h3 mb-0 text-base fw-bold">Add User</h3>
    </div>
    <hr>

    <div class="col-12">
        
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="nim">
            <label class="form-label" for="textAreaExample">NIM</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="nama">
            <label class="form-label" for="textAreaExample">Name</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="jurusan">
            <label class="form-label" for="textAreaExample">Major</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="fakultas">
            <label class="form-label" for="textAreaExample">Faculty</label>
        </div>

        <div class="form-outline mb-4">
            <textarea id="defaultSubscriptionFormPassword" class="form-control" name="alamat"></textarea>
            <label class="form-label" for="textAreaExample">Address</label>
        </div>

        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="no_telepon">
            <label class="form-label" for="textAreaExample">Phone Number</label>
        </div>

    </div>

    <div class="col-6">
        <button class="btn btn-warning btn-block" type="reset"><i class="fa-solid fa-arrows-spin"></i> Reset Input</button>
    </div>
    <div class="col-6">
        <button class="btn btn-success btn-block" type="submit"><i class="fa-solid fa-plus"></i> Add User</button>
    </div>

</form>

</div>
<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(function() {
    $(".form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'http://128.199.65.180/api/v1/users/',
            type: 'POST',
            data: $(this).serialize(),             
            success: function(data) { 
            console.log(data);      
            window.location="{{url('admin/users')}}";        
            }
        });
    });
});
</script>

@endsection