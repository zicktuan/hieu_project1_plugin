<?php 

namespace GMO\ThemeSettings\CustomField;

use GMO\ThemeSettings\CustomField\AbstractField;

class checkbox extends AbstractField
{	
	public function render( $args = [])
	{
		/* turns arguments array into variables */
	    extract( $args );
	    // print_r($args);
	    ?>
	    <input type="checkbox" name="<?php echo isset($field_name) ? esc_attr($field_name) : ''; ?>" id="<?php echo isset($field_id) ? esc_attr($field_id) : ''; ?>" value="true" <?php echo ( 'true' == $field_value ) ? 'checked="checked"' : ''; ?>>
	    <?php
	}
}
