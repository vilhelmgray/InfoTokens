<p>
	In order to understand how a collective of individuals communicates and transfers
	information among itself, I have constructed a three-phase research project called
	<em>InfoTokens</em>.
</p>
<p>
	In <a href="http://latin.crabdance.com/infotokens/index.php">phase 1</a>,
	a sample of the Internet population is surveyed to determine several rates of
	information interaction. In phase 2, a sample of the academic population is
	administered an SAT practice test; the average score and standard deviations are
	calculated and compared with the student average score and standard deviations
	of the respective year. Finally, in phase 3, the data is put into a computer
	algorithm to simulate the growth and spread of information in a discourse community.
</p>
<p>
	This webpage is part of phase 2. The exam consists of
	<em>20 multiple choice questions</em>, and you will have <em>25 minutes</em> to
	answer all the questions. Each correct answer is worth <strong>1 point</strong>,
	while each wrong answer takes away <strong>0.25 points</strong>; a blank answer is
	worth <strong>0 points</strong> and will neither harm nor aid your score. A popup
	window will warn you when you have 5 minutes left.	
</p>
<p>
	To start the exam, click the <em>Begin!</em> button below.
</p>
<form action="index.php" method="get">
	<fieldset class="pretest">
		<legend>Begin Exam</legend>
		<input type="hidden" name="js" value="1"/>
		<input type="hidden" name="page" value="exam"/>
		<div class="warn">
			WARNING: You will not be able to pause the test, or leave at any time, once the exam has begun.
		</div><br/>
		<div style="<?php if($jscript){echo 'display:none';}else{echo 'color:#FF0000;font-weight:bold;';}?>">Please enable Javascript.</div>
		<input <?php if(!$jscript){echo 'disabled="disabled"';}?> type="submit" value="Begin!"/>
	</fieldset>
</form>
