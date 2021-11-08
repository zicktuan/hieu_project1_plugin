<?php 

namespace BookAwesome\ThemeSettings\CustomField;

use BookAwesome\ThemeSettings\CustomField\AbstractField;

class TaxonomyCheckboxes extends AbstractField
{	
	public function render( $args = [])
	{

		/* turns arguments array into variables */
	    extract( $args );

    	$terms = get_terms( array(
			'taxonomy'   => $field_taxonomy,
			'hide_empty' => false,
		) );
		$argsItem = [];
		foreach ($terms as $value) {
			$argsL          = [];
			$argsL['label'] = $value->name;
			$argsL['value'] = $value->term_id;
			$argsItem[]     = $argsL;
		}
	    ?>

	    <div class="bas-taxo-field">
			<ul class="bas-taxo-inline">
				<?php
					if (!empty($field_value)) {
						$argsVal = explode(',', trim($field_value, ","));
						if (!empty($argsVal) && is_array($argsVal)) {
							foreach ($argsVal as $value) {
								$term = get_term( $value );
							?>
								<li class="bas-taxo-data">
									<span class="bas-taxo-label">
										<a><?php echo !empty($term->name) ? $term->name : ''; ?></a>
									</span>
									<a class="bas-taxo-remove" data-id="<?php echo $value; ?>">x</a>
								</li>
							<?php
							}
						}
					}
				?>
				<li class="bas-taxo-input">
					<input type="text" class="bas-taxo-search-input" placeholder="Click here and start typing...">
				</li>
			</ul>
			<ul class="bas-taxo-list" data-type="<?php echo isset($field_desc) ? esc_attr($field_desc) : ''; ?>" data-taxo="<?php echo isset($field_taxonomy) ? esc_attr($field_taxonomy) : ''; ?>">
			</ul>
			<textarea class="bas-taxo-data-args"><?php echo esc_attr( json_encode($argsItem) ); ?></textarea>
			<input type="hidden" name="<?php echo isset($field_name) ? esc_attr($field_name) : ''; ?>"  class="bas-taxo-value" value="<?php echo isset($field_value) ? esc_attr($field_value) : ''; ?>">
	    </div>
	    <?php
	}
}
