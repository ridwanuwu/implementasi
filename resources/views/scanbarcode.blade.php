@extends('Template.master')

@section('title','Scan Barcode')

@section('content')


<main class="wrapper" style="padding-top:2em">

    <section class="container" id="demo-content">
      <h1 class="title">Silahkan Scan Barcode Anda</h1>

      

      <div>
        <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
      </div>

      <div id="sourceSelectPanel" style="display:none">
        <label for="sourceSelect">Change video source:</label>
        <select id="sourceSelect" style="max-width:400px">
        </select>
      </div>
      <div class="form-group">
        <button type="button" class="button btn btn-primary" id="startButton">Start</button>
        <button type="button" class="button btn btn-secondary" id="resetButton">Reset</button>
      </div>

      <!-- <div class="form-group">
          <label>Result:</label>
          <input type="text" class="form-control barcode" id="result" placeholder="Hasil Barcode" name="barcode"> 
          <pre><code id="result"></code></pre></input>
      </div> -->

      <label>Result:</label>
      <pre><code id="result"></code></pre>


    </section>
</main>

  <script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.3-dev.7656630/umd/index.js"></script>
  <script type="text/javascript">
    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById('result').textContent = result.text
              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err
              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })
  </script>

@endsection