=== Plugin Name ===
Contributors: wpwizard
Donate link: http://www.streamn.com/
Tags: streamn, flash, streaming media
Requires at least: 3.0.0
Tested up to: 3.1
Stable tag: trunk

A shortcode to allow creation of streamN content in posts.

== Description ==

A shortcode to allow creation of streamN content in posts or pages using either mms based streamN content or flash based.

== Installation ==

1. Download the source code, upload to `/wp-content/plugins/` directory and activate.

== Frequently Asked Questions ==

= How do I embed standard StreamN content =
To create standard StreamN object use: [WPStreamN width="320" height="240" stream_url="mms://streamnip:5119/streamncontent"]

= How do I embed flash based StreamN content =
1. To create flash based version use [WPStreamN width="320" height="240" stream_url="rtmp://streamnip:5119/bluemoon1" playbyflash="TRUE" ]
1. Optional parameters for playback by flash are: playername, logopath, ownerlink and poster. 

If you are adding more than one flash based streamN on a page, you must give each instance a unique playername e.g.:
[WPStreamN width="320" height="240" stream_url="rtmp://streamnip:5119/bluemoon1" playbyflash="TRUE" playername="flashplayer1"]
[WPStreamN width="320" height="240" stream_url="rtmp://streamnip:5119/bluemoon1" playbyflash="TRUE" playername="flashplayer2"]

== Changelog ==

= 2.0 =
* Added flash support

== Upgrade Notice ==
