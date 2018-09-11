<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

  <title>Quirk Responsive Admin Templates</title>

  <?= $this->Html->css('/lib/jquery-ui/jquery-ui.css'); ?>
  <?= $this->Html->css('/lib/select2/select2.css'); ?>
  <?= $this->Html->css('/lib/summernote/summernote.css'); ?>
  <?= $this->Html->css('/lib/dropzone/dropzone.css'); ?>
  <?= $this->Html->css('/lib/jquery-toggles/toggles-full.css'); ?>
  <?= $this->Html->css('/lib/fontawesome/css/font-awesome.css'); ?>
  <?= $this->Html->css('/lib/timepicker/jquery.timepicker.css'); ?>
  <?= $this->Html->css('/lib/bootstrapcolorpicker/css/bootstrap-colorpicker.css'); ?>
  <?= $this->Html->css('quirk.css'); ?>

  <?= $this->Html->script('/lib/modernizr/modernizr.js'); ?>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../lib/html5shiv/html5shiv.js"></script>
  <script src="../lib/respond/respond.src.js"></script>
  <![endif]-->
</head>

<body class="signwrapper">

  <div class="sign-overlay"></div>
  <div class="signpanel"></div>

  <div class="panel signin">
    <div class="panel-heading">
      <h1>TOMATO T&P</h1>
    </div>
    <div class="panel-body">
      <form method="POST">
        <div class="form-group mb10">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
          </div>
        </div>
        <div class="form-group nomargin">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
          </div>
        </div>
        <div><p class="forgot"></p></div>
        <div class="form-group">
          <button class="btn btn-success btn-quirk btn-block">Sign In</button>
        </div>
      </form>
    </div>
  </div><!-- panel -->

</body>
</html>
