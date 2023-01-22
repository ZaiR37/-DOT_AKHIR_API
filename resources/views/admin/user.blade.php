@extends('admin/admin-app')

@section('title','Esa Library - Manage Users')

@section('content')

<!-- Begin Page Content -->
<div class="container shadow bg-white py-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h3 class="h3 mb-0 text-base fw-bold">Manage Users</h3>
    </div>
    <hr>

    <!-- Content Row -->
    <div class="row">
        
        <!-- flash data -->
    
        <!-- jika ada flash data success -->
            <!-- <div class="alert alert-success alert-dismissible fade show" role="alert"> -->
                        <!-- flash data message -->
            <!-- </div> -->
        <!-- jika ada flash data error -->
            <!-- <div class="alert alert-danger alert-dismissible fade show" role="alert"> -->
                        <!-- flash data message -->
            <!-- </div> -->

        <div class="col-3 mb-4">
            <a class="btn btn-outline-success" href="{{ url('/admin/users/add') }}" class="text-white text-decoration-none"><i class="fas fa-plus"></i> Add new user</a>
        </div>
        <div class="col-12">
            <table class="table table-hover text-center rounded">
                <thead class="table-success">
                    <tr>
                        <th>NIM</th>
                        <th>Name</th>
                        <th>Major</th>
                        <th>Faculty</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-body">

                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(function() {
    const tableBody = $(".table-body");
    function reload(){
        $.ajax({
            url: "http://128.199.65.180/api/v1/users/",
            type: "get",
            success: function($data) {
                $.each($data, function(index, value) {
                    console.log(value);
                    const id = value['id'];
                    const trimmedString = value['alamat'].length > 35 ? 
                                value['alamat'].substring(0, 35 - 3) + "..." : 
                                value['alamat'];
                    tableBody.append(`<tr>
                            <td class="d-flex justify-content-center">
                                `+ value['nim'] +`
                            </td>
                            <td>`+ value['nama']+`</td>
                            <td>`+ value['jurusan']+`</td>
                            <td>`+ value['fakultas']+`</td>
                            <td class="text-start"> `+trimmedString +`</td>
                            <td>`+ value['no_telepon']+`</td>
                            <td>
                                <div class="d-flex gap-1">
                                <a class="btn btn-warning" href="users/edit/`+id+`"><i class="fa-solid fa-gear"></i></a><button class="btn btn-danger btn-delete" id="btn-delete" value="`+id+`"><i class="fa-solid fa-trash"></i></button>
                                </div>
                                </td>
                        </tr>`)
                })
            }
        });
    }
    reload();

        $('body').on('click', '.btn-delete', function (e) {
            e.preventDefault();
            console.log($(this).val());
            $.ajax({
                url: "http://128.199.65.180/api/v1/users/"+$(this).val(),
                type: "DELETE",
                success: function($data) {
                    alert("Data berhasil di delete");
                    tableBody.children().remove();
                    reload();
                }
            });
        });
    })
</script>

@endsection