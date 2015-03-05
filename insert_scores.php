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
        
        <form action="elo.php" method="post">
        Darter 1 = <select name="player1">
                <option value="---Select---" selected="selected">---Select---</option>
        <?php
        //Select the first player
        $first_player_list = get_players();
        foreach($first_player_list as $first_player)
        {
            foreach($first_player as $value){
                echo "<option value=\"" . $value . "\">" . $value . "</option>";
            }
        }
        ?>
            </select>
        Darter 2 = <select name="player2">
                 <option value="---Select---" selected="selected">---Select---</option>
        
        <?php
        //select the second player
        $second_player_list = get_players();
         foreach($second_player_list as $second_player)
        {
             foreach($second_player as $value){
                echo "<option value=\"" . $value . "\">" . $value . "</option>";
            }
        }
        ?>
            </select>
        <br>Player1 won or lost:
<br>
<br>Match
<Input type = 'Radio' Name ='match' value= '1'>1
<Input type = 'Radio' Name ='match' value= '2'>2
<br>

        <br>Game 1 
        <Input type = 'Radio' Name ='game1' value= 'won'>Won
        <Input type = 'Radio' Name ='game1' value= 'lost'>Lost
        
        <br>Game 2 
        <Input type = 'Radio' Name ='game2' value= 'won'>Won
        <Input type = 'Radio' Name ='game2' value= 'lost'>Lost
        
        <br>Game 3 
        <Input type = 'Radio' Name ='game3' value= 'won'>Won
        <Input type = 'Radio' Name ='game3' value= 'lost'>Lost
        
        <br>Game 4 
        <Input type = 'Radio' Name ='game4' value= 'won'>Won
        <Input type = 'Radio' Name ='game4' value= 'lost'>Lost
        
        <br>Game 5 
        <Input type = 'Radio' Name ='game5' value= 'won'>Won
        <Input type = 'Radio' Name ='game5' value= 'lost'>Lost
        
        <br>Game 6 
        <Input type = 'Radio' Name ='game6' value= 'won'>Won
        <Input type = 'Radio' Name ='game6' value= 'lost'>Lost
        
        <br>Game 7 
        <Input type = 'Radio' Name ='game7' value= 'won'>Won
        <Input type = 'Radio' Name ='game7' value= 'lost'>Lost
        
        <br>Game 8 
        <Input type = 'Radio' Name ='game8' value= 'won'>Won
        <Input type = 'Radio' Name ='game8' value= 'lost'>Lost
        
        <br>Game 9 
        <Input type = 'Radio' Name ='game9' value= 'won'>Won
        <Input type = 'Radio' Name ='game9' value= 'lost'>Lost
        
        <br>
        <input type="submit" name="games">
        </form>
        <br />
        <br />


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
 
