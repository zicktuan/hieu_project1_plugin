<?php

namespace GMO\Taxonomies;

// use GMO\Taxonomies\LocationTaxonomie;
use GMO\Taxonomies\ProductTaxonomie;
// use GMO\Taxonomies\SpecializedTaxonomie;

/**
 * @author Nguyen Anh Tuan
 * @version 1.0
 * @package taxonomie
 * 
 * Register taxonomie for theme GMO
 */
class TaxonomiesInit {

	public function __construct(){
		// new LocationTaxonomie;
		new ProductTaxonomie;
		// new SpecializedTaxonomie;
	}
}