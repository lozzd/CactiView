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

# Path to Cacti (on your webserver, including the trailing slash) e.g. http://cactihost/cacti/
$cactipath = "https://admintools.last.fm/cacti/";
# Path to Ganglia (on your webserver, including the trailing slash) e.g. http://gangliahost/ganglia/
$gangliapath = "https://admintools.last.fm/ganglia/";


# Graph definitions
#
# Alter the lines below to take the graphs you wish to rotate. 
# You can define as many graphs as you wish. 

# CACTI: 
# For example, if the Cacti URL http://host/cacti/graph.php?action=view&local_graph_id=558&rra_id=all
# then your "cactiid" is 558. Then enter a title of your choosing to be display on the graph. e.g.
# array("source" => "cacti", "cactiid" => "558" , "title" => "Graph 3" ),

# GANGLIA:
# Choose a cluster, or a cluster and a host and enter the variables e.g. 
# array("source" => "ganglia", "cluster" => "Web Servers" , "title" => "Web Servers" ),
# or for a specific host in that cluster, exactly as it appears in Ganglia (including FQDN, if applicable)
# array("source" => "ganglia", "cluster" => "Web Servers", "host" => "www1.example.com", "title" => "www1" ),


$graphs = array (
array("source" => "ganglia", "cluster" => "Web Servers" , "title" => "Graph 1" ),
array("source" => "ganglia", "cluster" => "Web Servers", "host" => "www1" , "title" => "Graph 2" ),
array("source" => "cacti", "cactiid" => "558" , "title" => "Graph 3" ),
);


# Disable debugging
error_reporting(0);

?>
