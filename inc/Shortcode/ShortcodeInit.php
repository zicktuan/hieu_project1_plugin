<?php
namespace GMO\Shortcode;

use GMO\Shortcode\Home\ShortCodeBg;
use GMO\Shortcode\Home\ShortCodeSection1;
use GMO\Shortcode\Home\ShortCodeMessageBox;
use GMO\Shortcode\Home\ShortCodeSlide;
use GMO\Shortcode\Home\ShortCodeInfoBanner;
use GMO\Shortcode\Home\ShortCodeCatProduct;
use GMO\Shortcode\Home\ShortCodeProduct;
use GMO\Shortcode\ShortCodeAbout;
use GMO\Shortcode\ShortCodeContact;
use GMO\Shortcode\ShortCodePost;

/**
 * @author lookawesome team
 * @version 1.0
 * @package Shortcode
 * 
 * Init shortcode for theme GMO
*/
class ShortcodeInit 
{
	function __construct() {
		add_action( 'plugins_loaded', array($this, 'includeTemplate') );
	}

	public function includeTemplate() {
		new ShortCodeBg($this);
		new ShortCodeSection1($this);
		new ShortCodeMessageBox($this);
		new ShortCodeSlide($this);
		new ShortCodeInfoBanner($this);
		new ShortCodeAbout($this);
		new ShortCodeContact($this);
		new ShortCodeProduct($this);
		new ShortCodePost($this);
		new ShortCodeCatProduct($this);
	}

	/**
	 * Get template path.
	 *
	 * @param  string $filename Filename with extension.
	 * @return string           Template path.
	 */
	public function locateTemplate( $filename ) {
		$theme_dir = apply_filters( 'gmo_shortcode_template_theme_dir', 'shortcodes/' );
		$plugin_path = GMO_PLUGIN_DIR . 'templates/shortcodes/';

		$path = '';

		if ( locate_template( $theme_dir . $filename ) ) {
			$path = locate_template( $theme_dir . $filename );
		} elseif ( file_exists( $plugin_path . $filename ) ) {
			$path = $plugin_path . $filename;
		}

		return apply_filters( 'gmo_shortcode_locate_template', $path, $filename );
	}
}
