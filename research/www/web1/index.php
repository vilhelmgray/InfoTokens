<?php
/***********************************************************************
    This program displays and calculates statistical data for a survey.
    Copyright (C) 2010  William Breathitt Gray
************************************************************************
    This program is free software: you can redistribute it and/or
    modify it under the terms of the GNU General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see
    <http://www.gnu.org/licenses/>.
************************************************************************
***********************************************************************/
//figure out if browser supports XML
$xml = false;
$mime = 'text/html';
$accept = $_SERVER['HTTP_ACCEPT'];
$useragent = $_SERVER['HTTP_USER_AGENT'];
//make sure browser sent information
if(isset($accept) && isset($useragent)){
        //if browser supports XML
        if(stristr($accept, 'application/xhtml+xml') || stristr($useragent, 'W3C_Validator')){
                $xml = true;
                $mime = 'application/xhtml+xml';
        }
}
header('Content-Type: '.$mime.';charset=UTF-8');
header("Vary: Accept");
if($xml){
        //declare XML document
        echo '<?xml version="1.0" encoding="UTF-8"?>'."\r\n";
}
?>
<!--
    Copyright (C) 2010  William Breathitt Gray

    This program is free software: you can redistribute it and/or
    modify it under the terms of the GNU General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see
    <http://www.gnu.org/licenses/>.
-->
<?php
        if($xml){ //if XML is supported by browser
                echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">'."\n";
                echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">';
        }else{
                echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">'."\n";
                echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">';
        }

//connect to MySQL server (server: localhost, username: info, password: tokens)
if(!($link = mysql_connect('localhost', 'info', 'tokens'))){
	die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
}
//connect to MySQL database
if(!mysql_select_db('infotokens')){
	die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
}
//save ip as an unsigned integer
$ip = sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
if(!($sql = mysql_query('SELECT ip FROM ip WHERE ip="'.$ip.'"'))){
	die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
}
$row = mysql_fetch_row($sql);
if(empty($row[0])){
	//unique visitor
	if(!mysql_query('INSERT INTO ip SET ip="'.$ip.'"')){
		die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
	}
	if(!mysql_query('UPDATE stat SET uvisit=uvisit+1')){
                die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
    }
}

//set default values
$retry = false;
$complete = false;
//check if user has already completed survey
if(!($sql = mysql_query('SELECT contrib FROM ip WHERE ip="'.$ip.'"'))){
	die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
}
$row = mysql_fetch_row($sql);
if($row[0] != 1){ 
	//get survey answers
	$q1 = $_POST['q1'];
	$q2 = $_POST['q2'];
	if(isset($q1) && isset($q2)){
		//prevent user from doing multiple surveys
		if(!mysql_query('UPDATE ip SET contrib=1 WHERE ip="'.$ip.'"')){
			die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
	    }
		//increment contribution counter
		if(!mysql_query('UPDATE stat SET contrib=contrib+1')){
		        die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
        }
		//record answers
		if($q1 == 1){
			if(!mysql_query('UPDATE stat SET q1yes=q1yes+1')){
				die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
			}
		}else{
			if(!mysql_query('UPDATE stat SET q1no=q1no+1')){
            	die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
          	}
		}
		if($q2 == 1){
			if(!mysql_query('UPDATE stat SET q2yes=q2yes+1')){
                die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
	        }
		}else{
			if(!mysql_query('UPDATE stat SET q2no=q2no+1')){
				die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
	        }
		}
	}elseif(isset($q1) || isset($q2)){
		$retry = true;
	}
}else{
	$complete = true;
}

