<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=0.8, maximum-scale=1" />

  <link rel="stylesheet" href="view/css/confetti_cuisine.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <title>Document</title>
  <style type="text/css">
    #content
    { text-align: left;
      width: 613px;
      padding: 0;}
    .form_settings
    { margin: 15px 0 0 0;}

    .form_settings p
    { padding: 0 0 0px 0;}

    .form_settings span
    { float: left;
      width: 200px;
      text-align: left;}

    .form_settings input, .form_settings textarea
    { padding: 5px;
      width: 299px;
      font: 100% arial;
      border: 1px solid #E5E5DB;
      background: #FFF;
      color: #47433F;}

    .form_settings .submit
    { font: 100% arial;
      border: 2px;
      width: 99px;
    //margin: 0 0 0 212px;

      height: 33px;
      padding: 2px 0 3px 0;
      cursor: pointer;
      background: #3B3B3B;
      color: #FFF;}

    .form_settings textarea, .form_settings select
    { font: 100% arial;
      width: 299px;}

    .form_settings select
    { width: 310px;}

    .form_settings .checkbox
    { margin: 4px 0;
      padding: 0;
      width: 14px;
      border: 0;
      background: none;}
    .container
    {
      text-align:center;
    }
  </style>
  <style>
    #title {
      color: white;
      font-size: 30px;
    }

    .button {
      background: black;
      font-size: 15px;
    }

  </style>

</head>
<body >

<div id="nav" style="background:black ;color:white;">
  <div class="col-sm nav-align"><h1 id="title">Elite Sneakers</h1></div>
  <div class="col-sm nav-align">

    <?php include('menu.php'); ?>

  </div>
</div>

<div class="container">
  <div class="row justify-content-center"
  <div class="col-sm-6">
    <div style="text-align: left; padding: 0;">
      <div id="content">
        <h1 style="text-align:center ;font: normal 179% 'century gothic', arial, sans-serif;color: #43423F;" >REGISTRATION</h1>
        <br>
        <form action='index.php' method='get'>
          <input type='hidden' name='choice' value='register' />
          <div class="form_settings">
            <p><span>Enter Username:</span><input class="contact" type="text" name='username'  /></p>
            <p><span>Enter Password:</span><input class="contact" type="password" name='password'  /></p>
            <p><span>Confirm Password:</span><input class="contact" type="password" name='password2'  /></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submit" /></p>
          </div>
        </form>
        <?php
        if(isset($_GET['messsage'])) echo "<div style='color:red;width:330px'>".$_GET['message']."</div>";
        if(isset($message)) echo "<div style='color:red;width:330px'>".$message."</div>";
        ?>
      </div>
    </div>
  </div>
</div>
</div>


</body>
</html>