<?php
/*
Plugin Name: LUNA RADIO PLAYER
Plugin URI: https://radioplayer.luna-universe.com
Description: Native internet web radio player built in HTML5/jQuery/CSS for shoutcast 2, icecast2, radiojar, radionomy & radio.co. 
Version: 5.21.01.28
Author: Sodah
Author URI: https://www.sodah.de
Text Domain: wp_lunaradio
*/


/**
 * shortcode  
 * 
 *
 * @param  array $atts
 *
 * @return string
 */
function lunaradio_shortcode($atts=array()){	
    global $post;
    global $data;
    $id = lunaradio_default($atts['id'], "lunaradio".rand());
    $width = lunaradio_default($atts['width'], "100%");
    $height = lunaradio_default($atts['height'], "0px");
    $radiustopleft = lunaradio_default($atts['radiustopleft'], "0px");
    $radiustopright = lunaradio_default($atts['radiustopright'], "0px");
    $radiusbottomleft = lunaradio_default($atts['radiusbottomleft'], "0px");
    $radiusbottomright = lunaradio_default($atts['radiusbottomright'], "0px");
    $borderposition = lunaradio_default($atts['borderposition'], "none");
    $bordercolor = lunaradio_default($atts['bordercolor'], "#ffffff");
    $bordersize = lunaradio_default($atts['bordersize'], "0px");
    $token = lunaradio_default($atts['token'], "");
    $userinterface = lunaradio_default($atts['userinterface'], "small");
    $backgroundcolor = lunaradio_default($atts['backgroundcolor'], "rgba(0,0,0,0)");
    $fontcolor = lunaradio_default($atts['fontcolor'], "#ffffff");
    $hightlightcolor = lunaradio_default($atts['hightlightcolor'], "#5f87c5");
    $fontname = lunaradio_default($atts['fontname'], "");
    $googlefont = lunaradio_default($atts['googlefont'], "");
    $fontratio = lunaradio_default($atts['fontratio'], "0.4");
    $radioname = lunaradio_default($atts['radioname'], "");
    $scroll = lunaradio_default($atts['scroll'], "true");
    $coverimage = lunaradio_default($atts['coverimage'], "");
    $onlycoverimage = lunaradio_default($atts['onlycoverimage'], "");
    $coverstyle = lunaradio_default($atts['coverstyle'], "circle");
    $usevisualizer = lunaradio_default($atts['usevisualizer'], "fake");
    $visualizertype = lunaradio_default($atts['visualizertype'], "8");
    $itunestoken = lunaradio_default($atts['itunestoken'], "");
    $metadatatechnic = lunaradio_default($atts['metadatatechnic'], "php");
    $ownmetadataurl = lunaradio_default($atts['ownmetadataurl'], "");
    $corsproxy = lunaradio_default($atts['corsproxy'], "");
    $usestreamcorsproxy = lunaradio_default($atts['usestreamcorsproxy'], "false");
    $streamurl = lunaradio_default($atts['streamurl'], "");
    $streamtype = lunaradio_default($atts['streamtype'], "other");
    $icecastmountpoint = lunaradio_default($atts['icecastmountpoint'], "");
    $radionomyid = lunaradio_default($atts['radionomyid'], "");
    $radionomyapikey = lunaradio_default($atts['radionomyapikey'], "");
    $radiojarid = lunaradio_default($atts['radiojarid'], "");
    $radiocoid = lunaradio_default($atts['radiocoid'], "");
    $shoutcastpath = lunaradio_default($atts['shoutcastpath'], "");
    $shoutcastid = lunaradio_default($atts['shoutcastid'], "");
    $streamsuffix = lunaradio_default($atts['streamsuffix'], "");
    $metadatainterval = lunaradio_default($atts['metadatainterval'], "20000");
    $volume = lunaradio_default($atts['volume'], "90");
    $debug = lunaradio_default($atts['debug'], "false");
    $autoplay = lunaradio_default($atts['autoplay'], "false");
    $displayliveicon = lunaradio_default($atts['displayliveicon'], "true");
    $displayvisualizericon = lunaradio_default($atts['displayvisualizericon'], "true");
    $multicolorvisualizer = lunaradio_default($atts['multicolorvisualizer'], "false");
    $color1 = lunaradio_default($atts['color1'], "#e66c35");
    $color2 = lunaradio_default($atts['color2'], "#d04345");
    $color3 = lunaradio_default($atts['color3'], "#85a752");
    $color4 = lunaradio_default($atts['color4'], "#067dcc");
    $visualizeropacity = lunaradio_default($atts['visualizeropacity'], "0.4");


    $myborder = "border:";
    switch ($borderposition) {
        case "all":
            $myborder = "border: ".$bordersize." solid ".$bordercolor.";";
            break;
        case "none":
            $myborder = "border: none;" ;
            break;
        default:
            $myborder = "border-".$borderposition.": ".$bordersize." solid ".$bordercolor.";";
            break;
    }
    
	$content1 = "
	<div class='wp-lunaradio' id='".$id."' style='width:".$width."; height:".$height."; 
  -webkit-border-top-left-radius: ".$radiustopleft.";
  -webkit-border-top-right-radius: ".$radiustopright.";
  -webkit-border-bottom-right-radius: ".$radiusbottomright.";
  -webkit-border-bottom-left-radius: ".$radiusbottomleft.";
  -moz-border-radius-topleft: ".$radiustopleft.";
  -moz-border-radius-topright: ".$radiustopright.";
  -moz-border-radius-bottomright: ".$radiusbottomright.";
  -moz-border-radius-bottomleft: ".$radiusbottomleft.";
  border-top-left-radius: ".$radiustopleft.";
  border-top-right-radius: ".$radiustopright.";
  border-bottom-right-radius: ".$radiusbottomright.";
  border-bottom-left-radius: ".$radiusbottomleft.";
  ".$myborder."' 
  data-token='".$token."' 
  data-userinterface='".$userinterface."'   
  data-backgroundcolor='".$backgroundcolor."' 
  data-fontcolor='".$fontcolor."' 
  data-hightlightcolor='".$hightlightcolor."' 
  data-fontname='".$fontname."' 
  data-googlefont='".$googlefont."' 
  data-fontratio='".$fontratio."' 
  data-radioname='".$radioname."' 
  data-scroll='".$scroll."' 
  data-coverimage='".$coverimage."' 
  data-onlycoverimage='".$onlycoverimage."' 
  data-coverstyle='".$coverstyle."' 
  data-usevisualizer='".$usevisualizer."' 
  data-visualizertype='".$visualizertype."' 
  data-itunestoken='".$itunestoken."' 
  data-metadatatechnic='".$metadatatechnic."' 
  data-ownmetadataurl='".$ownmetadataurl."' 
  data-corsproxy='".$corsproxy."' 
  data-usestreamcorsproxy='".$usestreamcorsproxy."' 
  data-streamurl='".$streamurl."' 
  data-streamtype='".$streamtype."' 
  data-icecastmountpoint='".$icecastmountpoint."' 
  data-radionomyid='".$radionomyid."' 
  data-radionomyapikey='".$radionomyapikey."' 
  data-radiojarid='".$radiojarid."' 
  data-radiocoid='".$radiocoid."' 
  data-shoutcastpath='".$shoutcastpath."' 
  data-shoutcastid='".$shoutcastid."' 
  data-streamsuffix='".$streamsuffix."' 
  data-metadatainterval='".$metadatainterval."' 
  data-volume='".$volume."' 
  data-autoplay='".$autoplay."' 
  data-displayliveicon='".$displayliveicon."' 
  data-debug='".$debug."' 
  data-multicolorvisualizer='".$multicolorvisualizer."' 
  data-color1='".$color1."' 
  data-color2='".$color2."' 
  data-color3='".$color3."' 
  data-color4='".$color4."' 
  data-visualizeropacity='".$visualizeropacity."' 
  data-displayvisualizericon='".$displayvisualizericon."'>
  <div style='height: 0px; width:0px; overflow: hidden;'>  
  <a href='https://radioplayer.luna-universe.com' title='html Radio Player with real audio visualizer'>HTML5 RADIO PLAYER PLUGIN WITH REAL VISUALIZER</a> powered by <a href='https://www.sodah.de' title='wordpress webdesign Dexheim'>Sodah Webdesign Dexheim</a>
  </div>
  </div>
	";
	wp_reset_query();
	return $content1;
}



