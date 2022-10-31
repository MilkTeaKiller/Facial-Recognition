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

  <style>
    body {
      width: 100%;
      height: 100%;
      font-family: Roboto;
      background-color: #F6B100;
    }

    img {
      width: 70%;
      height: 70%;
    }

    #labelID {
      color: #FFFFFF;
      font-size: 22px;
      font-weight: bold;
    }

    #labelVersion {
      color: #FFFFFF;
      font-size: 16px;
      font-weight: bold;
    }

    #inputText {
      width: 100%;
      height: 40px;
      border: none;
      color: #ffffff;
      font-size: 20px;
      text-align: center;
      background-color: transparent;
      border-bottom: 2px solid #083C7A;
    }

    #inputText:focus {
      border: 3px solid #555;
    }

    .fa-key {
      color: #ffffff;
    }

    .row {
      border: 1px solid #000000;
      width: 100vw;
      height: 100vh;
    }

    .fontpassword {
      position: relative;
    }
          
    .fontpassword i {
      top: 13px;
      left: 10px;
      position: absolute;
    }

    input[type=button] {
      width: 100%;
      color: #ffffff;
      border-radius: 15px;
      background-color: #083C7A;
    }
  </style>

  <script type="text/javascript">
    function checkTokenId() {
        let tokenID = document.getElementById("inputText").value;

        if (tokenID == "" || tokenID == null) {
          alert("Please fill up the tokenID");
          return false;
        } else if (tokenID == "A123456") {
          window.location.href="index.php";
          return false;
        } else {
          alert("The tokenID doesn't exist");
          document.getElementById("inputText").value = "";
          return false;
        }
    }
  </script>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col align-self-start">
        <img src="./logo/1.png" alt="DoerHRM Logo" />
      </div>

      <div class="d-block col align-self-center">
        <form method="post">
          <label id="labelID">Key in your Token id</label>
          <div class="fontpassword">
            <i class="fas fa-key fa-lg"></i>
            <input id="inputText" type="text" placeholder="Token id" autocomplete="off" />
          </div>
          <br />
          <input type="button" value="Go !" onclick="checkTokenId()">
        </form>
      </div>

      <div class="col align-self-end" style="text-align: right;">
        <label id="labelVersion">Version 1.0.0</label>
      </div>
    </div>
  </div>
</body>
</html>