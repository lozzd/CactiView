<?php

#########################################################################
#
#       CactiView v0.1 - Laurie Denness
#       http://laurie.denness.net - laurie@denness.net
#
#       Displays a section of Cacti graphs based on your selection.
#       Graphs rotate automatically every 20 seconds (default)
#
#       Configuration is available in config.php
#
#########################################################################


include("config.php");

header("Cache-Control: no-cache, must-revalidate");	
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

$numbergraphs = count($graphs);

?>

<html>
<head>
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<title>CactiView</title>

<script language="javascript">
var aTimer;
var i;
i = 1;
function setRepeater() {
	aTimer = window.setInterval("changePage();",<?php echo $timeout ?>);
	return false;
}

function changePage() {

	if (i==<?php echo $numbergraphs ?>) {
		i = 0;
	}

	mainframe.location='graphview.php?id=' + i;

	i++
}

setRepeater();

</script>


</head>




<FRAMESET COLS="*">
<FRAME SRC="graphview.php?id=0" NAME="mainframe">
</FRAMESET>


</html>
