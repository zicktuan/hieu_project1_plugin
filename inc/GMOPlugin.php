<?php

namespace GMO;

/**
 * @author Nguyen Anh Tuan
 * @version 1.0
 * @package GMO
 * 
 * Init plugin for theme gmo
*/
class GMOPlugin
{
    static $getInstance = null;

    public $version = '1.0';

    public static function getInstance()
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }
        return self::$getInstance;
    }

    protected function __construct(){
        $this->GMOPluginScripts();
        $this->loadModule();

        $this->init();
    }

    /**
     * GmoPluginScripts
     * Load script.
     *
     * @return void
     */
    protected function GMOPluginScripts()
    {
        require_once 'Classes/GmoPluginScripts.php';
        new Classes\BookAwesomePluginScripts;
    }


    public function init(){

        do_action('gmo_before_init');

        new PostType\PostTypeInit;
        new Taxonomies\TaxonomiesInit;

        $this->themeSetting();

        if ( in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            $this->shortcode = new Shortcode\ShortcodeInit;
        }

        $this->widgets = new Widgets\InitWidget;

        do_action('gmo_after_init');
    }

    public function themeSetting(){
        $this->themeSetting = new ThemeSettings\ThemeSettingInit;
    }

    /**
     * Job singleton load
     * @return void
     */
    public function job(){
        return Params\Job\Init::getInstance();
    }


    /**
     * load_module.
     * Load module for mayxaydung.
     */
    protected function loadModule()
    {
        require_once 'Autoload/GMOAutoload.php';

        do_action('gmo_load_module');
       
        GMOAutoload::getInstance();
    }
}

function GMOPlugin(){
    return GMOPlugin::getInstance();
}

$GLOBALS['GMOPlugin'] = GMOPlugin();