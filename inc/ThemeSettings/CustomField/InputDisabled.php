<?php 

namespace BookAwesome\ThemeSettings\CustomField;

use BookAwesome\ThemeSettings\CustomField\AbstractField;

class InputDisabled extends AbstractField
{	
	public function render( $args = [])
	{
	    extract( $args );
	    $desc = 'has-desc';
	    if (empty($field_desc)) {
	    	$desc = 'no-desc';
	    }
	    ?>
	    <div class="format-setting type-text <?php echo $desc; ?>">
	    	<div class="description">
	    		<?php echo isset($field_desc) ? esc_attr($field_desc) : ''; ?>
	    	</div>
	    	<div class="format-setting-inner">
	    		<input type="text" name="<?php echo isset($field_name) ? esc_attr($field_name) : ''; ?>" id="<?php echo isset($field_id) ? esc_attr($field_id) : ''; ?>" value="<?php echo isset($field_value) ? esc_attr($field_value) : ''; ?>" class="widefat option-tree-ui-input" readonly>
	    	</div>
	    </div>
	    
	    <?php
	}
}
