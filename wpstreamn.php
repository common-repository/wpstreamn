<?php
/*
Plugin Name: WPStreamN plugin
Plugin URI: http://www.streamn.com
Version: 2
Author: StreamN
Description: StreamN plugin to autogenerate streamn embed code.
Changelog: 20110402: Added support for flash based streaming
*/
if (!class_exists("WPStreamN")) {
    class WPStreamN{
    		var $width;
    		var $height;
    		var $streamurl;
    		var $playbyflash;
    		var $logopath;
    		var $ownerlink;
    		var $poster;
    		var $containerDivName;
    		
      function EmbedStreamN($atts){
        extract( shortcode_atts( array(
				  'width' => "640",
				  'height' => "480",
				  'stream_url' =>"",
				  'playbyflash' => "FALSE",
				  'playername' => "player-container",
				  'logopath' => "",
				  'ownerlink' => "",
				  'poster' => ""
				  ), $atts ) );
				  
			  $this->height = $height;
			  $this->width = $width;
			  $this->streamurl = $stream_url;
			  $this->playbyflash = $playbyflash;
			  $this->logopath = $logopath;
			  $this->ownerlink = $ownerlink;
			  $this->poster = $poster;
			  $this->containerDivName = $playername;

			  if ($this->playbyflash === "TRUE") {
			    $out =  '<div id="'.$this->containerDivName.'"></div>';
          $out .= '<script type="text/javascript">';
          $out .= "embedPlayer('$this->containerDivName', {\r\n";
          $out .= "    flashvars : {\r\n";
          $out .= "       'rtmp' : '$this->streamurl',\r\n";
          $out .= "       'autoplay' : true,\r\n";
          $out .= "       'showMetadata': true,\r\n";
          $out .= "       'showLiveCaption' : true,\r\n";
          $out .= "       'livelabelshowbg': false,\r\n";
          $out .= "       'showErrorInPlayer' : true,\r\n";
          $out .= "       'autoReconnect' : false";
          if ($this->logopath != "") {
            $out .= ",\r\n       'logopath' : '$this->logopath'";
          }
          if ($this->ownerlink != "") {
            $out .= ",\r\n       'ownerlink' : '$this->ownerlink'";
          }
          if ($this->poster != "") {
            $out .= ",\r\n       'poster': '$this->poster'";
          }
          $out .= "},\r\n";
          $out .= "    size : { width: $this->width, height: $this->height },\r\n";
          $out .= "    playerStyle : 'quick'\r\n";
          $out .= "});\r\n";
          $out .= "</script>";

        } else {
			    $out  = "<OBJECT id='mediaPlayer1' width='$this->width' height='$this->height'\r\n";
			    $out .= "classid='CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95'\r\n";
			    $out .= "codebase='http://activex.microsoft.com/activex/controls/ mplayer/en/nsmp2inf.cab#Version=5,1,52,701'\r\n";
			    $out .= "standby='Loading Microsoft Windows Media Player components...' type='application/x-oleobject'>\r\n"; 
			    $out .= "<param name='fileName' value='$this->streamurl'> \r\n"; 
			    $out .= "<param name='animationatStart' value='1'> \r\n";
			    $out .= "<param name='transparentatStart' value='1'> \r\n";
			    $out .= "<param name='autoStart' value='1'> \r\n";
			    $out .= "<param name='ShowControls' value='0'> \r\n";
			    $out .= "<param name='ShowDisplay' value='0'> \r\n";
			    $out .= "<param name='ShowStatusBar' value='1'> \r\n";
			    $out .= "<param name='loop' value='0\'> \r\n";
			    $out .= "<EMBED type='application/x-mplayer2' \r\n";
			    $out .= "pluginspage='http://microsoft.com/windows/mediaplayer/ en/download' \r\n";
			    $out .= "id='mediaPlayer1' name='mediaPlayer1' displaysize='4' autosize='1' \r\n";
			    $out .= "bgcolor='darkblue' showcontrols='0' showtracker='1' \r\n";
			    $out .= "showdisplay='0' showstatusbar='0' videoborder3d='0' width='$this->width' height='$this->height' \r\n";
			    $out .= "src='$this->streamurl' autostart='1' designtimesp='5311' loop='0'>\r\n";
			    $out .= "</EMBED>\r\n";
			    $out .= "</OBJECT>\r\n";			
			  }
      return $out;
      }
    }
} //End Class StreamN
function WPStreamN_wrapper($atts){
    $wpsn = new WPStreamN();
    return $wpsn->EmbedStreamN($atts);
}
function Load_StreamN_Javascript() {  
  wp_enqueue_script( 'streamnflash', "http://www.streamn.com/FlashPlayer/umsplayer.js", $deps, $ver, $in_footer );
} 
add_shortcode('WPStreamN','WPStreamN_wrapper');
add_action('init', 'Load_StreamN_Javascript' ); 

?>
