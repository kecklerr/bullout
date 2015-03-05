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
        
       if($_POST["games"] == NUll){
       // if(isset($_POST['games'])){
          header( 'Location: /' ) ;
        //   echo "games - " . $_POST["games"] . "<br />";
        }else{
            $game = trim($_POST["games"]);
        }
        
        
        if(is_string($_POST["player1"]) ){
            if($_POST["player2"] == NULL){
                header( 'Location: /' );
            }
            $player1_name = trim($_POST["player1"]);
        }
        if(is_string($_POST["player2"]) ){
            if($_POST["player1"] == NULL){
                header( 'Location: /' );
            }
            $player2_name = trim($_POST["player2"]);
        }
        
        if(is_string($_POST["player1_name"]) ){
            $player1_name = trim($_POST["player1_name"]);
        }
        if(is_string($_POST["player2_name"]) ){
            $player2_name = trim($_POST["player2_name"]);
        }
       
        
        if (isset($_POST['games'])) {

            $selected_radio = $_POST['game1'];	
            $match_radio = $_POST['match'];

            if ($selected_radio == 'won') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            else if ($selected_radio == 'lost') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            $selected_radio = $_POST['game2'];

            if ($selected_radio == 'won') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            else if ($selected_radio == 'lost') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            $selected_radio = $_POST['game3'];

            if ($selected_radio == 'won') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            else if ($selected_radio == 'lost') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            $selected_radio = $_POST['game4'];

            if ($selected_radio == 'won') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            else if ($selected_radio == 'lost') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            $selected_radio = $_POST['game5'];

            if ($selected_radio == 'won') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            else if ($selected_radio == 'lost') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            $selected_radio = $_POST['game6'];

            if ($selected_radio == 'won') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            else if ($selected_radio == 'lost') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            $selected_radio = $_POST['game7'];

            if ($selected_radio == 'won') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            else if ($selected_radio == 'lost') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            $selected_radio = $_POST['game8'];

            if ($selected_radio == 'won') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            else if ($selected_radio == 'lost') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            $selected_radio = $_POST['game9'];

            if ($selected_radio == 'won') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            else if ($selected_radio == 'lost') {

                echo $player1_name . " " . $player2_name . " " . $selected_radio . "<br>";
                update_rating($player1_name, $player2_name, $selected_radio, $match_radio);

            }
            

        }
        
        
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
