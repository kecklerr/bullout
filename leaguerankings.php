<?PHP
	$logout = true;
        $cfgProgDir = 'phpSecurePages/';
        include($cfgProgDir . "secure.php");
?>


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
		<li><a href="/leaguerankings.php">Rankings</a></li>
<!--                    <li><a href="#">Products</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
-->     <li><a href="/league_schedule.html">Schedule</a></li>
           <li><a href="/contactform.html">Contact</a></li>
               <li><a href="/about.html">About</a></li>
            </ul>
            <h1>Brandon Singles Steel Dart League</h1>
        </div>
  <div class="dotted_line"></div>
        <div id="main">

                <div class="main_left">
                <img src="sample_image.jpg" alt="" />
                <h1>Developing your Dart Game</h1>
                <h3>while having fun.</h3>
<br>
<!-- star the chance of winning section -->
<p>Who would win?</p><br>
 <?php
        include 'modules.php';
        ?>
        <form action="leaguerankings.php" method="post">
        Darter 1 = <select name="player1_name">
                <option value="---Select---" selected="selected">---Select---</option>
        <?php
        //Select the first player
        $first_player_list = get_all_players();
        foreach($first_player_list as $first_player)
        {
            foreach($first_player as $value){
                echo "<option value=\"" . $value . "\">" . $value . "</option>";
            }
        }
        ?>
            </select>
<br><br>
        Darter 2 = <select name="player2_name">
                 <option value="---Select---" selected="selected">---Select---</option>
        
        <?php
        //select the second player
        $second_player_list = get_all_players();
         foreach($second_player_list as $second_player)
        {
             foreach($second_player as $value){
                echo "<option value=\"" . $value . "\">" . $value . "</option>";
            }
        }
        ?>
    </select>

<br><br>
        <input type="submit" value="Get prediction">
        </form>
        
                
        <?php        
        if(is_string($_POST["player1_name"]) ){
            $player1_name = trim($_POST["player1_name"]);
        }
        if(is_string($_POST["player2_name"]) ){
            $player2_name = trim($_POST["player2_name"]);
        }
                
        $player1_rating = get_rating($player1_name);
        $player2_rating = get_rating($player2_name);

        //formula explained - http://forums.steampowered.com/forums/showthread.php?t=1220287
        $p2_chance_of_winning = abs((1 / ( 1 + pow(10, ( ($player1_rating - $player2_rating) / 400) ) )) * 100); //percentage
        $p2_chance_of_losing = abs(100 - $p2_chance_of_winning); //percentage
        $p1_chance_of_winning = abs((1 / ( 1 + pow(10, ( ($player2_rating - $player1_rating) / 400) ) )) * 100); //percentage
        $p1_chance_of_losing = abs(100 - $p1_chance_of_winning); //percentage
	echo "<br>";
	
if(is_string($player1_name)) {
	echo "<p>If a game was played " . $player1_name . " would have a chance of " . round($p1_chance_of_winning,2) . "% of winning against " . $player2_name . ".</p>";
	}
        //echo $player1_name . " has a " . round($p1_chance_of_winning,2) . "% of winning.<br />";
        //echo $player2_name . " has a " . round($p2_chance_of_winning,2) . "% of winning.<br />";
        
        ?>

<!-- end the chance of winning section -->














<ul>
<li> Links: </li>
</ul>
<ul>
<li> <a href="format.pdf" target="_blank">Game Format Sheet</a> </li>
</ul>

            </div>

                <div class="main_right">

  <h2>League Rankings</h2>

                <p>Rankings are based on the ELO rating system. The Elo rating system is a method for calculating the relative skill levels of players in competitor-versus-competitor games. The bigger the ranking the better the player. </p>
<br><br>
<div class="CSSTableGenerator" >
 <?php
        include 'modules.php';
        ?>
        <table>
	<tr>
	<td>Player</td><td>Ranking</td>
	</tr>
        <?php
        //Select the first player
        $player_list = get_player_stats();
        //print_r($player_list);
        arsort($player_list);
        foreach($player_list as $player=>$value)
        {
            echo "<tr border=1>";

               echo "<td>" . $player . "</td><td>" . $value . "</td>";

            echo "</tr>";
        }
        ?>
        </table>

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

