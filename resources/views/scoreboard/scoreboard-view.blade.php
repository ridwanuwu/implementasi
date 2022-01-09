@extends('Template.master')

@section('title','Scoreboard')



@section('css')
<!-- css internal place -->
<style>
input {
  text-align: center;
  width:120px;
  height:80px;
}

input[type="number"]
{
    font-size:24px;
    font-weight:bold;
}
.spasi{
    font-size:50px;
    font-weight:bold;
    margin-top:50px;
}
h1{
    color: #396;
    font-weight: 100;
    font-size: 40px;
    margin: 40px 0px 20px;
}
h2{
    color: #5cbfa0;
}
.timer{
  background-color:rgb(49, 172, 59);
  width:20%;
  height: 80px;
  margin-left: 400px;
  margin-right:90px;
  margin-top: 20px;
  top:50%; 
  text-align:center;
  /* border:4px solid red; */
}
.twodigit{
  background-color:#000;
  width:6%;
  height: 60px;
  margin-left: 415px;
  margin-right:90px;
  margin-top:-70px;
  top:50%; 
  border-radius:10px;
 
  text-align:center;
}
.nexttwodigit{
  background-color:#000;
  width:6%;
  height: 60px;
  margin-left: 525px;
  margin-right:90px;
  margin-top:-60px;
  top:50%;
  border-radius:10px;
  text-align:center;
}
</style>
@endsection
@section('data',$data='')
@section('dropdown-open','menu-open')
@section('dropdown-master','active')
@section('dropdown-view','active')
@section('content')
<!-- Content Body place -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<h1 class="text-center font-weight-bold text-capitalize">ScoreBoard</h1>
<div class="container text-center">
<div class="timer"></div>
  <div class="twodigit" style="color:red; font-size:50px;" id="timer_menit">09</div>
  <div class="nexttwodigit" style="color:red; font-size:50px;" id="timer_detik">59</div>
</div>
<div class="row text-center">
    <div class="col-lg-5">
        <div class="home py-3" id="name_home"></div>
        <input class="score" type="number" id="home" width="20" disabled/>
    </div>
    <div class="col-lg-2 spasi">:</div>
    <div class="col-lg-5">
        <div class="home py-3 " id="name_away"></div>
        <input class="score" type="number" id="away" width="20" disabled/>
    </div>
</div>
<div class="row text-center">
    <div class="col-lg-5">
        <div class="home py-3">Foul</div>
        <input class="score" type="number" id="foul_home" width="20" disabled/>
    </div>
    <div class="col-lg-2 spasi"></div>
    <div class="col-lg-5">
        <div class="home py-3">Foul</div>
        <input class="score" type="number" id="foul_away" width="20" disabled/>
    </div>
</div>
<div class="test" id="timer" style="color:white;"></div>
@endsection

@section('script')
<!-- script internal place -->
<script>
var stop;
var menit;
var detik;
//sse
    if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("/scoreboard-sse");
        source.onmessage = function(event) {
        console.log(event.data);
        $val = JSON.parse(event.data);
        console.log($val.status);
        document.getElementById("home").value= $val.home;
        document.getElementById("name_home").innerHTML= 'Tim '+ $val.name_home;
        document.getElementById("foul_home").value= $val.foul_home;
        document.getElementById("foul_away").value= $val.foul_away;
        document.getElementById("away").value= $val.away;
        document.getElementById("name_away").innerHTML= 'Tim '+ $val.name_away;
        document.getElementById('timer_menit').innerHTML = $val.menit;
        document.getElementById('timer_detik').innerHTML = $val.detik;
        document.getElementById('timer').innerHTML = $val.menit + ":" + $val.detik;
            //time
            if($val.status==1){
                startTimer();


                function startTimer() {
                // console.log('masuk startimer');
                        var presentTime = document.getElementById('timer').innerHTML;
                        var timeArray = presentTime.split(/[:]+/);
                        var m = timeArray[0];
                        var s = checkSecond((timeArray[1] - 1));
                        if(s==59){m=m-1}
                        if(m<0){
                            if(data_json[0].menit==0 && data_json[0].detik==00){
                                var audio4 = document.getElementById("audio4");
                                audio4.play();
                                console.log('timer completed');
                            }
                            // console.log(stop);
                        }
                        else{
                            // document.getElementById('timer').innerHTML =
                            // m + ":" + s;
                            menit = m;
                            detik = s;
                            insert_menit_detik();
                            console.log(m);
                            console.log(s);
                            setTimeout(startTimer, 1000*1000);
                        }
                    }

                    function checkSecond(sec) {
                            if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
                            if (sec < 0) {sec = "59"};
                            return sec;
                    }
            }
        }
        
    } else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
    }

function insert_menit_detik(){
              // console.log(menit);
              // console.log(detik);
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
        var url = "{{ url('/update-menit-detik') }}";

        $.ajax({
           url:url,
           method:'POST',
           data:{
              name_menit:menit, 
              name_detik:detik, 
           },
           success:function(response){
              if(response.success){
                  // console.log(response.message);
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
        });
}
</script>
@endsection