//calculate percentages
if(!($sql = mysql_query('SELECT q1yes,q1no,q2yes,q2no FROM stat'))){
        die('<body><p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
}
$row = mysql_fetch_row($sql);
mysql_close($link);
$q1yes = 100*($row[0]/($row[0]+$row[1]));
$q1no = 100 - $q1yes;
$q2yes = 100*($row[2]/($row[2]+$row[3]));
$q2no = 100 - $q2yes;
$q1yes = sprintf('%.1f', $q1yes);
$q1no = sprintf('%.1f', $q1no);
$q2yes = sprintf('%.1f', $q2yes);
$q2no = sprintf('%.1f', $q2no);
?>
<head>
	<title>InfoTokens - Survey</title>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<meta http-equiv="Content-Style-Type" content="text/css"/>
	<meta name="description" content="These are the results of a survey I'm conducting to collect statistical data for a computer simulation I will program."/>
	<style type="text/css">
		body{
			background-color:#2B3856;
			color:#000000;
			font-family:sans-serif;
			font-size:12pt;	
		}
		div{
			margin:0.2em auto;
            padding:0.2em 0.6em;
		}
		em{
			font-style:oblique;
		}
		legend{
			font-style:oblique;
		}
		strong{
			font-weight:bold;
		}
		#body{
			background-color:#646D7E;
            border-style:solid;
            border-width:medium;
			text-align:justify;
            width:68%;
		}
		#foot{
			background-color:#646D7E;
			border-style:solid;
            border-width:medium;
			text-align:center;
			width:68%;
		}
		#head{
			background-color:#646D7E;
			border-style:solid;
            border-width:medium;
			text-align:center;
			width:68%;
		}
		.bargreen{
			background-color:#00FF00;
			height:100%;
			margin:auto auto auto 0.0em;
			max-width:100%;
			min-width:0.0%;
			padding:0.0em;
		}
		.barred{
			background-color:#FF0000;
			height:0.8em;
			margin:auto auto auto 0.0em;
			max-width:100%;
			min-width:0.0%;
			padding:0.0em;
			width:100%;
		}
		.error{
			color:#880000;
			font-size:0.8em;
			font-weight:bold;
		}
		.footer{
			font-size:0.8em;
		}
		.graph{
			border-style:solid;
			border-width:medium;
			padding:0.0em;
			width:25%;
		}
		.heading{
			font-size:1.4em;
			text-decoration:underline;
			font-weight:bold;
		}
		.question{
			text-align:center;
		}
		.question:hover {
			background-color:#808080;
		}
		.title{
			font-size:3.0em;
			font-weight:bold;
		}
	</style>
</head>
<body>
<div id="head">
	<span class="title">InfoTokens Survey</span>
</div>
<div id="body">
	<div>
		<span class="heading">Purpose:</span>
		<p>In order to understand how a collective of individuals communicates and transfers
		information among itself, I have constructed a survey to determine what percentage
		of a sample population will actively contribute to and modify information in an
		open-content society.</p>
	</div>
	<div>
		<span class="heading">Results:</span>
		<p>The following are the percentages calculated for each question. A visual
		representation of the data is also provided, where the ratio of green to red represents
		the ratio of <em>Yes</em> to <em>No</em> answers.</p>
		<div class="question">
			<strong>If you knew original information about a subject, would you share it on a wiki?</strong>
			<div class="graph">
				<div class="barred">
					<div class="bargreen" style="width:<?php echo $q1yes;?>%;"></div>
				</div>
			</div>
			<em><?php echo $q1yes;?>% Yes | <?php echo $q1no;?>% No</em>
		</div>
		<div class="question">
			<strong>If you spotted false information on a wiki, would you change (or delete) it?</strong>
                        <div class="graph">
                        	<div class="barred"><div class="bargreen" style="width:<?php echo $q2yes;?>%"></div></div>
                        	</div>
			<em><?php echo $q2yes;?>% Yes | <?php echo $q2no;?>% No</em>
		</div>
	</div>
	<div>
		<span class="heading">Survey:</span>
		<p>If you would like to contribute to the study, please complete and submit the following survey.</p>
		<?php
			if($complete){
                        	echo '<span class="error">You have already completed the survey. Thank you for your contribution.</span>';
                        }
		?>
		<form action="index.php" method="post">
			<fieldset>
				<legend>InfoTokens</legend>
				<div class="question" style="text-align:left;">
					<strong>1. If you knew original information about a subject, would you share it on a wiki?</strong>
					<br/>
					<input <?php if($complete){echo 'disabled="disabled"';};?> id="q1a" type="radio" name="q1" value="1"/>
					<label for="q1a">Yes</label>
					<br/>
					<input <?php if($complete){echo 'disabled="disabled"';};?> id="q1b" type="radio" name="q1" value="0"/>
					<label for="q1b">No</label>
				</div>
				<br/>
				<div class="question" style="text-align:left;">
					<strong>2. If you spotted false information on a wiki, would you change (or delete) it?</strong>
					<br/>
					<input <?php if($complete){echo 'disabled="disabled"';};?> id="q2a" type="radio" name="q2" value="1"/>
					<label for="q2a">Yes</label>
					<br/>
					<input <?php if($complete){echo 'disabled="disabled"';};?> id="q2b" type="radio" name="q2" value="0"/>
					<label for="q2b">No</label>
				</div>
				<br/>
				<?php
					if($retry){
						echo '<span class="error">Please ensure all questions are answered before submission.</span><br/>';
					}
				?>
				<input <?php if($complete){echo 'disabled="disabled"';};?> type="submit" value="Submit!"/>
			</fieldset>
		</form>
	</div>
</div>
<div id="foot">
	<span class="footer">Copyright &#169; 2010 William Breathitt Gray</span>
	<a href="gpl.txt">
		<img style="border-style:none;"
		     src="gplv3-88x31.png"
		     alt="GNU General Public License"/>
	</a>
</div>
</body>
</html>
