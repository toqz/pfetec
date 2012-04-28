<?php

/*

Plugin Name: WP-Ecommerce Products Search Widget

Plugin URI: 

Description: Adds a Customizable Search Widget for WP-Ecommerce Products to give you more control over how the search box looks on your sidebar. 

Version: 1.0.1

Author: Gregory RAJKOVIC

Author URI: http://www.broz.fr

*/

/*  

	Copyright 2009  (email : contact@broz.fr)



    This program is free software; you can redistribute it and/or modify

    it under the terms of the GNU General Public License as published by

    the Free Software Foundation; either version 2 of the License, or

    (at your option) any later version.



    This program is distributed in the hope that it will be useful,

    but WITHOUT ANY WARRANTY; without even the implied warranty of

    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

    GNU General Public License for more details.



    You should have received a copy of the GNU General Public License

    along with this program; if not, write to the Free Software

    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/
if (!function_exists("htmlspecialchars_decode")) {
	function htmlspecialchars_decode($string,$style=ENT_COMPAT){
        $translation = array_flip(get_html_translation_table(HTML_SPECIALCHARS,$style));
        if($style === ENT_QUOTES){ $translation['&#039;'] = '\''; }
        return strtr($string,$translation);
    }
}

function widget_wpecommerce_search_init() {

	if (!function_exists('register_sidebar_widget')) {

		return;

	}
	
function widget_wpecommerce_search($args) {
    extract($args);
	
	$options = get_option('widget_wpecommerce_search');

	$title = htmlspecialchars($options['title'], ENT_QUOTES);
	$title = empty($options['title']) ? __('Search') : $options['title'];
	
	$input = htmlspecialchars($options['input'], ENT_NOQUOTES);
	
	$size = htmlspecialchars($options['size'], ENT_NOQUOTES);
	
	$other_text_mods = htmlspecialchars($options['other_text_mods'], ENT_QUOTES);
	
	$wrap_button = htmlspecialchars($options['wrap_button'], ENT_NOQUOTES);
	
	$button_type = htmlspecialchars($options['button_type'], ENT_NOQUOTES);
	
	$button_value = htmlspecialchars($options['button_value'], ENT_QUOTES);
	
	$other_button_mods = htmlspecialchars($options['other_button_mods'], ENT_QUOTES);
	

	
	if($wrap_button==1)
	{
	$button_placement = '';
	}
	else
	{
	$button_placement = '</td><td valign="bottom">';
	}
	

	
		
?>
        <?php echo $before_widget; ?>
            <?php echo $before_title
                . $title
                . $after_title; ?>

			<form method='GET' name='product_search' id="productsearchform" action="<?php bloginfo('home');  ?>/">
			<div>
			<?php if($wrap_button==0){ ?>
			<table cellspacing="5">
			<td valign="center">
			<?php } ?>
			<input type='hidden' id='view_type' name='view_type' value='grid'>
            <input type="text" value="<?php if($input==1){
					if(function_exists('the_search_query')) 
					{
					the_search_query();
					}
				} ?>" name="product_search" size="<?php echo $size; ?>" <?php if(strstr($other_text_mods, "id=") || strstr($other_text_mods, "style=")) { echo htmlspecialchars_decode($other_text_mods, ENT_QUOTES); } else { echo 'id="wpsc_search_autocomplete"'; } ?> /><?php echo $button_placement; ?><input type="<?php 
				if($button_type==1)
				{
				echo 'image" src="';
				bloginfo('stylesheet_directory');
				if (substr($button_value, 0) == "/"){
				echo $button_value;
				}
				else {
				echo '/' . $button_value;
				}
				}
				else
				{
				echo 'submit" value="' . $button_value;
				} 
				?>" <?php echo htmlspecialchars_decode($other_button_mods, ENT_QUOTES); ?> />
			<?php if($wrap_button==0){ ?>
			</td>
			</table>
			<?php } ?>
			</div>

			</form>

        <?php echo $after_widget; ?>
<?php
}

function widget_wpecommerce_search_control() {
	$options = get_option('widget_wpecommerce_search');
	if ( !is_array($options) )
		$options = array('title'=>__('Search'), 'input' => 0, 'size' => 15, 'other_text_mods' => '', 'wrap_button' => 1, 'button_type' => __('0'), 'button_value' => __('Search'), 'other_button_mods' => '');
	if ( $_POST['wpecommerce-search-submit'] ) {
		$options['title'] = strip_tags(stripslashes($_POST['wpecommerce-search-title']));
		$options['input'] = intval($_POST['wpecommerce-search-input']);
		$options['size'] = intval($_POST['wpecommerce-search-size']);
		$options['other_text_mods'] = strip_tags(stripslashes($_POST['wpecommerce-search-other_text_mods']));
		$options['wrap_button'] = intval($_POST['wpecommerce-search-wrap_button']);
		$options['button_type'] = intval($_POST['wpecommerce-search-button_type']);
		$options['button_value'] = strip_tags(stripslashes($_POST['wpecommerce-search-button_value']));
		$options['other_button_mods'] = strip_tags(stripslashes($_POST['wpecommerce-search-other_button_mods']));
		update_option('widget_wpecommerce_search', $options);
	}
	
	//Set values
	$title = htmlspecialchars($options['title'], ENT_QUOTES);
	$title = empty($options['title']) ? __('Search') : $options['title'];
	
	$input = htmlspecialchars($options['input'], ENT_NOQUOTES);
	
	$size = htmlspecialchars($options['size'], ENT_NOQUOTES);
	
	$other_text_mods = htmlspecialchars($options['other_text_mods'], ENT_QUOTES);
	
	$wrap_button = htmlspecialchars($options['wrap_button'], ENT_NOQUOTES);
	
	$button_type = htmlspecialchars($options['buttton_type'], ENT_NOQUOTES);
	
	$button_value = htmlspecialchars($options['button_value'], ENT_QUOTES);
	
	$other_button_mods = htmlspecialchars($options['other_button_mods'], ENT_QUOTES);

	
	//Display Admin Options
	
	echo '<p style="text-align:left;"><label for="wpecommerce-search-title">' . __('Title:') . ' <br /><input style="width: 200px;" id="wpecommerce-search-title" name="wpecommerce-search-title" type="text" value="'.$title.'" /></label></p>';
	echo '<p style="text-align:left;"><label for="wpecommerce-search-input">' . __('Remember User Input in Text Box:') . '  <br /><select id="wpecommerce-search-input" name="wpecommerce-search-input" size="1">'."\n";
	echo '<option value="0"';
	selected('0', $options['input']);
	echo '>No</option>'."\n";
	echo '<option value="1"';
	selected('1', $options['input']);
	echo '>Yes</option>'."\n";
	echo '</select></p>'."\n" . '</label></p>';
	echo '<p style="text-align:left;"><label for="wpecommerce-search-size">' . __('Size of Search Box:') . '  <br /><input style="width: 50px;" id="wpecommerce-search-size" name="wpecommerce-search-size" type="text" value="'.$size.'" /></label></p>';
	echo '<p style="text-align:left;"><label for="wpecommerce-search-other_text_mods">' . __('Other Textbox Stylizing Modifications'. "\n" .'(i.e. id="textbox", etc):') . '  <br /><input style="width: 230px;" id="wpecommerce-search-other_text_mods" name="wpecommerce-search-other_text_mods" type="text" value="'.$other_text_mods.'" /></label></p>';
	echo '<p style="text-align:left;"><label for="wpecommerce-search-wrap_button">' . __('Button Placement:') . '  <br /><select id="wpecommerce-search-wrap_button" name="wpecommerce-search-wrap_button" size="1">'."\n";
	echo '<option value="0"';
	selected('0', $options['wrap_button']);
	echo '>Button Beside Textbox</option>'."\n";
	echo '<option value="1"';
	selected('1', $options['wrap_button']);
	echo '>Button Below Textbox</option>'."\n";
	echo '</select></p>'."\n" . '</label></p>';
	echo '<p style="text-align:left;"><label for="wpecommerce-search-button_type">' . __('Button Type:') . '  <br /><select id="wpecommerce-search-button_type" name="wpecommerce-search-button_type" size="1">'."\n";
	echo '<option value="0"';
	selected('0', $options['button_type']);
	echo '>Normal Button</option>'."\n";
	echo '<option value="1"';
	selected('1', $options['button_type']);
	echo '>Image Button</option>'."\n";
	echo '</select></p>'."\n" . '</label></p>';
	echo '<p style="text-align:left;"><label for="wpecommerce-search-button_value">' . __('Value Modifying Above Button Type (Either Text Displayed in Button or Path to Image Located in Theme Folder):') . '  <br /><input style="width: 230px;" id="wpecommerce-search-button_value" name="wpecommerce-search-button_value" type="text" value="'.$button_value.'" /></label></p>';
	echo '<p style="text-align:left;"><label for="wpecommerce-search-other_button_mods">' . __('Other Button Stylizing Modifications (i.e. id="button", etc):') . '  <br /><input style="width: 230px;" id="wpecommerce-search-other_button_mods" name="wpecommerce-search-other_button_mods" type="text" value="'.	$other_button_mods .'" /></label></p>';
	echo '<input type="hidden" id="wpecommerce-search-submit" name="wpecommerce-search-submit" value="1" />';
}
	register_sidebar_widget(array('WP-Ecommerce Search', 'widgets'), 'widget_wpecommerce_search');
	register_widget_control(array('WP-Ecommerce Search', 'widgets'), 'widget_wpecommerce_search_control', 250);
	
}
	
add_action('widgets_init', 'widget_wpecommerce_search_init');

?>