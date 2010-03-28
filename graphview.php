<?php

# Get the config
include("config.php");

# Get the requested graphid and store it in a somewhat more beautiful variable name
$id = $_GET['id'];

# Set up some variables 

if ($graphs[$id]['source'] == "cacti") {
	# The Cacti ID
	$cactigraph = $graphs[$id]['cactiid'];
}

if ($graphs[$id]['source'] == "ganglia") {
	# The Ganglia Cluster ID
	# A bit of magic here, if there is a host defined, stick the host in the cluster variable too.
	if(isset($graphs[$id]['host'])) {
		$gangliacluster = $graphs[$id]['cluster'] . "&h=" . $graphs[$id]['host'];
	} else {
		$gangliacluster = $graphs[$id]['cluster']; 
	}

}

# The title of the graph
$title = $graphs[$id]["title"];

# The title of the next graph, with some logic to set the next to the first if we run out of graphs
if ($id < (count($graphs) -1)) {
	$nexttitle = $graphs[$id+1]["title"];
} else {
	$nexttitle = $graphs[0]["title"];
}

if ($graphs[$id]['source'] == "cacti") {
	# Construct the URLs for Cacti
	$endtime = time(); 
	$starttime = time() - 43200;

	$twelvehour = "{$cactipath}graph_image.php?action=zoom&local_graph_id={$cactigraph}&rra_id=0&graph_height=970&graph_width=1085&graph_nolegend=1&graph_end={$endtime}&graph_start={$starttime}&view_type=tree&notitle=1"; 
	$week = "{$cactipath}graph_image.php?action=view&local_graph_id={$cactigraph}&rra_id=2&graph_height=255&graph_width=400&graph_nolegend=1&notitle=1";
	$month = "{$cactipath}graph_image.php?action=view&local_graph_id={$cactigraph}&rra_id=3&graph_height=255&graph_width=400&graph_nolegend=1&notitle=1";
	$year = "{$cactipath}graph_image.php?action=view&local_graph_id={$cactigraph}&rra_id=4&graph_height=255&graph_width=400&graph_nolegend=1&notitle=1";
}


if ($graphs[$id]['source'] == "ganglia") {
        # Construct the URLs for Ganglia

	$twelvehour = "{$gangliapath}graph.php?g=load_report&z=large&c={$gangliacluster}&m=load_one&r=hour&s=descending&hc=4&mc=2&width=1050&height=950";
	$week = "{$gangliapath}graph.php?g=cpu_report&z=medium&c={$gangliacluster}&m=load_one&r=hour&s=descending&hc=4&mc=2&width=400&height=220";
	$month = "{$gangliapath}graph.php?g=network_report&z=medium&c={$gangliacluster}&m=load_one&r=hour&s=descending&hc=4&mc=2&width=400&height=220";
	$year = "{$gangliapath}graph.php?g=mem_report&z=medium&c={$gangliacluster}&m=load_one&r=hour&s=descending&hc=4&mc=2&width=400&height=220";

}


?>

<html>
<head>
<title>CactiView - Graph View</title>
<style>
body { 
	margin: 0px;
	font-family: Tahoma, Helvetica, Verdana, Arial, sans-serif;
}
</style>
</head>


<body>

<table>
<tr>
	<td><img src="<?php echo $twelvehour; ?>"></td>
	<td valign="top"><img src="<?php echo $week ?>">
	<img src="<?php echo $month ?>">
	<img src="<?php echo $year ?>">

         <div style="margin-top: 10px; font-size: 48px; text-align: center;"><?php echo date('j/n/y G:i T'); ?></div>
         <div style="font-size: 40px; text-align: center;"><?php echo date_format(date_create('now', timezone_open('EST')), 'j/n/y G:i T'); ?></div>

	</td>
</tr>
</table>

<div style="position: fixed; left: 100; width: 600; top: 30; font-size: 60px;"><?php echo $title;  ?></div>
<div style="position: fixed; left: 100; width: 600; top: 100; font-size: 30px;">Next: <?php echo $nexttitle  ?></div><br />
<div style="position: fixed; left: 1620; width: 30; top: 10;"><img src="ajax-loader.gif"></div><br />

</body>
</html>
