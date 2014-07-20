<?php
	//connect to MySQL server (server: localhost, username: info, password: tokens)
	if(!($link = mysql_connect('localhost', 'info', 'tokens'))){
		die('<p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
	}
	//connect to MySQL database
	if(!mysql_select_db('infotokens')){
		die('<p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
	}
	
	//master key
	$master = array('c',
					'c',
					'e',
					'a',
					'b',
					'c',
					'b',
					'a',
					'e',
					'c',
					'c',
					'c',
					'd',
					'c',
					'b',
					'd',
					'a',
					'b',
					'c',
					'a');
	//number of questions
	$qnum = sizeof($master);
	//calculate points
	$points = 0.00;
	for($i = 1; $i <= $qnum; $i++){
		$answer = $_POST['q'.$i];
		if(isset($answer)){
			if($answer === $master[$i-1]){
				$points++;
			}else{
				$points -= 0.25;
			}
		}
	}
	//find highest curved total to eliminate possible negatives
	$curhigh = $qnum + $qnum*0.25;
	//find SAT equivalent score
	$score = round((($points + 5.00)/$curhigh)*600 + 200);
	
	//insert score into table
	if(!mysql_query('INSERT INTO testsubj SET score="'.$score.'"')){
		die('<p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
	}
	//get all scores
	if(!($sql = mysql_query('SELECT score FROM testsubj'))){
		die('<p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
	}
	//store scores
	$scores = array();
	$row = mysql_fetch_row($sql);
	while(!empty($row[0])){
		$scores[] = $row[0];
		$row = mysql_fetch_row($sql);
	}
	//calculate average score
	$mean = round(array_sum($scores)/sizeof($scores));
	if(!mysql_query('UPDATE stat2 SET mean="'.$mean.'"')){
		die('<p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
	}
	//calculate deviations squared
	$dev2 = array();
	for($i = 0; $i < sizeof($scores); $i++){
		$dev2[] = pow($scores[$i] - $mean, 2);
	}
	//calculate standard deviation
	$standdev = round(sqrt(array_sum($dev2)/(sizeof($scores)-1)));
	if(!mysql_query('UPDATE stat2 SET standdev="'.$standdev.'"')){
		die('<p><strong>Failed!</strong><br/><em>Error:</em> '.mysql_error().'</p></body></html>');
	}
?>
<p>
	The exam is now over. The following is a summation of the point
	values you recieved for this exam, and an estimation of the
	SAT&#0174; Math score you would have recieved, had you taken the
	actual SAT&#0174;.
</p>
<div class="results">
	Point Value Earned: <span class="math"><?php echo $points;?></span>
	<br/>
	SAT Math Score: <span class="math"><?php echo $score;?></span>
</div>
<p>Thank you for your contribution to the study! :)</p>
