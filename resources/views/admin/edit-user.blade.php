@extends('admin/admin-app')

@section('title','Esa Library - Edit User')

@section('content')

<!-- Begin Page Content -->
<div class="container shadow bg-white py-4 mb-4">

<form class="border border-light p-5 row form" method="POST" action="{{ url('admin/users') }}">

    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h3 class="h3 mb-0 text-base fw-bold">Edit Users</h3>
    </div>
    <hr>

    <div class="col-12">
        <label class="form-label" for="textAreaExample">NIM</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="nim">
        </div>

        <label class="form-label" for="textAreaExample">Name</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="nama">
        </div>
        
        <label class="form-label" for="textAreaExample">Major</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="jurusan">
        </div>

        <label class="form-label" for="textAreaExample">Faculty</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="fakultas">
        </div>

        <label class="form-label" for="textAreaExample">Address</label>
        <div class="form-outline mb-4">
            <textarea id="defaultSubscriptionFormPassword" class="form-control" name="alamat"></textarea>
        </div>

        <label class="form-label" for="textAreaExample">Phone Number</label>
        <div class="form-outline mb-4">
            <input type="text" id="defaultSubscriptionFormPassword" class="form-control" name="no_telepon">
        </div>

    </div>


    <div class="col-6">
        <button class="btn btn-warning btn-block" type="reset"><i class="fa-solid fa-arrows-spin"></i> Reset Input</button>
    </div>
    <div class="col-6">
        <button class="btn btn-success btn-block" type="submit"><i class="fa-solid fa-plus"></i> Edit User</button>
    </div>

</form>

</div>

<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(function() {
    $.ajax({
        url: 'http://128.199.65.180/api/v1/users/{{$id}}',
        type: 'GET',            
        success: function(data) { 
        console.log(data);
            $('input[name="nim"]').val(data['nim']);
            $('input[name="nama"]').val(data['nama']);
            $('input[name="jurusan"]').val(data['jurusan']);
            $('input[name="fakultas"]').val(data['fakultas']);
            $('textarea[name="alamat"]').val(data['alamat']);
            $('input[name="no_telepon"]').val(data['no_telepon']);
        }
    });

    $(".form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'http://128.199.65.180/api/v1/users/{{$id}}',
            type: 'PUT',
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