<?PHP
        $cfgProgDir = 'phpSecurePages/';
        include($cfgProgDir . "secure.php");
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Brandon Singles Steel Dart League</title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55435522-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body>
    <div id="page">

        <div id="header">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/leaguerankings.php">League Rankings</a></li>
<!--                    <li><a href="#">Products</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
-->                <li><a href="/contactform.html">Contact</a></li>
		 <li><a href="/secure_login.php">Login</a></li>
            </ul>
            <h1>Brandon Singles Steel Dart League</h1>
        </div>
  <div class="dotted_line"></div>
        <div id="main">

                <div class="main_left">
                <img src="sample_image.jpg" alt="" />
                <h1>Developing your Dart Game</h1>
                <h3>while having fun.</h3>
            </div>

                <div class="main_right">

        <?php
        include_once 'modules.php';
        ?>
 
 <div id="form_container">
	
		<h2><a>New Player</a></h2>
		<form id="new_player" method="post" action="insert_newplayer.php">
								
		<ul >
			<li id="li_name_first" >
					<label>First</label>
					<input id="element_first_name" name= "element_first_name" class="element text" maxlength="255" size="25" value=""/>	
			</li>	
			<br />
			<li id="li_name_last" >
					<label>Last</label>
					<input id="element_last_name" name= "element_last_name" class="element text" maxlength="255" size="25" value=""/>
			</li>
			<br />
			    <input type="hidden" name="form_id" value="fullname" />
			    <input id="saveForm" class="button_text" type="submit" name="player_new" value="Submit" />
		</ul>
		</form>	
		
</div>
 
 
       

       </div>

                <div class="main_bottom"></div>

        </div>


        <div class="dotted_line"></div>
        <div id="footer">
        <p>
      </div>

        </div>
</body>
</html>
 
