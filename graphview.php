<?php

# Get the config
include("config.php");

# Get the requested graphid and store it in a somewhat more beautiful variable name
$id = $_GET['id'];

# Set up some variables 
# The Cacti ID
$cactigraph = $graphs[$id]['cactiid'];
# The title of the graph
$title = $graphs[$id]["title"];

# The title of the next graph, with some logic to set the next to the first if we run out of graphs
if ($id < (count($graphs) -1)) {
	$nexttitle = $graphs[$id+1]["title"];
} else {
	$nexttitle = $graphs[0]["title"];
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
	<td><img src="<?php echo $cactipath ?>graph_image.php?action=zoom&local_graph_id=<?php echo $cactigraph ?>&rra_id=0&graph_height=970&graph_width=1085&graph_nolegend=1&graph_end=<?php echo time(); ?>&graph_start=<?php echo time() - 43200; ?>&view_type=tree&notitle=1"></td>
	<td valign="top"><img src="<?php echo $cactipath ?>graph_image.php?action=view&local_graph_id=<?php echo $cactigraph ?>&rra_id=2&graph_height=255&graph_width=400&graph_nolegend=1&notitle=1">
	<img src="<?php echo $cactipath ?>graph_image.php?action=view&local_graph_id=<?php echo $cactigraph ?>&rra_id=3&graph_height=255&graph_width=400&graph_nolegend=1&notitle=1">
	<img src="<?php echo $cactipath ?>graph_image.php?action=view&local_graph_id=<?php echo $cactigraph ?>&rra_id=4&graph_height=255&graph_width=400&graph_nolegend=1&notitle=1">

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
