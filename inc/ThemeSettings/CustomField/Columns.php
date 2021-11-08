<?php 

namespace BookAwesome\ThemeSettings\CustomField;

use BookAwesome\ThemeSettings\CustomField\AbstractField;

class Columns extends AbstractField
{	
	public function render( $args = [])
	{
		/* turns arguments array into variables */
	    extract( $args );
	    $tabContent = '';

	    foreach ($field_settings as $key => $field) {

	    	$tabElement = '';

			/* build the arguments array */
	        $_args = array(
	          'type'              => $field['type'],
	          'field_id'          => $field['id'],
	          'field_name'        => $field_name . '[' . $field['id'] . ']',
	          'field_value'       => isset( $field_value[$field['id']] ) ? $field_value[$field['id']] : '',
	          'field_desc'        => isset( $field['desc'] ) ? $field['desc'] : '',
	          'field_std'         => isset( $field['std'] ) ? $field['std'] : '',
	          'field_rows'        => isset( $field['rows'] ) ? $field['rows'] : 1,
	          'field_post_type'   => isset( $field['post_type'] ) && ! empty( $field['post_type'] ) ? $field['post_type'] : 'post',
	          'field_taxonomy'    => isset( $field['taxonomy'] ) && ! empty( $field['taxonomy'] ) ? $field['taxonomy'] : 'category',
	          'field_min_max_step'=> isset( $field['min_max_step'] ) && ! empty( $field['min_max_step'] ) ? $field['min_max_step'] : '0,100,1',
	          'field_class'       => isset( $field['class'] ) ? $field['class'] : '',
	          'field_condition'   => isset( $field['condition'] ) ? $field['condition'] : '',
	          'field_operator'    => isset( $field['operator'] ) ? $field['operator'] : 'and',
	          'field_choices'     => isset( $field['choices'] ) && ! empty( $field['choices'] ) ? $field['choices'] : array(),
	          'field_settings'    => isset( $field['settings'] ) && ! empty( $field['settings'] ) ? $field['settings'] : array(),
	        );

	       	ob_start();
	       	if( isset( $field['label'] ) ) {
	       		echo '<h4 class="label">'.$field['label'].'</h4>';
	       	}
	       	ot_display_by_type( $_args );
	        $tabElement .= ob_get_clean();

	    	$tabContent .= '<div class="bas-admin-setting-column-items" id="' . esc_attr(sanitize_title( $field['label'] )) . '">'.$tabElement.'</div>';
	    }

	    /* format setting outer wrapper */
	    echo '<div class="bas-admin-setting-column">'.$tabContent.'</div>';
	}
}
