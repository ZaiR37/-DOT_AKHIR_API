@extends('templates/app')

@section('title','Esa Library - Search Tags')

@section('content')
<div class="container my-2">
    <div class="align-items-center py-4">
        <div class="col">
            <div class="shadow bg-white p-4">
                <div class="d-flex mb-4">
                    <a href="javascript:history.back()" class="fw-bold text-base text-decoration-none"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                <div class="d-flex">
                    <h4 class="fw-bold text-base">Book Details</h4>
                </div>
                <hr class="p-0 mt-0">
                <div class="row">
                    <div class="col-md-3">
                        <div class="d-grid image-cover">
                            
                        </div>
                        <div class="status"></div>
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between">
                            <h1 class="fw-bold judul"></h1>
                        </div>
                        
                        <div class="d-flex">
                            <table class="table table-borderless table-responsive table-book">
                                <tbody>
                                    <tr>
                                        <td class="attribute">Pages</td>
                                        <td class="colon">:</td>
                                        <td class="value jumlah_halaman"></td>
                                    </tr>
                                    <tr>
                                        <td class="attribute">Category</td>
                                        <td class="colon">:</td>
                                        <td class="value kategori"></td>
                                    </tr>
                                    <tr>
                                        <td class="attribute">Publisher</td>
                                        <td class="colon">:</td>
                                        <td class="value penerbit"></td>
                                    </tr>
                                    <tr>
                                        <td class="attribute">Author</td>
                                        <td class="colon">:</td>
                                        <td class="value penulis"></td>
                                    </tr>
                                    <tr>
                                        <td class="attribute">Year Published</td>
                                        <td class="colon">:</td>
                                        <td class="value tahun_terbit"></td>
                                    </tr>
                                    <tr>
                                        <td class="attribute">Size</td>
                                        <td class="colon">:</td>
                                        <td class="value ukuran_buku"></td>
                                    </tr>
                                    <tr>
                                        <td><br></td>
                                    </tr>
                                    <tr>
                                        <td class="attribute" colspan="3">
                                            <h5 class="base-text">Description</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="attribute sinopsis" colspan="3"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(function() {
    $.ajax({
        url: "http://128.199.65.180/api/v1/books/{{$id}}",
        type: "GET",
        success: function(data) {
            console.log(data);
            $(".image-cover").append(`<img class="image book-cover" src="`+data['image_link']+`" alt="">`);
            $(".judul").append(data['judul']);
            $(".jumlah_halaman").append(data['jumlah_halaman']);
            $(".kategori").append(data['kategori']);
            $(".penerbit").append(data['penerbit']);
            $(".penulis").append(data['penulis']);
            $(".tahun_terbit").append(data['tahun_terbit']);
            $(".ukuran_buku").append(data['ukuran_buku']);
            $(".sinopsis").append(data['sinopsis']);
            $(".status").append((data['id_peminjam'] !== null && data['id_peminjam'] !== "" ? '<div class="p-2 fw-bold bg-danger text-white align-self-center mb-2">Not available to borrow</div>' : ''));
        }
    });
})
</script>
@endsection