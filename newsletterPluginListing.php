<?php
/***
 * Newsletter Listing for The Newsletter Plugin
 * Created: 2025-08-05
 * Author: Melissa Hiatt
 * 
 * Description:
 * Displays a list of newsletters through a shortcode.
 * 
 * Requirements:
 * Install the Newsletter API through the Newsletter Addons Manager.
 * See instructions at:
 * https://www.thenewsletterplugin.com/documentation/developers/newsletter-api-2-authentication/
 * 
 * 
 ***/

function listNewsletters($atts){
	
	$a = shortcode_atts( array(
	'per_page' => '10',
	'page' => 1,
	'year' => 'false'
	), $atts );
	
	$endpoint = esc_url( home_url( '/wp-json/newsletter/v2/newsletters?per_page='.$a['per_page'].'&page='.$a['page']) );
	
	//Get the contents of the REST API Request
	$str = file_get_contents($endpoint);
	$data = json_decode($str, true);
	
	//output the results in a list with the link and subject

	if(is_array($data)):
		
		ob_start();

		$current_year = '';
		
		if($a['year'] == 'true'):
		
			$output = '<div class="newsletter_year">';

		else:

			$output = '<ul class="newsletter_list">';
		
		endif;


		foreach ($data as $newsletter):

	
			$newsletter_id = $newsletter['id'];
			$newsletter_title = $newsletter['subject'];
			$url = esc_url( home_url( '/na?id='.$newsletter_id) );
			$date = $newsletter['sent_on'];
			$newsletter_year = date('Y', strtotime($date)); 

			if($a['year'] == 'true' && $current_year != '' && $newsletter_year < $current_year){
				
				$output .= '</ul></div>';
               			$output .= '<div class="newsletter_year">';
				
			}


			if($a['year'] == 'true' && ($current_year == '' || $newsletter_year < $current_year) ):

				$output .= '<h3>'.$newsletter_year.'</h3>';
				$output .= '<ul class="newsletter_list">';

				$current_year = $newsletter_year;
			
			endif;
			

			$output .= '<li><a href="'.$url.'" target="_blank">'.$newsletter_title.'</a></li>'; //opens in new tab
			

		endforeach;

		if($a['year'] == "false"): 
			
			$output .= '</ul>';
		
		endif;

		$output .= ob_get_clean();

		echo $output;
	
	endif;
	
}

/**
 * Shortcode
 * Usage: [newsletterList] //defaults to the latest 10 newsletters
 * @atts per_page = {number} //number of items to show. Defaults to 10.
 * @atts page = {number} //current page to show. Defaults to 1.
 * @atts year = {true/false} //true if you want to separate list by year. Defaults to 'false'.
 * 
 * Example: [newsletterList per_page=5 page=2] //will show the 6th-10th newsletters
 * 
 **/


add_shortcode( 'newsletterList', 'listNewsletters' );
