<?php

namespace GMO\Help\Job;

/**
 * @author lookawesome team
 * @version 1.0
 * @package JobSettings
 *
 * Class function for job settings
 */

class JobSetting
{
    static $getInstance = null;

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

    public function getListPage()
    {
        $listReturn = [];
        $listPages = get_pages(array());
        for ($i = 0; $i < count($listPages); $i++) {
            $listReturn[] = [
                'value' => $listPages[$i]->ID,
                'label' => $listPages[$i]->post_title,
            ];
        }
        return $listReturn;
    }

    public function getListJobId()
    {
        global $GMOPlugin;
        $optionTheme = $GMOPlugin->themeSettings->getSettings();
        $jobListID = !empty($optionTheme['gmo_job_page_list']) ? $optionTheme['gmo_job_page_list'] : '';
        return $jobListID;
    }

}
