<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <!-- icon -->
  <link href="./fontawesome-free-5.15.4-web/icon/all.css" rel="stylesheet">

  <title>Face Recognition Scanner</title>
  <link rel="stylesheet" type="text/css" href="style.css">

  <script src="./face-api.min.js"></script>
  <script defer async src="./script.js"></script>
  <script type="text/javascript">
    function updateClock() {
      var now = new Date();
      var mo = now.getMonth(),
          dnum = now.getDate(),
          yr = now.getFullYear(),
          hou = now.getHours(),
          min = now.getMinutes(),
          sec = now.getSeconds(),
          pe = "AM";

          if (hou == 0) {
            hou = 12;
          }
          if (hou > 12) {
            hou = hou - 12;
            pe = "PM";
          }

          Number.prototype.pad = function(digits) {
            for (var n = this.toString(); n.length < digits; n = 0 + n);
              return n;
          }

          var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
          var ids = ["month", "dayNum", "year", "hour", "minutes", "seconds", "period"];
          var values = [months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];

          for (var i = 0; i < ids.length; i++)
            document.getElementById(ids[i]).firstChild.nodeValue = values[i];
    }

    function intiClock() {
      updateClock();
      window.setInterval("updateClock()", 1);
    }
  </script>

  <style>
    body {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh;
      display: flex;
      align-items: center;
      flex-direction: column;
      justify-content: center;
      background-color: #F6B100;
    }

    canvas {
      position: absolute;
      text-align: center;
    }

    img {
      width: 70%;
      height: 70%;
    }

    #mainRow {
      width: 100vw;
      height: 100vh;
      align-items: center;
    }

    .row {
      text-align: center;
    }

    .cameraBackgroud {
      background-color: #000000;
      display: block;
      margin-left: auto;
      margin-right: auto;
      height: 80%;
      width: 90%;
      padding: 70px 0;
      text-align: center;
    }
  </style>
</head>
<body onload="intiClock()">
  <div class="container-fluid">
    <div class="row" id="mainRow">
      <div class="col-2 align-self-start">
        <img src="./logo/1.png" alt="DoerHRM Logo" />

        <div class="row">
          <div class="mt-5 col align-self-start">
            <label id="companyNameLabel">INTI College Subang</label>
          </div>
        </div>

        <div class="row">
          <div class="mt-1 col align-self-start">
            <label id="companyCodeLabel">A123456</label>
          </div>
        </div>

        <div class="row align-items-start" style="margin-top: 250px;">
          <div class="col align-self-start">
            <div class="dateTime">
              <div class="time">
                <span id="hour">00</span>:
                <span id="minutes">00</span>:
                <span id="seconds">00</span>
                <span id="period">AM</span>
              </div>
              <div class="date">
                <span id="dayNum">00</span>
                <span id="month">Month</span>
                <span id="year">Year</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-8">
        <div class="cameraBackgroud">
          <div class="embed-responsive embed-responsive-16by9">
            <video id="video" class="embed-responsive-item" width="720px" height="550px" muted controls></video>
          </div>
        </div>
      </div>

      <div class="col-2">
       <div class="row">
          <div class="col align-self-start" style="text-align: left;">
            <label id="status" style="margin-bottom: 550px; color: red; font-weight: bold;">Offline</label>
          </div>
        </div>

        <div class="row">
          <div class="col align-self-start" style="text-align: right;">
            <a href="login.php"><i class="fas fa-cog fa-lg" style="margin-top: 150px;"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>