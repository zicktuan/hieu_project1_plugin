<?php

namespace GMO;
/**
 *
 * Class handle autoload module GMO
 *
 * @version 	1.0
 * @author 		LookAwesome
 * @package 	GMO
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GMOAutoload{

	private static $getInstance = null;

	/**
	 * $packagePrefix
	 * Array prefix namespace.
	 * @var string
	 */
	protected $packagePrefix = 'GMO\\';

	protected $dir = '';

	/**
	 * Get the instane of Autoload.
	 *
	 * @return object
	 */
	public static function getInstance() {
		if ( ! ( self::$getInstance instanceof self ) ) {
			self::$getInstance = new self();
		}
		return self::$getInstance;
	}

	public function __construct(){
		
		$this->dir = GMO_PLUGIN_DIR . 'inc/';
		$this->init();
	}

	public function init() {
		spl_autoload_register( array( $this, 'hanldeClass' ) );
	}

	/**
	 * hanldeClass
	 * Handle process namespace class.
	 *
	 * @param string $class Class namespace name
	 * @return mixed The mapped file name on success, or boolean false on
	 */
	public function hanldeClass( $class ){
		$pos 	= strrpos( $class, '\\' );

		if( false !== $pos) {
			$relativeClass 	= str_replace( $this->packagePrefix, '' , $class );

			if( false !== strpos($class,$this->packagePrefix) ){
				$mappedFile 	= $this->loadClass( $this->packagePrefix, $relativeClass );
			}
			
		}

		return false;
	}

	/**
	 * Load the mapped file for a namespace prefix and relative class.
	 *
	 * @param  string $prefix        The namespace prefix.
	 * @param  string $relativeClass The relative class name.
	 * @return mixed
	 */
	public function loadClass( $prefix, $relativeClass ){
		if ( $prefix !== $this->packagePrefix ) {
			return false;
		}

		$file = $this->dir . str_replace( '\\', '/', $relativeClass ) . '.php';
		
		if( file_exists( $file ) ) {
			require_once $file;
		}else{
			print '<div class="error">File: <strong>' . $file  . '</strong> Not found.</div>';
		}	
	}

}
