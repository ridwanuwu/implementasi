@extends('Template.master')

@section('title','Scoreboard')

@section('css')
<!-- css internal place -->
<style>
    input {
  text-align: center;
 
}

input[type="number"]
{
    font-size:24px;
    font-weight:bold;
    width:120px;
  height:80px;
}
</style>
@endsection
@section('dropdown-open','menu-open')
@section('dropdown-master','active')
@section('dropdown-console','active')
@section('content')
<!-- Content Body place -->
<h3 class="text-center font-weight-bold">Console Scoreboard</h3>
<div class="container p-5">
    <div class="row text-center">
        {{-- <div class="row-g-3"> --}}
        <div class="col-lg-6">
            <div class="row">
            {{-- <div class="form-group"> --}}
                <div class="col-auto"> 
                    <label for="name_home">Name Tim A</label>
                </div>
                
                <div class="col-auto">
                    <input type="text" class="form-control" id="name_home" placeholder="Name Tim" value="{{$scoreboard[0]->name_home}}">
                </div>
                
                <div class="col-auto">
                    <button class="btn btn-primary" id="name_home_button"><i class="fas fa-pen-square"></i></button>
                </div>
                <br>
            </div>
        </div>
        <div class="col-lg-6">
            {{-- <div class="form-group"> --}}
            <div class="row">
                <div class="col-auto">
                    <label for="name_away">Name Tim B</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" id="name_away" placeholder="Name Tim" value="{{$scoreboard[0]->name_away}}">
                </div>
                <div class="col-auto">
                    <button class="btn btn-primary" id="name_away_button"><i class="fas fa-pen-square"></i></button>
                </div>
                <br>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="score_home">Score Tim A</label>
                <center>
                    <input type="number" class="form-control" id="score_home" placeholder="Name Tim" value="{{$scoreboard[0]->score_home}}">
                </center>
                <button class="btn btn-primary m-3" id="score_home_button_plus"><i class="far fa-plus-square"></i></button>
                <button class="btn btn-danger m-3" id="score_home_button_minus"><i class="far fa-minus-square"></i></i></button>
                <button class="btn btn-warning m-3" id="reset_score_home"><i class="fas fa-redo-alt"></i></button>    
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="score_away">Score Tim B</label>
                <center>
                    <input type="number" class="form-control" id="score_away" placeholder="Name Tim" value="{{$scoreboard[0]->score_away}}">
                </center>
                <button class="btn btn-primary m-3" id="score_away_button_plus"><i class="far fa-plus-square"></i></button>
                <button class="btn btn-danger m-3" id="score_away_button_minus"><i class="far fa-minus-square"></i></i></button>
                <button class="btn btn-warning m-3" id="reset_score_away"><i class="fas fa-redo-alt"></i></button>    
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="score_home">Foul Tim</label>
                <center>
                    <input type="number" class="form-control" id="foul_home" placeholder="Name Tim" value="{{$scoreboard[0]->foul_home}}">
                </center>
                <button class="btn btn-primary m-3" id="foul_home_button_plus"><i class="far fa-plus-square"></i></button>
                <button class="btn btn-danger m-3" id="foul_home_button_minus"><i class="far fa-minus-square"></i></i></button>
                <button class="btn btn-warning m-3" id="reset_foul_home"><i class="fas fa-redo-alt"></i></button>    
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="score_away">Foul Tim</label>
                <center>
                    <input type="number" class="form-control" id="foul_away" placeholder="Name Tim" value="{{$scoreboard[0]->foul_away}}">
                </center>
                <button class="btn btn-primary m-3" id="foul_away_button_plus"><i class="far fa-plus-square"></i></button>
                <button class="btn btn-danger m-3" id="foul_away_button_minus"><i class="far fa-minus-square"></i></i></button>
                <button class="btn btn-warning m-3" id="reset_foul_away"><i class="fas fa-redo-alt"></i></button>    
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label for="">Pengaturan Waktu</label>
            <div class="row">
                <div class="col-2">
                    <button class="btn btn-warning" id="reset-time"><i class="fas fa-redo-alt"></i></button>    
                </div>
                <div class="col-2">
                    <button class="btn btn-primary pause" id="pause" onclick="togglePause(1);"><span class="fa fa-play"></span></button>    
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <label for="">Pengaturan Musik</label>
            <div class="row">
                <div class="col-2">
                    <h6 class="d-inline-block">1. </h6>
                    <button type="button" class="btn btn-success"><i class="fas fa-music"></i></button>    
                </div>
                <div class="col-2">
                    <h6 class="d-inline-block">2. </h6>
                    <button type="button" class="btn btn-success"><i class="fas fa-music"></i></button>    
                </div>
                <div class="col-2">
                    <h6 class="d-inline-block">3. </h6>
                    <button type="button" class="btn btn-success"><i class="fas fa-music"></i></button>    
                </div>
                <div class="col-2">
                    <h6 class="d-inline-block">4. </h6>
                    <button type="button" class="btn btn-success"><i class="fas fa-music"></i></button>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- script internal place -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   
