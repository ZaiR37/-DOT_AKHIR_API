<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esa Library - Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        html,body {
            height:100%;
            width:100%;
            margin:0;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">
    <div class="col-lg-4 shadow p-4 bg-white">
        <div class="d-flex justify-content-center align-items-center text-base fw-bold mb-4">
            <i class="fa-solid fa-book-open title-icon"></i>&nbsp; Esa Library
        </div>
        <form action="#" method="POST" class="form">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" class="btn btn-outline-success">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
jQuery(function() {
    $(".form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'http://128.199.65.180/api/books/kategori/Sejarah',
            type: 'GET',
            success: function(data) { 
                console.log(data);
                alert(data['kategori']);
                
                $.ajax({
                    url: "{{ url('set_data') }}",
                    data: {'judul':data['judul']},
                    type: 'get',
                    success: function(d){
                        console.log(d);
                        $('.title-icon').html({{Session::get('book_data')}});
                    }
                })
                // window.location="{{url('admin')}}";        
            }
        });
    });
});
// data: $(this).serialize(),             
</script>
