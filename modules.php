<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function db_mysqli_connect(){
    $mysqli = new mysqli('t80league.db.7600552.hostedresource.com', 't80league', 'R1yK2ckl2r!', 't80league');
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    return $mysqli;
}

function get_rating($name){
    //echo "in get_rating";
    $db = db_mysqli_connect();
    // mysql_select_db("ratings", $db);
    $query = mysqli_query($db, "select rating from rating where name like '" . $name . "'");
  //  echo $query . "<br />";
    $row = mysqli_fetch_assoc($query);
   // echo "<br />" . print_r($row) . " - rating - ". $row['rating'] . "<br />";
    mysqli_close($db);
        return $row['rating'];   
}

function enter_history($player1_name, $player1_rating, $player2_name, $player2_rating, $game, $matchset){
	$current_id = get_current_history_id();
    $db = db_mysqli_connect();
   // mysql_select_db("ratings", $db);
    $query = "insert into history (name,opponent,rating,o_rating,game,matchset,session) "
            . "values ('" . $player1_name . "', '" . $player2_name . "', " . $player1_rating . ", " . $player2_rating . ", '" . $game . "', '" . $matchset . "', '" . $current_id . "')";
    mysqli_query($db, $query) or die(mysqli_error());
    mysqli_close($db);
}

function get_current_history_id(){
    $db = db_mysqli_connect();
    // mysql_select_db("ratings", $db);
    $query = mysqli_query($db, "select id from session where current = 'yes'");
    $row = mysqli_fetch_assoc($query);
    mysqli_close($db);
    return $row['id']; 
}

function update_player_rating($player_name, $new_rating){
    $db = db_mysqli_connect();
//    mysql_select_db("ratings", $db);
    $query = "update rating set rating = " . $new_rating . ", lastplayed = now() where name like '" . $player_name . "'";
    mysqli_query($db, $query) or die(mysqli_error());
    mysqli_close($db);
}

function get_kfactor($player_name){
    $db = db_mysqli_connect();
 //   //mysql_select_db("ratings", $db);
    $query = mysqli_query($db, "select count(*) as total from history where name like '" . $player_name . "' or opponent like '" . $player_name . "'");
    $result = mysqli_fetch_assoc($query);
  //  echo $result['total'] . "-result<br />";
    mysqli_close($db);
    if($result['total'] < 23){
        return 32;
    }else{
        return 16;
    }
}

function get_players(){
    $db = db_mysqli_connect();
    //mysql_select_db("ratings", $db);
	$query = mysqli_query($db, "select players.name from players, session where session.current = 'yes' and players.session = session.id order by name");
    #$query = mysqli_query($db, "select distinct(name) from rating order by name");
    while ($row = mysqli_fetch_assoc($query)){
        $arow[] = $row;
    }
    mysqli_close($db);
    $return_array = array_filter($arow);
    return $return_array;
}

function get_all_players(){
    $db = db_mysqli_connect();
    $query = mysqli_query($db, "select distinct(players.name) from players");
    while ($row = mysqli_fetch_assoc($query)){
        $arow[] = $row;
    }
    mysqli_close($db);
    $return_array = array_filter($arow);
    return $return_array;

}

function get_player_stats(){
    $player_list = get_all_players();
    foreach($player_list as $player)
    {
        foreach($player as $value){
           $stats[$value] = get_rating($value); 
        }
    }
    return $stats;
}

