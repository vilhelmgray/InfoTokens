<?php
/***********************************************************************
    This program grades a test as part of a research project.
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
//check if Javascript is enabled
$jscript = false;
$js = $_GET['js'];
if(isset($js) && $js == 1){
	$jscript = true;
	//figure out which exam was selected
	$page = $_GET['page'];
}
?>
<head>
	<title>InfoTokens - SAT&#0174; Math Practice Test 2008-09</title>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
	<meta http-equiv="Content-Style-Type" content="text/css"/>
	<meta name="description"
		content="This practice exam will be used in a research project to compare the scores of professors and students."/>
<?php
	if(!$jscript){ ?>
	<script type="text/javascript">
		/* <![CDATA[ */
		<!--
			window.location = "index.php?js=1";
		//-->
		/* ]]> */
	</script>
<?php } ?>
	<link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
<div id="head">
	<div class="title">InfoTokens: Phase 2</div>
</div>
<div id="body">
<?php
	if(!isset($page) || ($page !== 'exam' && $page !== 'results')){
		include('intro.php');
	}elseif($page === 'exam'){
		include('exam.php');
	}else{
		include('results.php');
	}
?>
	<br/>
</div>
<div id="foot">
	<span class="footer">Copyright &#0169; 2010 William Breathitt Gray</span>
	<a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border-style:none;"
             src="http://jigsaw.w3.org/css-validator/images/vcss"
             alt="Valid CSS!"/>
	</a>
	<a href="http://validator.w3.org/check?uri=referer">
        <img style="border-style:none;"
             src="http://www.w3.org/Icons/valid-xhtml11"
             alt="Valid XHTML 1.1"/>
	</a>
	<a href="gpl.txt">
		<img style="border-style:none;"
		     src="gplv3-88x31.png"
		     alt="GNU General Public License"/>
	</a>
</div>
</body>
</html>
