<?php
echo "<a href='index.php?choice=home'> <span class='button'>Home</span>" ;
echo "<a href='index.php?choice=products'> <span class='button'>Products</span></a>";
echo "<a href='index.php?choice=contact'> <span class='button'>Contact</span></a>";
echo "<a href='index.php?choice=about'> <span class='button'>About</span></a>";
echo "<a href='index.php?choice=cart'> <span class='button'>Cart</span> </a>" ;
if(isset( $_SESSION['ON']))
    echo "<a href='index.php?choice=logoff'> <span class='button'>Logoff</span></a>";
else
    echo "<a href='index.php'> <span class='button'>Login</span></a>";

?>
