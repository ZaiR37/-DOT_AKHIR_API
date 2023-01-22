@extends('admin/admin-app')

@section('title','Esa Library - Manage Book')

@section('content')
<!-- Begin Page Content -->
<div class="container shadow bg-white p-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h3 class="h3 mb-0 text-base fw-bold">Manage Books</h3>
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
            <a class="btn btn-outline-success" href="{{ url('/admin/add') }}" class="text-white text-decoration-none"><i class="fas fa-plus"></i> Add new book</a>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover text-center rounded">
                    <thead class="table-success">
                        <tr>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Pages</th>
                            <th>Category</th>
                            <th>Publisher</th>
                            <th>Author</th>
                            <th>Synopsis</th>
                            <th>Year Published</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-body">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal dong, iya bang -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <form id="form" class="form">
        <div class="modal-header">
            <h5 class="text-base fw-bold title-modal"> </h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="container">
                <h5 class="modal-title text-base fw-bold" id="exampleModalLabel"></h5>
                    <div class="row gy-4">
                        <div class="col-md-4 image_link">
                            
                        </div>
                        <div class="col-md-8 p-0">
                            <table class="table table-striped">
                                <tr>
                                    <td>Category</td>
                                    <td>:</td>
                                    <td class="kategori"></td>
                                </tr>
                                <tr>
                                    <td>Pages</td>
                                    <td>:</td>
                                    <td class="jumlah_halaman"></td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>:</td>
                                    <td class="ukuran_buku"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-12 shadow p-4 rounded">
                            <div class="container-fluid">
                            <h5 class="text-base fw-bold">Student Data</h5>
                                
                                    <input type="hidden" name="id_buku">
                                    <select class="browser-default custom-select user-select" name="id_peminjam">
                                        <option selected>Select a student</option>
                                        
                                    </select>

                                <table class="table table-striped user-table">
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-mdb-dismiss="modal"><i class="fas fa-close"></i> Close</button>
            <button type="button" id="#submit" class="btn btn-success submit" data-mdb-dismiss="modal"></button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(function() {
    const tableBody = $(".table-body");
    function reload(){
        $.ajax({
            url: "http://128.199.65.180/api/v1/books/",
            type: "get",
            success: function($data) {
                $.each($data, function(index, value) {
                    console.log(value);
                    const trimmedString = value['sinopsis'].length > 80 ? 
                                value['sinopsis'].substring(0, 80 - 3) + "..." : 
                                value['sinopsis'];
                    const id = value['id'];
                    tableBody.append(`<tr>
                            <td class="d-flex justify-content-center">
                                <img class="img-fluid" style="min-width:100px;" src="`+ value['image_link'] +`">
                            </td>
                            <td>`+ value['judul']+`</td>
                            <td>`+ value['jumlah_halaman']+`</td>
                            <td>`+ value['kategori']+`</td>
                            <td>`+ value['penerbit']+`</td>
                            <td>`+ value['penulis']+`</td>
                            <td class="text-start"> `+trimmedString +`</td>
                            <td>`+ value['tahun_terbit']+`</td>
                            <td style="width:120px">`+ value['ukuran_buku']+`</td>
                            <td>
                                <div class="d-flex justify-content-center gap-1">
                                <a class="btn btn-warning" href="admin/edit/`+id+`"><i class="fa-solid fa-gear"></i></a>
                                `+
                                (value['status'] == 1 ? `<button class="btn btn-danger btn-delete" id="btn-delete" value="`+id+`"><i class="fa-solid fa-trash"></i></button><button type="button" class="btn btn-success btn-borrow" data-mdb-toggle="modal" data-mdb-target="#exampleModal" value="`+id+`"><i class="fa-solid fa-user-check"></i></button>` : `<button type="button" class="btn btn-info btn-return" value="`+id+`" data-mdb-toggle="modal" data-mdb-target="#exampleModal"><i class="fas fa-hand-holding-hand"></i></button>`)
                                +`
                                </div>
                            </td>
                        </tr>`);
                })
            }
        });
    }
    reload();

        $('body').on('click', '.btn-delete', function (e) {
            e.preventDefault();
            console.log($(this).val());
            $.ajax({
                url: "http://128.199.65.180/api/v1/books/"+$(this).val(),
                type: "DELETE",
                success: function($data) {
                    alert("Data berhasil di delete");
                    tableBody.children().remove();
                    reload();
                }
            });
        });

        $('body').on('click', '.btn-borrow', function (e) {
            e.preventDefault();
            // console.log($(this).val());
            $('.submit').html(`<i class="fas fa-plus"></i> Add borrowing data`);
            $('.submit').addClass("submit-borrow").removeClass("submit-return");
            $('.user-table').html('');
            $.ajax({
                url: "http://128.199.65.180/api/v1/books/"+$(this).val(),
                type: "GET",
                success: function($data) {
                    $('.title-modal').html(`<i class="fas fa-book-open-reader"></i> Book Borrowing`);
                    $('input[name=id_buku]').val($data['id']);
                    $('.user-select').html('<option selected>Select a student</option>');
                        // console.log($data)
                        $('.modal-title').html($data['judul']);
                        $('.image_link').html(`<img class="img-thumbnail" src="`+$data['image_link']+`">`);
                        $('.kategori').html($data['kategori']);
                        $('.jumlah_halaman').html($data['jumlah_halaman']);
                        $('.ukuran_buku').html($data['ukuran_buku']);
                        
                    $.ajax({
                        url: "http://128.199.65.180/api/v1/users",
                        type: "GET",
                        success: function($data) {
                            console.log($data);
                            $.each($data, function(i,v){
                                $('.user-select').append(`<option value="`+v['id']+`">`+v['nim']+` - `+v['nama']+`</option>`);
                            })
                        }
                    })
                }
            });
        });
        
        $('.user-select').on('change', function(){
            console.log($(this).val());
            var id = $(this).val();
                $.ajax({
                    url: "http://128.199.65.180/api/v1/users/"+id,
                    type: "GET",
                    success: function($data) {
                        $('.user-table').html(`
                        <tr>
                            <td>Major</td>
                            <td>:</td>
                            <td>`+$data['jurusan']+`</td>
                        </tr>
                        <tr>
                            <td>Faculty</td>
                            <td>:</td>
                            <td>`+$data['fakultas']+`</td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td>:</td>
                            <td>`+$data['no_telepon']+`</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>`+$data['alamat']+`</td>
                        </tr>
                        `);
                        
                    }
                })
        })

        $('body').on('click', '.submit-borrow', function (e) {
                e.preventDefault();
            
                var id_buku = $('input[name=id_buku]').val();
                var id_peminjam = $('select[name=id_peminjam]').val();
                console.log(id_buku);
                console.log(id_peminjam);
                $.ajax({
                    url: "http://128.199.65.180/api/v1/history",
                    type: "POST",
                    data: {'id_buku':id_buku, 'id_peminjam':id_peminjam, 'status':'meminjam'},
                    success: function($data){
                        // console.log($data);
                        $.ajax({
                            url: "http://128.199.65.180/api/v1/books/"+id_buku,
                            type: "PUT",
                            data: {'status':0,'id_peminjam':id_peminjam},
                            success: function($data){
                                console.log($data);

                                tableBody.children().remove();
                                reload();
                            }
                        })
                    }
                })
        })

        $('body').on('click', '.btn-return', function (e) {
            e.preventDefault();
                var id = $((this)).val();
                $('.submit').html(`<i class="fas fa-book"></i> return book`);
                $('.submit').addClass("submit-return").removeClass("submit-borrow");
                $.ajax({
                    url: "http://128.199.65.180/api/v1/books/"+id,
                    type: "GET",
                    success: function($data)
                    {
                        $('.title-modal').html(`<i class="fas fa-hand-holding-hand"></i> Book Returning`);
                        var id_user = $data['id_peminjam'];
                        $('input[name=id_buku]').val($data['id']);
                        // console.log($data)
                        $('.modal-title').html($data['judul']);
                        $('.image_link').html(`<img class="img-thumbnail" src="`+$data['image_link']+`">`);
                        $('.kategori').html($data['kategori']);
                        $('.jumlah_halaman').html($data['jumlah_halaman']);
                        $('.ukuran_buku').html($data['ukuran_buku']);
                        $.ajax({
                            url: "http://128.199.65.180/api/v1/users/"+id_user,
                            type: "GET",
                            success: function($data)
                            {
                                
                                $('.user-select').html(`<option selected value="`+$data['id']+`">`+$data['nim']+` - `+$data['nama']+`</option>`);
                                $('.user-table').html(`
                                    <tr>
                                        <td>Major</td>
                                        <td>:</td>
                                        <td>`+$data['jurusan']+`</td>
                                    </tr>
                                    <tr>
                                        <td>Faculty</td>
                                        <td>:</td>
                                        <td>`+$data['fakultas']+`</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td>:</td>
                                        <td>`+$data['no_telepon']+`</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td>`+$data['alamat']+`</td>
                                    </tr>
                                `);
                            }
                        })
                    }
                })
        });

        $('body').on('click', '.submit-return', function (e) {
                e.preventDefault();
                var id_buku = $('input[name=id_buku]').val();
                var id_peminjam = $('select[name=id_peminjam]').val();

                $.ajax({
                    url: "http://128.199.65.180/api/v1/history",
                    type: "POST",
                    data: {'id_buku':id_buku, 'id_peminjam':id_peminjam, 'status':'mengembalikan'},
                    success: function($data){
                        // console.log($data);
                        $.ajax({
                            url: "http://128.199.65.180/api/v1/books/"+id_buku,
                            type: "PUT",
                            data: {'status':1,'id_peminjam':null},
                            success: function($data){
                                console.log($data);

                                tableBody.children().remove();
                                reload();
                            }
                        })
                    }
                })
        })


    })
</script>
@endsection