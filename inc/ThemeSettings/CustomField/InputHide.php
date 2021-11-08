<?php 

namespace BookAwesome\ThemeSettings\CustomField;

use BookAwesome\ThemeSettings\CustomField\AbstractField;

class InputHide extends AbstractField
{	
	public function render( $args = [])
	{
		/* turns arguments array into variables */
	    extract( $args );
	    ?>
	    <input type="hidden" name="<?php echo isset($field_id) ? esc_attr($field_id) : ''; ?>" id="<?php echo isset($field_id) ? esc_attr($field_id) : ''; ?>" value="<?php echo isset($field_std) ? esc_attr($field_std) : ''; ?>">
	    <?php
	}
}
