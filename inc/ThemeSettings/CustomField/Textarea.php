<?php 

namespace GMO\ThemeSettings\CustomField;
use GMO\ThemeSettings\CustomField\AbstractField;

class Textarea extends AbstractField
{	
	public function render( $args = []){
		/* turns arguments array into variables */
	    extract( $args );
	    /* verify a description */
	    $has_desc = $field_desc ? true : false;
	    
	    /* format setting outer wrapper */
	    echo '<div class="format-setting type-textarea ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . ' fill-area">';
	      
	      /* description */
	      echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
	      
	      /* format setting inner wrapper */
	      echo '<div class="format-setting-inner">';
	      
	        /* build textarea */
	        wp_editor(
	          $field_value, 
	          esc_attr( $field_id ), 
	          array(
	            'editor_class'  => esc_attr( $field_class ),
	            'wpautop'       => apply_filters( 'ot_wpautop', false, $field_id ),
	            'media_buttons' => apply_filters( 'ot_media_buttons', true, $field_id ),
	            'textarea_name' => esc_attr( $field_name ),
	            'textarea_rows' => esc_attr( $field_rows ),
	            // 'tinymce'       => apply_filters( 'ot_tinymce', true, $field_id ),
	            'tinymce'       => false,
	            'quicktags'     => apply_filters( 'ot_quicktags', array( 'buttons' => 'strong,em,link,block,del,ins,img,ul,ol,li,code,spell,close' ), $field_id )
	          )
	        );
	        
	      echo '</div>';
	    
	    echo '</div>';
	    if ( 'list-item' == $field_std) {

	    	echo '<input type="hidden" class="bas-set-list-name" data-id="'. $field_id .'" data-class="'. $field_class .'" data-name="'. $field_name .'" />';
	    }
	}

}