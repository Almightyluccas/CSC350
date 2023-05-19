<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.8, maximum-scale=1" /> 
    <title>Confetti Cuisine</title>
    <link rel="stylesheet" href="view/css/bootstrap.css" />
    <link rel="stylesheet" href="view/css/confetti_cuisine.css" />
    <style type="text/css">

#content { text-align: left;
  color: #00308F;
  width: 500px;
  padding: 0px;}

.form_settings
{ margin: 0px 0 0 0;}

body{
  background: url(p4.jpeg) no-repeat center/cover;
  height: 100%;
  width: 100%;
  margin-bottom:200px;
}

.form_settings p
{ padding: 0 0 0px 0;}


.form_settings span
{ float: left; 
  width: 200px; 
  text-align: left;}
  
.form_settings input, .form_settings textarea
{ padding: 5px; 
  width: 350px; 
  height: 40px;
  font: 100% arial; 
  border: 3px solid #E5E5DB; 
  background: #FFF; 
  color: #47433F;
  border-color: black;
  border-radius: 25px;
  }

  
.form_settings .submit
{ font: 100% arial; 
  border: 2px; 
  width: 99px; 
  //margin: 0 0 0 212px;
  margin: 1 1 1 1;  
  height: 33px;
  padding: 2px 0 3px 0;
  cursor: pointer; 
  background: black; 
  color: white;
  font-weight: bold;
  border-radius: 35px;
  font-size: 18px;}

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

form {
  text-align: center;
  padding-bottom: 100px;
}

#touch {
  text-align: center;
  font-size: 135px;
  color: gray;
  margin-bottom: -20px;
  font: arial;
}

#hold {
  text-align: center;
  font-size: 28px;
  color: white;
  font: arial;
  margin-left: 0px;
  margin-right: 0px;
  margin-top: 20px;
}

#title {
  color : white;
  font-size: 30px;
}

.button {
  background: black;
  font-size: 15px;
}




</style>
  </head>
  <body>
    <div id="nav" style="background:black ;color:white;">
      <div class="col-sm nav-align"><h1 id="title">Elite Sneakers</h1></div>
      <div class="col-sm nav-align">

        <?php include('menu.php'); ?>
      
      </div>
    </div>
<center>
    <p id="touch"><b>Unleash Your Sole Power</b></p>
    <p id="hold"><b> Discover the perfect blend of comfort and fashion with our premium sneaker selection. Unleash your individuality and make a statement with every step </b></p>
    <div id="content">
        <div style="text-align: left; padding: 0;">
            <div id="content">
                <h1 style="font: normal 179% 'century gothic', arial, sans-serif;color: white; margin: 0 0 0 0;padding: 170px 0 15px 120px; font: arial; font-size: 24px;" ><b>Sign In to Your Account</b></h1>
                <form action='index.php' method='get'>
                <input type='hidden' name='choice' value='logon' />
                <div class="form_settings">
                <p><input class="contact" type="text" name='username' placeholder="Enter Username.."/></p>
                <p><input class="contact" type="password" name='password' placeholder="Enter Password.." /></p>
                <p style="padding-top: 10px; padding-right: 200px; font-size: 16px;"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submit" />
                  <br><span>&nbsp;</span><a style="margin-left: 3px; color:black" href="index.php?choice=registration"><b>Register</b></a>
                </p>
                </div>
                <?php
	if(isset($_GET['messsage'])) echo "<div style='color:red;width:500px'>".$_GET['message']."</div>";
	if(isset($message)) echo "<div style='color:red;width:500px; font-size: 20px'>".$message."</div>";
	?>
                </form>
                </div>
      </div>
      
    </center>
  </body>
</html>