function update_rating($player1_name, $player2_name, $game, $matchset){
            
        $player1_rating = get_rating($player1_name);
        $player2_rating = get_rating($player2_name);
        
        //formula explained - http://forums.steampowered.com/forums/showthread.php?t=1220287
        $p2_chance_of_winning = abs((1 / ( 1 + pow(10, ( ($player1_rating - $player2_rating) / 400) ) )) * 100); //percentage
        $p2_chance_of_losing = abs(100 - $p2_chance_of_winning); //percentage
        $p1_chance_of_winning = abs((1 / ( 1 + pow(10, ( ($player2_rating - $player1_rating) / 400) ) )) * 100); //percentage
        $p1_chance_of_losing = abs(100 - $p1_chance_of_winning); //percentage
        
        $k_factor = get_kfactor($player1_name); //a common k factor
        $p1_win_points = round($k_factor *  ($p1_chance_of_losing/100)); //k_factor * decimal number
        $p1_lose_points = round($k_factor * ($p1_chance_of_winning/100)); //k_factor * decimal number
        
        $k_factor = get_kfactor($player2_name); //a common k factor
        $p2_win_points = round($k_factor *  ($p2_chance_of_losing/100)); //k_factor * decimal number
        $p2_lose_points = round($k_factor * ($p2_chance_of_winning/100)); //k_factor * decimal number
        
        if($game == "won"){
            enter_history($player1_name, $player1_rating, $player2_name, $player2_rating, $game, $matchset);
            //update player1 rating with win
            $win_rating = $player1_rating + $p1_win_points;
            update_player_rating($player1_name, $win_rating);
            $lose_rating = $player2_rating - $p2_lose_points;
            update_player_rating($player2_name, $lose_rating);
        }else{
            enter_history($player1_name, $player1_rating, $player2_name, $player2_rating, $game, $matchset);
            //update player2 rating with win
            $win_rating = $player2_rating + $p2_win_points;
            update_player_rating($player2_name, $win_rating);
            $lose_rating = $player1_rating - $p1_lose_points;
            update_player_rating($player1_name, $lose_rating);
        }
        
        
}

function get_current_players() {
    $db = db_mysqli_connect();
    //mysql_select_db("ratings", $db);
    $query = mysqli_query($db, "select name from players where session = (select id from session where current = 'yes')");
    while ($row = mysqli_fetch_assoc($query)){
        $arow[] = $row;
    }
    mysqli_close($db);
    $return_array = array_filter($arow);
    return $return_array;
}

function get_current_payers_stats() {
    $player_list = get_current_players();
    foreach($player_list as $player)
    {
	
        foreach($player as $value){
	   $stats[$value]["name"]=$value;
           $stats[$value]["wins"] = get_current_match_win_total($value);
           $stats[$value]["wins"] = $stats[$value]["wins"] + get_current_match_win_total_opp($value);
           $stats[$value]["losses"] = get_current_match_lost_total($value);
           $stats[$value]["losses"] = $stats[$value]["losses"] + get_current_match_lost_total_opp($value);
           $stats[$value]["leg_wins"] = get_current_leg_win_total($value);
           $stats[$value]["leg_wins"] = $stats[$value]["leg_wins"] + get_current_leg_win_total_opp($value);
           $stats[$value]["leg_losses"] = get_current_leg_lost_total($value);
           $stats[$value]["leg_losses"] = $stats[$value]["leg_losses"] + get_current_leg_lost_total_opp($value);
        }
    }
	$mine = sort_final_array($stats);

    return $mine;

}

