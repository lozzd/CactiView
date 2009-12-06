<?
#########################################################################
#
#       CactiView v0.1 - Laurie Denness
#       http://laurie.denness.net - laurie@denness.net
#
#       Displays a section of Cacti graphs based on your selection.
#       Graphs rotate automatically every 20 seconds (by default)
#
#       Configuration is available in config.php
#
#########################################################################

## CactiView configuration

# Time (in milliseconds) before the graphs will rotate automatically.
$timeout = 20000;

# Path to cacti (on your webserver, including the trailing slash) e.g. http://cactihost/cacti/
$cactipath = "http://host/cacti/";


# Graph definitions
#
# Alter the lines below to take the graphs you wish to rotate. 
# For example, if the Cacti URL http://host/cacti/graph.php?action=view&local_graph_id=558&rra_id=all
# then your "cactiid" is 558. Then enter a title of your choosing to be display on the graph. 
#
# You can define as many graphs as you wish. 

$graphs = array (
array("cactiid" => 1 , "title" => "Graph 1" ),
array("cactiid" => 2 , "title" => "Graph 2" ),
);


# Disable debugging
error_reporting(0);

?>
