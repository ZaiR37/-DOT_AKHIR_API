@extends('admin/admin-app')

@section('title','Esa Library - Activity Logs')

@section('content')
<div class="container px-5 py-3 mb-4">
    <div class="row shadow rounded p-4">
        <h4 class="text-center mb-4 text-base fw-bold">Activity Logs</h4>
        <div class="d-flex justify-content-center">
            <div class="col-md-5 text-center">
                <button id="all" class="btn btn-outline-dark rounded-pill active">
                    All
                </button>
                <button id="borrowed" class="btn btn-outline-success rounded-pill">
                    Borrow
                </button>
                <button id="returned" class="btn btn-outline-info rounded-pill">
                    Return
                </button>
                <hr>
            </div>
        </div>
        <div class="row justify-content-center mb-4">
            <div class="col-md-5 activity-log overflow-auto border p-4 rounded" style="max-height:500px;">
                
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="{{asset('js/dateFormat.js')}}"></script>
<script>
jQuery(function() {
    all();
    function all(){
        $.ajax({
                url: "http://128.199.65.180/api/v1/history/detail",
                type: "get",
                success: function($data){
                    $('.activity-log').children().remove();
                    $.each($data.reverse(), function(i,v){
                        var date = new Date(v['tanggal']);
                        console.log(date);
                        // var format = $.format(date);
                        $('.activity-log').append((v['kegiatan'] == 'meminjam' ? '<div class="log-item border-success border-2">' : '<div class="log-item border-info border-2">')+`
                            <div class="date">`+moment(date, "YYYYMMDD").locale('id').fromNow()+`</div>
                            <div class="text">`+v['peminjam']+` `+(v['kegiatan'] == 'meminjam' ? '<b class="text-success">borrowed</b>' : '<b class="text-info">returned</b>')+` "`+v['judul_buku']+`"</div>
                        </div>
                        `);
                    })
                }
        })
    }

    function borrowed(){
        $.ajax({
            url: "http://128.199.65.180/api/v1/history/detail",
            type: "get",
            success: function($data){
                $('.activity-log').children().remove();
                $.each($data.reverse(), function(i,v){
                    var date = new Date(v['tanggal']);
                    console.log(date);
                    $('.activity-log').append((v['kegiatan'] == 'meminjam' ? `<div class="log-item border-success border-2"><div class="date">`+moment(date, "YYYYMMDD").locale('id').fromNow()+`</div>
                        <div class="text">`+v['peminjam']+` <b class="text-success">borrowed</b> "`+v['judul_buku']+`"</div>
                    </div>`: ''));
                })
            }
        })
    }

    function returned(){
        $.ajax({
            url: "http://128.199.65.180/api/v1/history/detail",
            type: "get",
            success: function($data){
                $('.activity-log').children().remove();
                $.each($data.reverse(), function(i,v){
                    var date = new Date(v['tanggal']);
                    console.log(date);
                    $('.activity-log').append((v['kegiatan'] == 'mengembalikan' ? `<div class="log-item border-info border-2"><div class="date">`+moment(date, "YYYYMMDD").locale('id').fromNow()+`</div>
                        <div class="text">`+v['peminjam']+` <b class="text-info">returned</b> "`+v['judul_buku']+`"</div>
                    </div>`: ''));
                })
            }
        })
    }

    $('body').on('click', '#all', function (e) {
        $((this)).addClass('active');
        $('#borrowed').removeClass('active');
        $('#returned').removeClass('active');
        e.preventDefault();

        all();
    });

    $('body').on('click', '#borrowed', function (e) {
        $((this)).addClass('active');
        $('#all').removeClass('active');
        $('#returned').removeClass('active');
        e.preventDefault();

        borrowed();
    });

    $('body').on('click', '#returned', function (e) {
        $((this)).addClass('active');
        $('#borrowed').removeClass('active');
        $('#all').removeClass('active');
        e.preventDefault();

        returned();
    });
});
</script>

@endsection