/**
 * Add links to admin plugins page.
 *
 * @param  array $links
 *
 * @return array
 */
function add_action_links_lunaradio( $links ) {
    $plugin_links = array(
        '<a href="https://radioplayer.luna-universe.com/documentation/wp/" target="_blank">Documentation</a>',
        '<a href="https://radioplayer.luna-universe.com/shortcode" target="_blank">Shortcode Generator</a>'
    );
    return array_merge( $links, $plugin_links );
}

/**
 * Add footer with scripts to site
 *
 * 
 *
 * 
 */
function lunaradio_footer() {
  	if(!wp_script_is('jquery')) { 
  		wp_enqueue_script('jquery',"//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js");   
  	}
  	if(!wp_script_is('lunaradio')) {
  		wp_enqueue_script('lunaradio',plugin_dir_url(__FILE__)."js/lunaradio.min.js");
	}
	if(!wp_script_is('initlunaradio')) {
		wp_enqueue_script('initlunaradio',plugin_dir_url(__FILE__)."js/initlunaradio.js");
	}
}


function lunaradio_default($myvalue, $mydefault){
    if (!isset($myvalue)){
        $myvalue = $mydefault;
    }
    return $myvalue;
}



add_action( 'wp_footer', 'lunaradio_footer'); 
add_shortcode("lunaradio", "lunaradio_shortcode");
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links_lunaradio' );
?>