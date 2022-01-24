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
                    <!-- <h6 class="d-inline-block"></h6> -->
                    <button type="button" onclick="playAudio1()" class="btn btn-success"><i class="fas fa-music"></i>Music 1</button>    
                </div>
                <div class="col-2">
                    <!-- <h6 class="d-inline-block"></h6> -->
                    <button type="button" onclick="playAudio2()" class="btn btn-success"><i class="fas fa-music"></i>Music 2</button>    
                </div>
                <div class="col-2">
                    <!-- <h6 class="d-inline-block"></h6> -->
                    <button type="button" onclick="playAudio3()" class="btn btn-success"><i class="fas fa-music"></i>Music 3</button>    
                </div>
                <div class="col-2">
                    <!-- <h6 class="d-inline-block"></h6> -->
                    <button type="button" onclick="playAudio4()" class="btn btn-success"><i class="fas fa-music"></i>Music 4</button>    
                </div>
            </div>
        </div>
    </div>
</div>
<audio id="myAudio1">
  <!-- <source src="horse.ogg" type="audio/ogg"> -->
  <source src="http://codeskulptor-demos.commondatastorage.googleapis.com/GalaxyInvaders/theme_01.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<audio id="myAudio2">
  <!-- <source src="horse.ogg" type="audio/ogg"> -->
  <source src="{{ url('/storage/public_asset_lagu_sound2.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<audio id="myAudio3">
  <!-- <source src="horse.ogg" type="audio/ogg"> -->
  <source src="{{ url('/storage/public_asset_lagu_sound3.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<audio id="myAudio4">
  <!-- <source src="horse.ogg" type="audio/ogg"> -->
  <source src="{{ url('/storage/public_asset_lagu_sound4.mp3') }}" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
@endsection

@section('script')
<!-- script internal place -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>   
<script>
    //audio1
    var myAudio = document.getElementById("myAudio1");
    var isPlaying = false;
    function playAudio1() {
    isPlaying ? myAudio.pause() : myAudio.play();
    };
    myAudio.onplaying = function() {
    isPlaying = true;
    };
    myAudio.onpause = function() {
    isPlaying = false;
    };
    //audio2
    var myAudio2 = document.getElementById("myAudio2");
    var isPlaying2 = false;
    function playAudio2() {
    isPlaying2 ? myAudio2.pause() : myAudio2.play();
    };
    myAudio2.onplaying = function() {
    isPlaying2 = true;
    };
    myAudio2.onpause = function() {
    isPlaying2 = false;
    };
    //audio3
    var myAudio3 = document.getElementById("myAudio3");
    var isPlaying3 = false;
    function playAudio3() {
    isPlaying3 ? myAudio3.pause() : myAudio3.play();
    };
    myAudio3.onplaying = function() {
    isPlaying3 = true;
    };
    myAudio3.onpause = function() {
    isPlaying3 = false;
    };
    //audio4
    var myAudio4 = document.getElementById("myAudio4");
    var isPlaying4 = false;
    function playAudio4() {
    isPlaying4 ? myAudio4.pause() : myAudio4.play();
    };
    myAudio4.onplaying = function() {
    isPlaying4 = true;
    };
    myAudio4.onpause = function() {
    isPlaying4 = false;
    };

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
    //period
    $(document).ready(function () {
            $('#period_plus').click(function () {
                var myAudio = document.getElementById("myAudio2");
                var value = $('#period').val();
                value++;
                myAudio.play();
                console.log(value);
                $.ajax({
                    url: "{{ url('/scoreboard-console/update-period') }}",
                    type: "POST",
                    data: {
                        name: value,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.period, function (key, value) {
                            $("#period").val(value.period);
                        });
                    }
                });
            });
    });
    $(document).ready(function () {
            $('#reset_period').click(function () {
                $.ajax({
                    url: "{{ url('/scoreboard-console/reset-period') }}",
                    type: "POST",
                    data: {
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log("result")
                        $.each(result.period, function (key, value) {
                            $("#period").val(value.period);
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