function get_current_match_win_total($name) {
    $db = db_mysqli_connect();
    $query = mysqli_query($db, "
select if(sum(matchwon) is null,0,sum(matchwon)) as matchwon from (
select distinct name,opponent, if(count(name)>4,1,0) as matchwon, matchset  from history where name like '" . $name . "' and session = (select id from session where current = 'yes') and game = 'won' and matchset = 1 group by name, opponent
union
select distinct name,opponent, if(count(name)>4,1,0) as matchwon, matchset  from history where name like '" . $name . "' and session = (select id from session where current = 'yes') and game = 'won' and matchset = 2 group by name, opponent
)t1

");
    $row = mysqli_fetch_assoc($query);
    mysqli_close($db);
    return $row['matchwon'];   

}

function get_current_match_win_total_opp($name) {
    $db = db_mysqli_connect();
    $query = mysqli_query($db, "
select if(sum(matchwon) is null,0,sum(matchwon)) as matchwon from (
select distinct opponent,name, if(count(opponent)>4,1,0) as matchwon, matchset  from history where opponent like '" . $name . "' and session = (select id from session where current = 'yes') and game = 'lost' and matchset = 1 group by name, opponent
union
select distinct opponent,name, if(count(opponent)>4,1,0) as matchwon, matchset  from history where opponent like '" . $name . "' and session = (select id from session where current = 'yes') and game = 'lost' and matchset = 2 group by name, opponent
)t1

");
    $row = mysqli_fetch_assoc($query);
    mysqli_close($db);
    return $row['matchwon'];

}


function get_current_match_lost_total($name) {
    $db = db_mysqli_connect();
    $query = mysqli_query($db, "
select if(sum(matchlost) is null,0,sum(matchlost)) as matchlost from (
select distinct name,opponent, if(count(name)<5,0,1) as matchlost, matchset  from history where name like '" . $name . "' and session = (select id from session where current = 'yes') and game = 'lost' and matchset = 1 group by name, opponent
union
select distinct name,opponent, if(count(name)<5,0,1) as matchlost, matchset  from history where name like '" . $name . "' and session = (select id from session where current = 'yes') and game = 'lost' and matchset = 2 group by name, opponent
)t1

");
    $row = mysqli_fetch_assoc($query);
    mysqli_close($db);
    return $row['matchlost'];   

}

function get_current_match_lost_total_opp($name) {
    $db = db_mysqli_connect();
    $query = mysqli_query($db, "
select if(sum(matchlost) is null,0,sum(matchlost)) as matchlost from (
select distinct opponent,name, if(count(opponent)<5,0,1) as matchlost, matchset  from history where opponent like '" . $name . "' and session = (select id from session where current = 'yes') and game = 'won' and matchset = 1 group by name, opponent
union
select distinct opponent,name, if(count(opponent)<5,0,1) as matchlost, matchset  from history where opponent like '" . $name . "' and session = (select id from session where current = 'yes') and game = 'won' and matchset = 2 group by name, opponent
)t1

");
    $row = mysqli_fetch_assoc($query);
    mysqli_close($db);
    return $row['matchlost'];

}

function get_current_leg_win_total($name) {
    $db = db_mysqli_connect();
    $query = mysqli_query($db, "
select count(*) as win from history where name like '" . $name . "' and session = (select id from session where current = 'yes') and game = 'won'
");
    $row = mysqli_fetch_assoc($query);
    mysqli_close($db);
    return $row['win'];   
}

function get_current_leg_win_total_opp($name) {
    $db = db_mysqli_connect();
    $query = mysqli_query($db, "
select count(*) as win from history where opponent like '" . $name . "' and session = (select id from session where current = 'yes') and game = 'lost'
");
    $row = mysqli_fetch_assoc($query);
    mysqli_close($db);
    return $row['win'];
}

function get_current_leg_lost_total($name) {
    $db = db_mysqli_connect();
    $query = mysqli_query($db, "
select count(*) as lost from history where name like '" . $name . "' and session = (select id from session where current = 'yes') and game = 'lost'
");
    $row = mysqli_fetch_assoc($query);
    mysqli_close($db);
    return $row['lost'];   
}

function get_current_leg_lost_total_opp($name) {
    $db = db_mysqli_connect();
    $query = mysqli_query($db, "
select count(*) as lost from history where opponent like '" . $name . "' and session = (select id from session where current = 'yes') and game = 'won'
");
    $row = mysqli_fetch_assoc($query);
    mysqli_close($db);
    return $row['lost'];
}

function sort_final_array($myarray) {
	foreach ($myarray as $key=>$row){
		$wins[$key] = $row['wins'];
		$losses[$key] = $row['losses'];
		$leg_wins[$key] = $row['leg_wins'];
		$leg_losses[$key] = $row['leg_losses'];
	}
	array_multisort($wins, SORT_DESC, $losses, SORT_ASC, $leg_wins, SORT_DESC, $leg_losses, SORT_ASC, $myarray);
	return $myarray;
}
