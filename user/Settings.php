<?php 
      include('../check_session.php');
      include('../DB_config.php');

?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings</title>
    <link href="../style/min.css" rel="stylesheet">
    
<meta name="theme-color" content="#712cf9">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .container {
        max-width: 960px;
      }
    </style>
    <body>
        <div class="py-5 text-center">
          <img class="d-block mx-auto mb-4" src="../image/logo.png" alt="" width="150" height="150">
          <h2>Account Settings</h2>
          <p class="lead">This page is for Settings.</p>
        </div>
        <div class="row g-5" style="margin-left:25%">
        <div class="col-md-7 col-lg-8">
        <form class="needs-validation" action="register.php" method="post">
          <div class="row g-3">
            

            <div class="col-12">
              <label for="Password" class="form-label">Password</label><br>
              <label for="Password" class="form-label" style="font-size:12px;">Password must be at least 8 digits.
                Must contain at least one special character.</label>
              <input type="text" class="form-control" id="Password" placeholder="********" required="">
              <div class="invalid-feedback">
                Password must be at least 8 digits.
                Must contain at least one special character.
              </div>
            </div>

            <div class="col-12">
              <label for="Password" class="form-label">Confirm password</label><br>
              <label for="Password" class="form-label" style="font-size:12px;">Password must be at least 8 digits.
                Must contain at least one special character.</label>
              <input type="text" class="form-control" id="Confirm_Password" placeholder="********" required="">
              <div class="invalid-feedback">
                Password must be at least 8 digits.
                Must contain at least one special character.
              </div>
            </div>

            <div class="col-12">
              <label for="Nickname" class="form-label">Nick name</label>
              <div class="input-group has-validation">
              <input type="Nickname" class="form-control" id="floatingInput" value size="20" required="">
              <div class="invalid-feedback">
                  Your Nickname is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address" placeholder="">
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Settings</button>
        </form>
        </div>
      </div>
    </body>
</html>
    