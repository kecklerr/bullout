<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Brandon Singles Steel Dart League</title>
<?php include_once("analyticstracking.php") ?>
</head>

<body>
    <div id="page">
		
        <div id="header">
            <ul>
       	   	<li><a href="/">Home</a></li>
       	   	<li><a href="/leaguerankings.php">Rankings</a></li>
<!--              	<li><a href="#">Products</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About</a></li>
-->             
                <li><a href="/league_schedule.html">Schedule</a></li>
	   <li><a href="/contactform.html">Contact</a></li>
               <li><a href="/about.html">About</a></li>
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

<br>
<?php
include 'modules.php';
?>

<?php
echo "<div class='CSSTableGenerator' >
<TABLE>
<TR>
<TD>2015 Winter</TD>
<TD COLSPAN=2>Matches</TD>
<TD COLSPAN=2>Legs</TD>
</TR>
<TR>
<TD>&nbsp;</TD>
<TD>Won</TD>
<TD>Lost</TD>
<TD>Won</TD>
<TD>Lost</TD>
</TR> ";
$my_player_scores = get_current_payers_stats();
foreach($my_player_scores as $value){

echo "<tr><td>" . $value[name] . "</td>";
echo "<td>" . $value[wins] . "</td>";
echo "<td>" . $value[losses] . "</td>";
echo "<td>" . $value[leg_wins] . "</td>";
echo "<td>" . $value[leg_losses] . "</td>";

#echo "<tr><td></td>";

echo "</tr>";
}

echo "</table>";
echo "</div>";

?>
<br><br>



<ul>
<li> Links: </li>
</ul>
<ul>
<li> <a href="format.pdf" target="_blank">Game Format Sheet</a> </li>
</ul>
            </div>
            
           	<div class="main_right">
If you are interested, fill out the contact info. see link above<br><br></p>                
                <p>A new league will be forming. You also can get ranked to see how you fit in the overall system in Brandon.  The cost to join the League is $20.  All moneys taken in will be distributed out as prizes in the playoffs at the end of the season. 
</p><br>
The league will be playing on Thursday out of the following pubs:<br>
Fox and Hounds<br>
229 E Brandon Blvd, Brandon 33511<br>
<br>
O'Bien's Irish Pub<br>
701 W Lumsden Rd, Brandon 33511<br>
<br>
<p>
<h3>Format of Play:</h3>

All matches start at 7:00p.m. EST<br>
Each night each player will face a different opponent and play two sets.  Each set will consist of up to 9 legs.  The first player to win five legs will win the set.<br>
<br>
Here are the games that will be played<br>
<br>
<table border=1>
<tr><td>First Leg</td><td>501 Single In / Double Out</td></tr>
<tr><td>Second Leg</td><td>Cricket</td></tr>
<tr><td>Third Leg</td><td>501 Sigle In / Double Out</td></tr>
<tr><td>Fourth Leg</td><td>501 Single In / Double Out</td></tr>
<tr><td>Fifth Leg</td><td>Cricket</td></tr>
<tr><td>Sixth Leg</td><td>501 Single In / Double Out</td></tr>
<tr><td>Seventh Leg</td><td>501 Single In / Double Out</td></tr>
<tr><td>Eighth Leg</td><td>501 Single In / Double Out</td></tr>
<tr><td>Ninth Leg </td><td>501 Single In / Double Out</td></tr>
</table>
<br>
At the beginning of the Match both players will diddle/cork and the closes to the bullseye starts the first leg.<br>
Whoever wins the diddle/cork starts all the odd legs in the first set. The loser starts all even legs.<br>
Whoever loses the first set starts all odd legs in the second set. The winner starts all the even legs.<br>
<br>
Make Up Match:<br>
<br>
A.     In the event a player cannot make it to the scheduled match.  That player is responsible for contacting their opponent and rescheduling the match.<br>
<br>
B.     If the match cannot be made up the player responsible for the make up will forfeit that match.<br>
<br>
C.     If there are any disbutes over makeup games, the League administrator will have final say on outcomes and decisions.<br>
<br>
D.     All make up matches will be played at the sponsored location.<br>
 </p>

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
