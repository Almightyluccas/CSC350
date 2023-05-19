<?php
if(isset( $_SESSION['ON']))
    echo "<a href='index.php?choice=logoff'> <span class='button'>LOGOFF</span></a>";
else
    echo "<a href='index.php'> <span class='button'>LOGIN</span></a>";
    echo "<a href='index.php?choice=products'> <span class='button'>PRODUCTS</span></a>";
    echo "<a href='index.php?choice=contact'> <span class='button'>CONTACT</span></a>";
    echo "<a href='index.php?choice=about'><span class='button'>ABOUT</span></a>";
?>
