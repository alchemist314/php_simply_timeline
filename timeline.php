<?php

/*
MIT License

Copyright (c) 2023 Golovanov Grigoriy
Contact e-mail: magentrum@gmail.com


Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

*/

// Spaces between nodes
define("NODE_SPACES", 1);

define("HEAVY_VERTICAL", "&#9475");
define("HEAVY_VERTICAL_RIGHT", "&#9507");
define("HEAVY_VERTICAL_LEFT", "&#9515");
define("HEAVY_HORIZONTAL", "&#9473");

define("LIGHT_VERTICAL", "&#9474");
define("LIGHT_VERTICAL_LEFT", "&#9508");
define("LIGHT_VERTICAL_RIGHT", "&#9500");
define("LIGHT_HORIZONTAL", "&#9472");

define("DOUBLE_VERTICAL", "&#9553");
define("DOUBLE_VERTICAL_LEFT", "&#9571");
define("DOUBLE_VERTICAL_RIGHT", "&#9568");
define("DOUBLE_HORIZONTAL", "&#9552");

// Line style
$sLineStyle='HEAVY'; //DOUBLE, HEAVY, LIGHT

switch ($sLineStyle) {
    case 'HEAVY':
	define("VERTICAL", HEAVY_VERTICAL);
	define("VERTICAL_LEFT", HEAVY_VERTICAL_LEFT);
	define("VERTICAL_RIGHT", HEAVY_VERTICAL_RIGHT);
	define("HORIZONTAL", HEAVY_HORIZONTAL);
    	break;
    case 'LIGHT':
	define("VERTICAL", LIGHT_VERTICAL);
	define("VERTICAL_LEFT", LIGHT_VERTICAL_LEFT);
	define("VERTICAL_RIGHT", LIGHT_VERTICAL_RIGHT);
	define("HORIZONTAL", LIGHT_HORIZONTAL);
    	break;
    case 'DOUBLE':
	define("VERTICAL", DOUBLE_VERTICAL);
	define("VERTICAL_LEFT", DOUBLE_VERTICAL_LEFT);
	define("VERTICAL_RIGHT", DOUBLE_VERTICAL_RIGHT);
	define("HORIZONTAL", DOUBLE_HORIZONTAL);
    	break;
}

// Array with data. Use '\n' for the new line

$aData['2009-10-11'] = "Lorem ipsum dolor sit amet";
$aData['2001-03-05'] = "Consectetur adipiscing elit";
$aData['2002-09-19'] = "Sed do eiusmod tempor incididunt \nut labore et dolore \nmagna aliqua.";
$aData['2007-08-12'] = "Ut enim ad minim veniam";
$aData['2007-09-12'] = "Quis nostrud exercitation \nullamco laboris nisi \nut aliquip ex ea \ncommodo consequat";
$aData['2003-03-25'] = "Duis aute irure dolor";
$aData['2004-12-01'] = "In reprehenderit in voluptate";
$aData['2010-01-29'] = "Velit esse cillum dolore";
$aData['2005-02-12'] = "Eu fugiat nulla pariatur.";
$aData['2006-03-09'] = "Excepteur sint occaecat cupidatat";
$aData['2008-01-23'] = "Sunt in culpa qui \nofficia deserunt mollit";
$aData['2002-07-15'] = "Anim id est laborum.";
$aData['2000-01-01'] = "Sint cillum ut enim";

ksort($aData);

?>

<html>
<head>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<center><h2>Time Line!</h2></center>
<div class="main">

<?php

for($l=0; $l<1; $l++) {
    fDrawVerticalLine();
}

$m=0;
foreach($aData as $sDate=>$sStr) {

    for($l=0; $l<NODE_SPACES; $l++) {
	fDrawVerticalLine();
    }

    $aEXPn=explode("\n",$sStr);

    if (($m % 2)==0) {
	fDrawLeftLineSubj($sDate); 
	foreach($aEXPn as $sPartString) {
	    $sPartString=fReplaceSpaces($sPartString);
	    fDrawLeftLineText($sPartString);
	}
    } else {
	fDrawRightLineSubj($sDate);
	foreach($aEXPn as $sPartString) {
	    $sPartString=fReplaceSpaces($sPartString);
	    fDrawRightLineText(trim($sPartString));
	}
    }
    $m++;
}    

for($l=0; $l<1; $l++) {
    fDrawVerticalLine();
}

function fReplaceSpaces($sPartString) {
    $aEXP=explode(" ",trim($sPartString));
    $sPartString=implode("&nbsp;", $aEXP);
    return $sPartString;
}

function fDrawVerticalLine() {

    print "<div class=\"container\">".
	    "<div class=\"column\">&nbsp;</div>".
	    "<div class=\"horizontal_line\">&nbsp;</div>".
	    "<div class=\"vertical_line\">".VERTICAL."</div>".
	    "<div class=\"column\">&nbsp;</div>".
	   "</div>";
}

function fDrawLeftLineSubj($sLeftText) {
    for($l=0; $l<5; $l++) {
	$sHorizontaLine .= HORIZONTAL;
    }
    $sRightText="&nbsp;";
    print "<div class=\"container\">".
	    "<div class=\"column text_right text_bold\">".$sLeftText."&nbsp;</div>".
	    "<div class=\"horizontal_line\">".$sHorizontaLine."</div>".
	    "<div class=\"vertical_line\">".VERTICAL_LEFT."</div>".
	    "<div class=\"column text_bold\">".$sRightText."</div>".
	   "</div>";
}

function fDrawLeftLineText($sLeftText) {
    for($l=0; $l<5; $l++) {
	$sHorizontaLine .= HORIZONTAL;
    }
    $sRightText="&nbsp;";

    print "<div class=\"container\">".
	    "<div class=\"column text_right\">".$sLeftText."&nbsp;</div>".
	    "<div class=\"horizontal_line\">&nbsp;</div>".
	    "<div class=\"vertical_line\">".VERTICAL."</div>".
	    "<div class=\"column text_right\">".$sRightText."</div>".
	   "</div>";
}

function fDrawRightLineSubj($sRightText) {
    for($l=0; $l<5; $l++) {
	$sHorizontaLine .= HORIZONTAL;
    }
    $sLeftText="&nbsp;";

    print "<div class=\"container\">".
	    "<div class=\"column\">".$sLeftText."</div>".
	    "<div class=\"horizontal_line\">&nbsp;</div>".
	    "<div class=\"vertical_line\">".VERTICAL_RIGHT."</div>".
	    "<div class=\"horizontal_line\">".$sHorizontaLine."</div>".
	    "<div class=\"column text_left text_bold\">&nbsp;".$sRightText."</div>".
	   "</div>";
}

function fDrawRightLineText($sRightText) {
    for($l=0; $l<5; $l++) {
	$sHorizontaLine .= HORIZONTAL;
    }
    $sLeftText="&nbsp;";

    print "<div class=\"container\">".
	    "<div class=\"column\">".$sLeftText."</div>".
	    "<div class=\"horizontal_line\">&nbsp;</div>".
	    "<div class=\"vertical_line\">".VERTICAL."</div>".
	    "<div class=\"horizontal_line\">&nbsp;</div>".
	    "<div class=\"column\">&nbsp;".$sRightText."</div>".
	   "</div>";
}

?>

</div>
</body>
</html>