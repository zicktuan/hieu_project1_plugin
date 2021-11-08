<?php

namespace GMO\Params\Job;

use GMO\Help\Job\JobSetting;

/**
 * @author lookawesome team
 * @version 1.0
 * @package Tour
 *
 * Init module tour
 */
class Init
{
    static $getInstance = null;

    public $version = '1.0';

    protected $keyMethod = ['settingJob', 'enqueueScripts'];

    /**
     * Auto-load in-accessible properties on demand.
     *
     * @param mixed $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        if (in_array($key, $this->keyMethod)) {
            return $this->$key();
        }
    }

    public static function getInstance()
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }
        return self::$getInstance;
    }

    protected function __construct()
    {
    }

    public function init()
    {
    }

    public function settingJob()
    {
        return JobSetting::getInstance();
    }

    
}
