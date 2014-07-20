<br/>
<form action="#" class="timer">
	<fieldset>
		<legend>Timer</legend>
		<input id="time" type="text" name="time" value="0:0"/>
	</fieldset>
</form>
<script type="text/javascript">
	/* <![CDATA[ */
	<!--
		var seconds = 0;
		var minutes = 25;
		var warn = false;
		function counter(){
			document.getElementById("time").value=minutes+":"+seconds;
			if(seconds <= 0){
				seconds = 60;
				minutes -= 1;
			}
			if(minutes <= -1){
				seconds = 0;
				minutes = 0;
				document.forms["exam"].submit();
			}else{
				if(!warn && minutes <= 4){
					warn = true;
					alert("You have 5 minutes left. Press OK to continue.");
				}
				seconds -= 1;
				setTimeout("counter()", 1000);
			}
		}
		counter();
	//-->
	/* ]]> */
</script>
<br/>
<img class="testimg" src="notes.png" alt="Notes"/>
<img class="testimg" src="reference.png" alt="Reference Information"/>
<form id="exam" action="index.php?js=1&amp;page=results" method="post">
	<fieldset>
	<br/>
		<legend>SAT&#0174; Math Practice Test 2008-09</legend>
		<fieldset>
			<legend>Question 1</legend>
			<strong>1.</strong>
			If <span class="math">10 + <em>x</em></span> is
			<span class="math">5</span> more than
			<span class="math">10</span>, what is the value of
			2<em>x</em> ?
			<br/>
			<input id="q1a" name="q1" type="radio" value="a"/>
			<label for="q1a">
				<span class="math">-5</span>
			</label>
			<br/>
			<input id="q1b" name="q1" type="radio" value="b"/>
			<label for="q1b">
				<span class="math">&nbsp;5</span>
			</label>
			<br/>
			<input id="q1c" name="q1" type="radio" value="c"/>
			<label for="q1c">
				<span class="math">10</span>
			</label>
			<br/>
			<input id="q1d" name="q1" type="radio" value="d"/>
			<label for="q1d">
				<span class="math">25</span>
			</label>
			<br/>
			<input id="q1e" name="q1" type="radio" value="e"/>
			<label for="q1e">
				<span class="math">50</span>
			</label>
			<br/>
			<input id="q1reset" name="q1" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q1reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 2</legend>
			<strong>2.</strong>
			The result when a number is divided by
			<span class="math">2</span> is equal to the result when that
			same number is divided by <span class="math">4</span>. What
			is that number?
			<br/>
			<input id="q2a" name="q2" type="radio" value="a"/>
			<label for="q2a">
				<span class="math">-4</span>
			</label>
			<br/>
			<input id="q2b" name="q2" type="radio" value="b"/>
			<label for="q2b">
				<span class="math">-2</span>
			</label>
			<br/>
			<input id="q2c" name="q2" type="radio" value="c"/>
			<label for="q2c">
				<span class="math">&nbsp;0</span>
			</label>
			<br/>
			<input id="q2d" name="q2" type="radio" value="d"/>
			<label for="q2d">
				<span class="math">&nbsp;2</span>
			</label>
			<br/>
			<input id="q2e" name="q2" type="radio" value="e"/>
			<label for="q2e">
				<span class="math">&nbsp;4</span>
			</label>
			<br/>
			<input id="q2reset" name="q2" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q2reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 3</legend>
			<div style="text-align:center;">
				<img src="q3.png" alt="A W with a dotted line through the middle."/>
			</div>
			<strong>3.</strong>
			If this page was folded along the dotted line in the
			figure above, the left half of the letter W would
			exactly coincide with the right half of W. Which of
			the following letters, as shown, CANNOT be folded
			along a vertical line so that its left half would coincide
			with its right half?
			<br/>
			<input id="q3a" name="q3" type="radio" value="a"/>
			<label for="q3a">
				<img src="q3a.png" alt="A"/>
			</label>
			<br/>
			<input id="q3b" name="q3" type="radio" value="b"/>
			<label for="q3b">
				<img src="q3b.png" alt="I"/>
			</label>
			<br/>
			<input id="q3c" name="q3" type="radio" value="c"/>
			<label for="q3c">
				<img src="q3c.png" alt="O"/>
			</label>
			<br/>
			<input id="q3d" name="q3" type="radio" value="d"/>
			<label for="q3d">
				<img src="q3d.png" alt="U"/>
			</label>
			<br/>
			<input id="q3e" name="q3" type="radio" value="e"/>
			<label for="q3e">
				<img src="q3e.png" alt="E"/>
			</label>
			<br/>
			<input id="q3reset" name="q3" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q3reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 4</legend>
			<div style="text-align:center;">
				<img src="q4.png" alt="Note: Figure not drawn to scale."/>
			</div>
			<strong>4.</strong>
			In the figure above, lines <span class="math"><em>&#8467;</em></span>
			and <span class="math"><em>k</em></span> intersect at point
			<span class="math"><em>Q</em></span>. If <span class="math">
			<em>m</em> = 40</span> and <span class="math">
			<em>p</em> = 25</span>, what is the value of
			<span class="math"><em>x</em></span> ?
			<br/>
			<input id="q4a" name="q4" type="radio" value="a"/>
			<label for="q4a">
				<span class="math">15</span>
			</label>
			<br/>
			<input id="q4b" name="q4" type="radio" value="b"/>
			<label for="q4b">
				<span class="math">20</span>
			</label>
			<br/>
			<input id="q4c" name="q4" type="radio" value="c"/>
			<label for="q4c">
				<span class="math">25</span>
			</label>
			<br/>
			<input id="q4d" name="q4" type="radio" value="d"/>
			<label for="q4d">
				<span class="math">40</span>
			</label>
			<br/>
			<input id="q4e" name="q4" type="radio" value="e"/>
			<label for="q4e">
				<span class="math">65</span>
			</label>
			<br/>
			<input id="q4reset" name="q4" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q4reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 5</legend>
			<br/>
			<table>
				<tr>
					<th><span class="math"><em>x</em></span></th>
					<th><span class="math"><em>y</em></span></th>
				</tr>
				<tr>
					<td><span class="math">-2</span></td>
					<td><span class="math">-3</span></td>
				</tr>
				<tr>
					<td><span class="math">&nbsp;0</span></td>
					<td><span class="math">&nbsp;3</span></td>
				</tr>
				<tr>
					<td><span class="math">&nbsp;1</span></td>
					<td><span class="math">&nbsp;6</span></td>
				</tr>
				<tr>
					<td><span class="math">&nbsp;2</span></td>
					<td><span class="math">&nbsp;9</span></td>
				</tr>
				<tr>
					<td><span class="math">&nbsp;4</span></td>
					<td><span class="math">15</span></td>
				</tr>
			</table>
			<br/>
			<strong>5.</strong>
			Which of the following equations is satisfied by the
			five pairs of numbers listed in the table above?
			<br/>
			<input id="q5a" name="q5" type="radio" value="a"/>
			<label for="q5a">
				<span class="math">
					<em>y</em> = <em>x</em><sup>3</sup> + 3
				</span>
			</label>
			<br/>
			<input id="q5b" name="q5" type="radio" value="b"/>
			<label for="q5b">
				<span class="math">
					<em>y</em> = 3<em>x</em> + 3
				</span>
			</label>
			<br/>
			<input id="q5c" name="q5" type="radio" value="c"/>
			<label for="q5c">
				<span class="math">
					<em>y</em> = -3<em>x</em> + 6
				</span>
			</label>
			<br/>
			<input id="q5d" name="q5" type="radio" value="d"/>
			<label for="q5d">
				<span class="math">
					<em>y</em> = <em>x</em><sup>2</sup> + 6
				</span>
			</label>
			<br/>
			<input id="q5e" name="q5" type="radio" value="e"/>
			<label for="q5e">
				<span class="math">
					<em>y</em> = <em>x</em><sup>2</sup> &minus; 7
				</span>
			</label>
			<br/>
			<input id="q5reset" name="q5" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q5reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 6</legend>
			<div style="text-align:center;">
				<img src="q6.png" alt="DAVID'S MONTHLY EXPENSES"/>
			</div>
			<strong>6.</strong>
			The circle graph above shows how David’s monthly
			expenses are divided. If David spends
			<span class="math">$450</span> per month for food,
			how much does he spend per month on his	car?
			<br/>
			<input id="q6a" name="q6" type="radio" value="a"/>
			<label for="q6a">
				<span class="math">$200</span>
			</label>
			<br/>
			<input id="q6b" name="q6" type="radio" value="b"/>
			<label for="q6b">
				<span class="math">$320</span>
			</label>
			<br/>
			<input id="q6c" name="q6" type="radio" value="c"/>
			<label for="q6c">
				<span class="math">$360</span>
			</label>
			<br/>
			<input id="q6d" name="q6" type="radio" value="d"/>
			<label for="q6d">
				<span class="math">$400</span>
			</label>
			<br/>
			<input id="q6e" name="q6" type="radio" value="e"/>
			<label for="q6e">
				<span class="math">$450</span>
			</label>
			<br/>
			<input id="q6reset" name="q6" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q6reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 7</legend>
			<strong>7.</strong>
			If <span class="math"><em>n</em></span> and
			<span class="math"><em>k</em></span> are positive integers
			and
			<span class="math">8<sup><em>n</em></sup> = 2<sup><em>k</em></sup></span>,
			what is the value of
			<sup><em>n</em></sup>&frasl;<sub><em>k</em></sub> ?
			<br/>
			<input id="q7a" name="q7" type="radio" value="a"/>
			<label for="q7a">
				<span class="math"><sup>1</sup>&frasl;<sub>4</sub></span>
			</label>
			<br/>
			<input id="q7b" name="q7" type="radio" value="b"/>
			<label for="q7b">
				<span class="math"><sup>1</sup>&frasl;<sub>3</sub></span>
			</label>
			<br/>
			<input id="q7c" name="q7" type="radio" value="c"/>
			<label for="q7c">
				<span class="math"><sup>1</sup>&frasl;<sub>2</sub></span>
			</label>
			<br/>
			<input id="q7d" name="q7" type="radio" value="d"/>
			<label for="q7d">
				<span class="math">3</span>
			</label>
			<br/>
			<input id="q7e" name="q7" type="radio" value="e"/>
			<label for="q7e">
				<span class="math">4</span>
			</label>
			<br/>
			<input id="q7reset" name="q7" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q7reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 8</legend>
			<strong>8.</strong>
			In a certain store, the regular price of a refrigerator is
			<span class="math">$600</span>. How much money is saved by
			buying this refrigerator at <span class="math">20</span>
			percent off the regular price rather than buying it on sale
			at <span class="math">10</span> percent off the regular price
			with an additional discount of <span class="math">10</span>
			percent off the sale price?
			<br/>
			<input id="q8a" name="q8" type="radio" value="a"/>
			<label for="q8a">
				<span class="math">&nbsp;$6</span>
			</label>
			<br/>
			<input id="q8b" name="q8" type="radio" value="b"/>
			<label for="q8b">
				<span class="math">$12</span>
			</label>
			<br/>
			<input id="q8c" name="q8" type="radio" value="c"/>
			<label for="q8c">
				<span class="math">$24</span>
			</label>
			<br/>
			<input id="q8d" name="q8" type="radio" value="d"/>
			<label for="q8d">
				<span class="math">$54</span>
			</label>
			<br/>
			<input id="q8e" name="q8" type="radio" value="e"/>
			<label for="q8e">
				<span class="math">$60</span>
			</label>
			<br/>
			<input id="q8reset" name="q8" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q8reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 9</legend>
			<strong>9.</strong>
			If the function <span class="math"><em>f</em></span> is
			defined by
			<span class="math"><em>f</em>(<em>x</em>) = 3<em>x</em> + 4</span>,
			then <span class="math">2<em>f</em>(<em>x</em>) + 4 =</span>
			<br/>
			<input id="q9a" name="q9" type="radio" value="a"/>
			<label for="q9a">
				<span class="math">5<em>x</em> + 4</span>
			</label>
			<br/>
			<input id="q9b" name="q9" type="radio" value="b"/>
			<label for="q9b">
				<span class="math">5<em>x</em> + 8</span>
			</label>
			<br/>
			<input id="q9c" name="q9" type="radio" value="c"/>
			<label for="q9c">
				<span class="math">6<em>x</em> + 4</span>
			</label>
			<br/>
			<input id="q9d" name="q9" type="radio" value="d"/>
			<label for="q9d">
				<span class="math">6<em>x</em> + 8</span>
			</label>
			<br/>
			<input id="q9e" name="q9" type="radio" value="e"/>
			<label for="q9e">
				<span class="math">6<em>x</em> + 12</span>
			</label>
			<br/>
			<input id="q9reset" name="q9" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q9reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 10</legend>
			<strong>10.</strong>
			What is the greatest possible area of a triangle with
			one side of length <span class="math">7</span> and another
			side of length <span class="math">10</span> ?
			<br/>
			<input id="q10a" name="q10" type="radio" value="a"/>
			<label for="q10a">
				<span class="math">&nbsp;17</span>
			</label>
			<br/>
			<input id="q10b" name="q10" type="radio" value="b"/>
			<label for="q10b">
				<span class="math">&nbsp;34</span>
			</label>
			<br/>
			<input id="q10c" name="q10" type="radio" value="c"/>
			<label for="q10c">
				<span class="math">&nbsp;35</span>
			</label>
			<br/>
			<input id="q10d" name="q10" type="radio" value="d"/>
			<label for="q10d">
				<span class="math">&nbsp;70</span>
			</label>
			<br/>
			<input id="q10e" name="q10" type="radio" value="e"/>
			<label for="q10e">
				<span class="math">140</span>
			</label>
			<br/>
			<input id="q10reset" name="q10" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q10reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 11</legend>
			<strong>11.</strong>
			A total of <span class="math">120,000</span> votes were cast
			for <span class="math">2</span> opposing candidates, Garcia
			and P&eacute;rez. If Garcia won by a ratio of
			<span class="math">5</span> to <span class="math">3</span>,
			what was the number of votes cast for P&eacute;rez?
			<br/>
			<input id="q11a" name="q11" type="radio" value="a"/>
			<label for="q11a">
				<span class="math">15,000</span>
			</label>
			<br/>
			<input id="q11b" name="q11" type="radio" value="b"/>
			<label for="q11b">
				<span class="math">30,000</span>
			</label>
			<br/>
			<input id="q11c" name="q11" type="radio" value="c"/>
			<label for="q11c">
				<span class="math">45,000</span>
			</label>
			<br/>
			<input id="q11d" name="q11" type="radio" value="d"/>
			<label for="q11d">
				<span class="math">75,000</span>
			</label>
			<br/>
			<input id="q11e" name="q11" type="radio" value="e"/>
			<label for="q11e">
				<span class="math">80,000</span>
			</label>
			<br/>
			<input id="q11reset" name="q11" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q11reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 12</legend>
			<strong>12.</strong>
			If a positive integer <span class="math"><em>n</em></span>
			is picked at random from the positive integers less than or
			equal to <span class="math">10</span>, what is the
			probability that
			<span class="math">5<em>n</em> + 3 &le; 14</span> ?
			<br/>
			<input id="q12a" name="q12" type="radio" value="a"/>
			<label for="q12a">
				<span class="math">0</span>
			</label>
			<br/>
			<input id="q12b" name="q12" type="radio" value="b"/>
			<label for="q12b">
				<span class="math"><sup>1</sup>&frasl;<sub>10</sub></span>
			</label>
			<br/>
			<input id="q12c" name="q12" type="radio" value="c"/>
			<label for="q12c">
				<span class="math"><sup>1</sup>&frasl;<sub>5</sub></span>
			</label>
			<br/>
			<input id="q12d" name="q12" type="radio" value="d"/>
			<label for="q12d">
				<span class="math"><sup>3</sup>&frasl;<sub>10</sub></span>
			</label>
			<br/>
			<input id="q12e" name="q12" type="radio" value="e"/>
			<label for="q12e">
				<span class="math"><sup>2</sup>&frasl;<sub>5</sub></span>
			</label>
			<br/>
			<input id="q12reset" name="q12" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q12reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 13</legend>
			<strong>13.</strong>
			If <span class="math"><em>t</em></span> is a number greater
			than <span class="math">1</span>, then
			<span class="math"><em>t</em><sup>2</sup></span> is how much
			greater than <span class="math"><em>t</em></span> ?
			<br/>
			<input id="q13a" name="q13" type="radio" value="a"/>
			<label for="q13a">
				<span class="math">1</span>
			</label>
			<br/>
			<input id="q13b" name="q13" type="radio" value="b"/>
			<label for="q13b">
				<span class="math">2</span>
			</label>
			<br/>
			<input id="q13c" name="q13" type="radio" value="c"/>
			<label for="q13c">
				<span class="math"><em>t</em></span>
			</label>
			<br/>
			<input id="q13d" name="q13" type="radio" value="d"/>
			<label for="q13d">
				<span class="math"><em>t</em>(<em>t</em> &minus; 1)</span>
			</label>
			<br/>
			<input id="q13e" name="q13" type="radio" value="e"/>
			<label for="q13e">
				<span class="math">(<em>t</em> &minus; 1)(<em>t</em> + 1)</span>
			</label>
			<br/>
			<input id="q13reset" name="q13" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q13reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 14</legend>
			<strong>14.</strong>
			The height of a right circular cylinder is
			<span class="math">5</span> and the diameter of its base is
			<span class="math">4</span>. What is the distance from the
			center of one base to a point on the circumference of the
			other base?
			<br/>
			<input id="q14a" name="q14" type="radio" value="a"/>
			<label for="q14a">
				<span class="math">3</span>
			</label>
			<br/>
			<input id="q14b" name="q14" type="radio" value="b"/>
			<label for="q14b">
				<span class="math">5</span>
			</label>
			<br/>
			<input id="q14c" name="q14" type="radio" value="c"/>
			<label for="q14c">
				<span class="math">&radic;29</span> (approximately <span class="math">5.39</span>)
			</label>
			<br/>
			<input id="q14d" name="q14" type="radio" value="d"/>
			<label for="q14d">
				<span class="math">&radic;33</span> (approximately <span class="math">5.74</span>)
			</label>
			<br/>
			<input id="q14e" name="q14" type="radio" value="e"/>
			<label for="q14e">
				<span class="math">&radic;41</span> (approximately <span class="math">6.40</span>)
			</label>
			<br/>
			<input id="q14reset" name="q14" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q14reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 15</legend>
			<strong>15.</strong>
			If <span class="math"><em>p</em></span> and
			<span class="math"><em>n</em></span> are integers such that
			<span class="math"><em>p</em> &gt; <em>n</em> &gt; 0</span>
			and
			<span class="math"><em>p</em><sup>2</sup> &minus; <em>n</em><sup>2</sup> = 12</span>,
			which of the following can be the value of
			<span class="math"><em>p</em> &minus; <em>n</em></span> ?
			<br/><br/>
			<div class="math">
				&nbsp;&nbsp;&nbsp;I. 1<br/>
				&nbsp;&nbsp;II. 2<br/>
				&nbsp;III. 4<br/>
			</div>
			<br/>
			<input id="q15a" name="q15" type="radio" value="a"/>
			<label for="q15a">
				<span class="math">I</span> only
			</label>
			<br/>
			<input id="q15b" name="q15" type="radio" value="b"/>
			<label for="q15b">
				<span class="math">II</span> only
			</label>
			<br/>
			<input id="q15c" name="q15" type="radio" value="c"/>
			<label for="q15c">
				<span class="math">I</span> and
				<span class="math">II</span> only
			</label>
			<br/>
			<input id="q15d" name="q15" type="radio" value="d"/>
			<label for="q15d">
				<span class="math">II</span> and
				<span class="math">III</span> only
			</label>
			<br/>
			<input id="q15e" name="q15" type="radio" value="e"/>
			<label for="q15e">
				<span class="math">I</span>, <span class="math">II</span>,
				and <span class="math">III</span>
			</label>
			<br/>
			<input id="q15reset" name="q15" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q15reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Questions 16-18</legend>
			<strong>
				<span style="text-decoration:underline;">Questions 16-18</span>
				refer to the following figure and information.
			</strong>
			<br/><br/>
			<div style="text-align:center;">
				<img src="q16_18.png"
					alt="A grid with 5 points labeled F, W, X, Y, Z"/>
			</div>
			<br/>
			The grid above represents equally spaced streets in a
			town that has no one-way streets.
			<span class="math"><em><strong>F</strong></em></span> marks
			the corner where a firehouse is located. Points
			<span class="math"><em>W</em></span>,
			<span class="math"><em>X</em></span>,
			<span class="math"><em>Y</em></span>, and
			<span class="math"><em>Z</em></span> represent the locations
			of some other buildings. The fire company defines a
			building's <span class="math"><em>m</em></span>-distance as
			the	minimum number of blocks that a fire truck must travel
			from the firehouse to reach the building. For example,
			the building at <span class="math"><em>X</em></span> is an
			<span class="math"><em>m</em></span>-distance of
			<span class="math">2</span>, and the building at
			<span class="math"><em>Y</em></span> is an
			<span class="math"><em>m</em></span>-distance of
			<span class="math"><sup>1</sup>&frasl;<sub>2</sub></span>
			from the firehouse.
			<br/><br/>
			<fieldset>
				<legend>Question 16</legend>
				<strong>16.</strong>
				What is the <span class="math">m</span>-distance of the building
				at <span class="math">W</span> from the firehouse?
				<br/>
				<input id="q16a" name="q16" type="radio" value="a"/>
				<label for="q16a">
					<span class="math">2</span>
				</label>
				<br/>
				<input id="q16b" name="q16" type="radio" value="b"/>
				<label for="q16b">
					<span class="math">2<sup>1</sup>&frasl;<sub>2</sub></span>
				</label>
				<br/>
				<input id="q16c" name="q16" type="radio" value="c"/>
				<label for="q16c">
					<span class="math">3</span>
				</label>
				<br/>
				<input id="q16d" name="q16" type="radio" value="d"/>
				<label for="q16d">
					<span class="math">3<sup>1</sup>&frasl;<sub>2</sub></span>
				</label>
				<br/>
				<input id="q16e" name="q16" type="radio" value="e"/>
				<label for="q16e">
					<span class="math">4<sup>1</sup>&frasl;<sub>2</sub></span>
				</label>
				<br/>
				<input id="q16reset" name="q16" type="radio" class="hide"/>
				<input type="button" name="reset" value="Reset"
					onclick="document.getElementById('q16reset').checked=true;"/>
			</fieldset>
			<br/>
			<fieldset>
				<legend>Question 17</legend>
				<strong>17.</strong>
				What is the total number of different routes that a fire truck
				can travel the <span class="math">m</span>-distance from
				<span class="math"><em><strong>F</strong></em></span>
				to <span class="math"><em>Z</em></span> ?
				<br/>
				<input id="q17a" name="q17" type="radio" value="a"/>
				<label for="q17a">
					Six
				</label>
				<br/>
				<input id="q17b" name="q17" type="radio" value="b"/>
				<label for="q17b">
					Five
				</label>
				<br/>
				<input id="q17c" name="q17" type="radio" value="c"/>
				<label for="q17c">
					Four
				</label>
				<br/>
				<input id="q17d" name="q17" type="radio" value="d"/>
				<label for="q17d">
					Three
				</label>
				<br/>
				<input id="q17e" name="q17" type="radio" value="e"/>
				<label for="q17e">
					Two
				</label>
				<br/>
				<input id="q17reset" name="q17" type="radio" class="hide"/>
				<input type="button" name="reset" value="Reset"
					onclick="document.getElementById('q17reset').checked=true;"/>
			</fieldset>
			<br/>
			<fieldset>
				<legend>Question 18</legend>
				<strong>18.</strong>
				All of the buildings in the town that are an
				<span class="math">m</span>-distance of
				<span class="math">3</span> from the firehouse must lie
				on a
				<br/>
				<input id="q18a" name="q18" type="radio" value="a"/>
				<label for="q18a">
					circle
				</label>
				<br/>
				<input id="q18b" name="q18" type="radio" value="b"/>
				<label for="q18b">
					square
				</label>
				<br/>
				<input id="q18c" name="q18" type="radio" value="c"/>
				<label for="q18c">
					right isosceles triangle
				</label>
				<br/>
				<input id="q18d" name="q18" type="radio" value="d"/>
				<label for="q18d">
					pair ofintersecting lines
				</label>
				<br/>
				<input id="q18e" name="q18" type="radio" value="e"/>
				<label for="q18e">
					line
				</label>
				<br/>
				<input id="q18reset" name="q18" type="radio" class="hide"/>
				<input type="button" name="reset" value="Reset"
					onclick="document.getElementById('q18reset').checked=true;"/>
			</fieldset>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 19</legend>
			If <span class="math"><em>x</em></span> and
			<span class="math"><em>y</em></span> are positive integers,
			which of the following is equivalent to
			<span class="math">(2<em>x</em>)<sup>3<em>y</em></sup> &minus; (2<em>x</em>)<sup><em>y</em></sup></span> ?
			<br/>
			<input id="q19a" name="q19" type="radio" value="a"/>
			<label for="q19a">
				<span class="math">
					(2<em>x</em>)<sup>2<em>y</em></sup>
				</span>
			</label>
			<br/>
			<input id="q19b" name="q19" type="radio" value="b"/>
			<label for="q19b">
				<span class="math">
					2<sup>y</sup>(<em>x</em><sup>3</sup> &minus; <em>x<sup>y</sup></em>)
				</span>
			</label>
			<br/>
			<input id="q19c" name="q19" type="radio" value="c"/>
			<label for="q19c">
				<span class="math">
					(2<em>x</em>)<sup><em>y</em></sup>[(2<em>x</em>)<sup>2<em>y</em></sup> &minus; 1]
				</span>
			</label>
			<br/>
			<input id="q19d" name="q19" type="radio" value="d"/>
			<label for="q19d">
				<span class="math">
					(2<em>x</em>)<sup><em>y</em></sup>(4<em>x<sup>y</sup></em> &minus; 1)
				</span>
			</label>
			<br/>
			<input id="q19e" name="q19" type="radio" value="e"/>
			<label for="q19e">
				<span class="math">
					(2<em>x</em>)<sup><em>y</em></sup>[(2<em>x</em>)<sup>3</sup> &minus; 1]
				</span>
			</label>
			<br/>
			<input id="q19reset" name="q19" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q19reset').checked=true;"/>
		</fieldset>
		<br/>
		<fieldset>
			<legend>Question 20</legend>
			If <span class="math"><em>j</em></span>,
			<span class="math"><em>k</em></span>, and
			<span class="math"><em>n</em></span> are consecutive integers such
			that
			<span class="math">0 &lt; <em>j</em> &lt; <em>k</em> &lt; <em>n</em></span>
			and the units (ones) digit of the product
			<span class="math"><em>jn</em></span> is
			<span class="math">9</span>, what is the units digit of
			<span class="math">k</span> ?
			<br/>
			<input id="q20a" name="q20" type="radio" value="a"/>
			<label for="q20a">
				<span class="math">0</span>
			</label>
			<br/>
			<input id="q20b" name="q20" type="radio" value="b"/>
			<label for="q20b">
				<span class="math">1</span>
			</label>
			<br/>
			<input id="q20c" name="q20" type="radio" value="c"/>
			<label for="q20c">
				<span class="math">2</span>
			</label>
			<br/>
			<input id="q20d" name="q20" type="radio" value="d"/>
			<label for="q20d">
				<span class="math">3</span>
			</label>
			<br/>
			<input id="q20e" name="q20" type="radio" value="e"/>
			<label for="q20e">
				<span class="math">4</span>
			</label>
			<br/>
			<input id="q20reset" name="q20" type="radio" class="hide"/>
			<input type="button" name="reset" value="Reset"
				onclick="document.getElementById('q20reset').checked=true;"/>
		</fieldset>
	</fieldset>
	<div style="background-color:#888888;border-style:solid;border-width:thin;text-align:center;">
		<input type="submit" name="finish" value="Submit Exam"/>
	</div>
</form>
<br/>
<div class="footer">
	The material presented on this site, under Fair Use provisions
	(<strong>17 U.S.C &#0167;&nbsp;107</strong>), was obtained from
	<em>Official SAT&#0174; Practice Test 2008-09</em> and are the sole
	property of the College Board.
</div>