<script>
    //time
    function togglePause(toPause)
    {
        if($('#pause > span').hasClass('fa-play')) {
            //clearInterval(timeinterval);
            $('#pause > span').addClass('fa-pause').removeClass('fa-play');
        }else{
            //var deadline=new Date(Date.parse(new Date()) + t);
            //initializeClock('clockdiv', deadline);
            $('#pause > span').addClass('fa-play').removeClass('fa-pause');
        }
    }
    $(document).ready(function () {
            $('#pause').click(function () {
                if($('#pause > span').hasClass('fa-play')) {
                    var value=0;
                }else{
                    var value=1;
                }
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-home-status') }}",
                    type: "POST",
                    data: {
                        status: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $.each(result.status, function (key, value) {
                            console.log(value.status);
                        });
                    }
                });
            });
    });
    //reset time  
    $(document).ready(function () {
            $('#reset-time').click(function () {
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-timer') }}",
                    type: "POST",
                    data: {
                        menit: 10,
                        detik: '00',
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $.each(result.status, function (key, value) {
                            console.log(value.status);
                        });
                    }
                });
            });
    });  
//home name
    $(document).ready(function () {
            $('#name_home_button').click(function () {
                var value = $('#name_home').val();
                console.log(value);
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-home-name') }}",
                    type: "POST",
                    data: {
                        name: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log(result.score_away);
                    }
                });
            });
    });
    //score plus home
    $(document).ready(function () {
            $('#score_home_button_plus').click(function () {
                var value = $('#score_home').val();
                value++;
                console.log(value);
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-home-score') }}",
                    type: "POST",
                    data: {
                        name: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.score, function (key, value) {
                            $("#score_home").val(value.score_home);
                        });
                    }
                });
            });
    });
    //score home minus
    $(document).ready(function () {
            $('#score_home_button_minus').click(function () {
                var value = $('#score_home').val();
                value--;
                console.log(value);
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-home-score') }}",
                    type: "POST",
                    data: {
                        name: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.score, function (key, value) {
                            $("#score_home").val(value.score_home);
                        });
                    }
                });
            });
    });
    //score home reset
    $(document).ready(function () {
            $('#reset_score_home').click(function () {
                $.ajax({
                    url: "{{ url('/scoreboard-console/reset-home-score') }}",
                    type: "POST",
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.score, function (key, value) {
                            $("#score_home").val(value.score_home);
                        });
                    }
                });
            });
    });
    //foul home plus
    $(document).ready(function () {
            $('#foul_home_button_plus').click(function () {
                var value = $('#foul_home').val();
                value++;
                console.log(value);
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-home-foul') }}",
                    type: "POST",
                    data: {
                        value: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.foul, function (key, value) {
                            $("#foul_home").val(value.foul_home);
                        });
                    }
                });
            });
    });
    //foul home minus
    $(document).ready(function () {
            $('#foul_home_button_minus').click(function () {
                var value = $('#foul_home').val();
                value--;
                console.log(value);
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-home-foul') }}",
                    type: "POST",
                    data: {
                        value: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.foul, function (key, value) {
                            $("#foul_home").val(value.foul_home);
                        });
                    }
                });
            });
    });
    //foul home reset
    $(document).ready(function () {
            $('#reset_foul_home').click(function () {
                $.ajax({
                    url: "{{ url('/scoreboard-console/reset-home-foul') }}",
                    type: "POST",
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.foul, function (key, value) {
                            $("#foul_home").val(value.foul_home);
                        });
                    }
                });
            });
    });
    //away name
    $(document).ready(function () {
            $('#name_away_button').click(function () {
                var value = $('#name_away').val();
                console.log(value);
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-away-name') }}",
                    type: "POST",
                    data: {
                        name: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log('success');
                        
                    }
                });
            });
    });
    //away score plus
    $(document).ready(function () {
            $('#score_away_button_plus').click(function () {
                var value = $('#score_away').val();
                value++;
                console.log(value);
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-away-score') }}",
                    type: "POST",
                    data: {
                        name: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.score, function (key, value) {
                            $("#score_away").val(value.score_away);
                        });
                    }
                });
            });
    });
    //away score minus
    $(document).ready(function () {
            $('#score_away_button_minus').click(function () {
                var value = $('#score_away').val();
                value--;
                console.log(value);
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-away-score') }}",
                    type: "POST",
                    data: {
                        name: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("Success")
                        $.each(result.score, function (key, value) {
                            $("#score_away").val(value.score_away);
                        });
                    }
                });
            });
    });
    //score home reset
    $(document).ready(function () {
            $('#reset_score_away').click(function () {
                $.ajax({
                    url: "{{ url('/scoreboard-console/reset-away-score') }}",
                    type: "POST",
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.score, function (key, value) {
                            $("#score_away").val(value.score_away);
                        });
                    }
                });
            });
    });
    //foul away plus
    $(document).ready(function () {
            $('#foul_away_button_plus').click(function () {
                var value = $('#foul_away').val();
                value++;
                console.log(value);
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-away-foul') }}",
                    type: "POST",
                    data: {
                        value: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.foul, function (key, value) {
                            $("#foul_away").val(value.foul_away);
                        });
                    }
                });
            });
    });
    //foul away minus
    $(document).ready(function () {
            $('#foul_away_button_minus').click(function () {
                var value = $('#foul_away').val();
                value--;
                console.log(value);
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-away-foul') }}",
                    type: "POST",
                    data: {
                        value: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.foul, function (key, value) {
                            $("#foul_away").val(value.foul_away);
                        });
                    }
                });
            });
    });
    //foul away reset
    $(document).ready(function () {
            $('#reset_foul_away').click(function () {
                $.ajax({
                    url: "{{ url('/scoreboard-console/reset-away-foul') }}",
                    type: "POST",
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.foul, function (key, value) {
                            $("#foul_away").val(value.foul_away);
                        });
                    }
                });
            });
    });
</script>
@endsection