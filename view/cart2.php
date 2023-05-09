<?php
include_once('checker.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.8, maximum-scale=1" />
    <title>Confetti Cuisine</title>
    <link rel="stylesheet" href="view/css/bootstrap.css" />
    <link rel="stylesheet" href="view/css/confetti_cuisine.css" />
    <style type="text/css">
		#content
{ text-align: left;
  width: 500px;
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
  margin: 1 1 1 1;
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
</style>
  </head>
  <body>
    <div id="nav" style="background:black;color:white;">
      <div class="col-sm nav-align"><h1 id="title">BMCC ELECTRONICS</h1></div>
      <div class="col-sm nav-align">

      <?php include('menu.php'); ?>

      </div>
    </div>
<center>
    <div id="content">
        <div style="text-align: left; padding: 0;">
                <h1 style="font: normal 179% 'century gothic', arial, sans-serif;color: #43423F;margin: 0 0 15px 0;padding: 15px 0 5px 0;" >Logoff</h1>
                <div class="form_settings">
                  <center>
                    <?php
                      if(isset($output)) echo "$output";
                      ?>
                    </center>
              </div>
      </div>
    </center>
  </body>
</html>
