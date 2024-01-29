<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Login - E-Man</title>
  <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
  <style>
    body.snippet-body {
      font-size: 14px;
      background-color: #856404;
      background-image: url(./assets/bg_login.jpg) !important;
      background-image: url(../assets/bg_login.jpg) !important;
      background-size: cover !important;
      background-position: center !important;
    }

    a {
      text-decoration: none;
    }

    .card {
      margin: auto;
      box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      width: 450px;
    }

    .alert {
      padding: .5rem .5rem !important;
    }

    @media(max-width:768px) {
      .card {
        width: 90% !important;
      }


    }

    .upper {
      padding: 6vh 6vh 3vh 6vh;
    }

    .lower {
      padding: 3vh 0 3vh;
      text-align: center;
    }

    .heading {
      display: flex;
      align-items: center;
      vertical-align: middle;
    }

    .heading p {
      margin-bottom: 0;
    }

    input {
      border: 1px solid rgba(0, 0, 0, 0.137);
      padding: 0.75rem;
      outline: none;
      width: 100%;
      min-width: unset;
      background: rgba(151, 151, 151, 0.212) !important;
    }

    .row>* {
      padding-right: 0 !important;
      padding-left: 0 !important;

    }

    .form-element {
      margin: 3vh 0;
    }

    form .col-3,
    .col-9,
    .col-1,
    .col--11 {
      padding: 0;
      width: min-content;
    }

    form .col-11 {
      padding-left: 10px;
    }

    form .col-1 {
      display: flex;
      align-items: center;
      color: red;
      font-size: 3vh;
      justify-content: center;
    }

    #code {
      text-align: center;
    }

    form .row {
      margin: 0;
    }

    hr {
      margin: 0;
      border-top: 2px solid rgba(0, 0, 0, .1);
    }

    #input-header {
      color: grey;
    }

    .invalid {
      color: grey;
      line-height: 1.2;
    }

    .btn {
      width: 50%;

      color: white;
      padding: 1.5vh 0;
    }

    .btn:focus {
      box-shadow: none;
      outline: none;
      box-shadow: none;
      color: white;
      -webkit-box-shadow: none;
      -webkit-user-select: none;
      transition: none;
    }

    .btn:hover {
      color: white;
    }

    input {
      border: none;
    }

    input[type="submit"] {
      color: #fff;
      background-color: #007bff !important;
      border-color: #007bff !important;
      font-size: 17px !important;
      text-transform: uppercase;
      border-radius: 5px !important;
    }

    p>a {
      display: flex;
      justify-content: center;
    }
  </style>
</head>

<body class='snippet-body'>
  <div class="Container ">
    <div class="card mt-5" style="background-color: #fff !important; border:solid 0px !important;">
      <div class="upper">
        <div class="row">
          <h1 class="text-center"><?php echo lang('login_heading'); ?></h1><br>
          <div class="alert-warning" id="infoMessage"><?php echo $message; ?></div>
        </div>

        <?php echo form_open("auth/login"); ?>
        <p>
          <?php echo lang('login_identity_label', 'identity'); ?>
          <?php echo form_input($identity); ?>
        </p>

        <p>
          <?php echo lang('login_password_label', 'password'); ?>
          <?php echo form_input($password); ?>
        </p>

        <p class="mt-5"> <?php echo form_submit('submit', lang('login_submit_btn')); ?></p>

        <?php echo form_close(); ?>

        <p><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></p>

      </div>


    </div>

  </div>
  <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>