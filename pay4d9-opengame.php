<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <link rel="stylesheet" type="text/css" href="https://common-static.ppgames.net/gs2c/common/css/unlogged.css" />
</head>

<body class="pageContent">
  <style>
    body.pageContent {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
  </style>
  
  <div id="loading" style="display: none;">
    <img src="assets/loader.gif" width="100px" alt="Loading...">
  </div>
  <div id="content" style="display: none;">
    <div class="centerContent">
      <div class="textContent">
        Silahkan melakukan Deposit / TopUp terlebih dahulu untuk melanjutkan game.
      </div>
    </div>
  </div>

  <script>
    document.getElementById("loading").style.display = "block";
    setTimeout(function() {
      document.getElementById("loading").style.display = "none";
      document.getElementById("content").style.display = "block";
    }, 3000);
  </script>
</body>
