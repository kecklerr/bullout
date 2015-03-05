<?php
        $cfgProgDir = 'phpSecurePages/';
        include($cfgProgDir . "secure.php");
?>
<html>
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
	//	echo $_POST["player_new"];
		//echo $_POST["element_first_name"];
	//	echo $_POST["element_last_name"];
        
       if($_POST["player_new"] == NUll){
       // if(isset($_POST['games'])){
          header( 'Location: /new_player.php' ) ;
        //   echo "games - " . $_POST["games"] . "<br />";
        }else{
            $new_player = trim($_POST["player_new"]);
        }
        
        
        if(is_string($_POST["element_first_name"]) ){
            if($_POST["element_last_name"] == NULL){
                header( 'Location: /new_player.php' );
            }
            $first_name = trim($_POST["element_first_name"]);
        }
        if(is_string($_POST["element_last_name"]) ){
            if($_POST["element_first_name"] == NULL){
                header( 'Location: /new_player.php' );
            }
            $last_name = trim($_POST["element_last_name"]);
        }
        $player_name = $first_name . " " . $last_name;
		// insert into tables
		insert_new_player($player_name);
        
?>		
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
