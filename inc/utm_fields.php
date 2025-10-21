<?php

function utm_scripts(){
	
	//wp_enqueue_script( 'utm_form', 'https://d12ue6f2329cfl.cloudfront.net/resources/utm_form-1.2.0.min.js', array(), '1.2.0', true );	
	wp_enqueue_script( 'utm_fields', IM_WPFUTM_PLUGIN_URL . 'js/utm_fields.js', array('jquery'), '1.0', true );	
	
	/*$url = get_bloginfo('url');
	$url_data = parse_url( $url );
	$re = '/www./m';
	$str = $url_data['host'];
	$subst = '.';
	$home_url = preg_replace($re, $subst, $str);
	$footerScript = '<script type="text/javascript" charset="utf-8">
	  var _uf = _uf || {};
	  _uf.domain = "'.$home_url.'";
	</script>';
	echo $footerScript;*/
}
add_action( 'wp_footer', 'utm_scripts' ); 


/**
 * Register the Smart Tag so it will be available to select in the form builder.
 *
 * @link   https://wpforms.com/developers/how-to-create-a-custom-smart-tag/
 */
 
function wpf_utm_fields_register_smarttag( $tags ) {
 
    // Key is the tag, item is the tag name.
    $tags[ 'utm_data' ] = 'UTM Data';
 
    return $tags;
}
add_filter( 'wpforms_smart_tags', 'wpf_utm_fields_register_smarttag', 10, 1 );
 
/**
 * Process the Smart Tag.
 *
 * @link   https://wpforms.com/developers/how-to-create-a-custom-smart-tag/
 */
 
function wpf_utm_fields_process_smarttag( $content, $tag ) {
 
    // Only run if it is our desired tag.
    if ( 'utm_data' === $tag ) {		
		$re = '/key="(.*)"/';
		$str = html_entity_decode($content);
		preg_match($re, $str, $matches, PREG_OFFSET_CAPTURE, 0);
		//var_dump($matches);
		$utm_key = htmlentities($matches[1][0]);		
		if(isset($_GET[$utm_key])){
			$source =  $_GET[$utm_key];
		} else {
			$source = '#cookieplaceholder-'.$utm_key;
		}
        // Replace the tag with our link.
        $content = $source; 
    } 
    return $content;
}
add_filter( 'wpforms_smart_tag_process', 'wpf_utm_fields_process_smarttag', 10, 2 );

?>