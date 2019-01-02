<?php

/*
   ____  __      __    ___  _  _  ___    __   ____     ___  __  __  ___
  (  _ \(  )    /__\  / __)( )/ )/ __)  /__\ (_  _)   / __)(  \/  )/ __)
   ) _ < )(__  /(__)\( (__  )  (( (__  /(__)\  )(    ( (__  )    ( \__ \
  (____/(____)(__)(__)\___)(_)\_)\___)(__)(__)(__)    \___)(_/\/\_)(___/

   @author          Black Cat Development
   @copyright       2017 Black Cat Development
   @link            https://blackcat-cms.org
   @license         http://www.gnu.org/licenses/gpl.html
   @category        CAT_Modules
   @package         dashboard

*/

class dashboard_widget_stats extends \CAT\Addon\Widget
{
    /**
     *
     * @access public
     * @return
     **/
    public static function view($widget_id,$dashboard_id)
    {
        $temp_path   = CAT_ENGINE_PATH.'/temp';
        $widget_name = \CAT\Base::lang()->translate('Statistics');
        $data = array(
            'id'                => $widget_id,
            'installation_time' => \CAT\Helper\DateTime::getDateTime(\CAT\Registry::get('INSTALLATION_TIME')),
            'latest'            => \CAT\Helper\Page::getLastEdited(5),
        );

        // get page statistics (count by visibility)
        $pg = \CAT\Helper\Page::getPagesByVisibility();
        foreach( array_keys($pg) as $key )
        {
            $data['visibility'][$key] = count($pg[$key]);
        }

        // if ChartJS is available
        if(\CAT\Helper\Addons::isInstalled('lib_chartjs',null,'library')) {
            include_once CAT_ENGINE_PATH.'/modules/lib_chartjs/inc/class.chartjs.php';
            $data['chart'] = \CAT\Addon\ChartJS::getDoughnutchart(
                array(
                    'width'      => 250,
                    'height'     => 250,
                    'legend_pos' => 'right',
                    'data'       => array_values($data['visibility']),
                    'labels'     => array_keys($data['visibility']),
                    'id'         => 'visibilityChart',
                    'title'      => self::lang()->t('Pages by visibility'),
                    'responsive' => 'false',
                )
            );
        }

        self::tpl()->setPath(dirname(__FILE__).'/../templates/default');
        return self::tpl()->get('stats.tpl',$data);
    }   // end function view()
    
}