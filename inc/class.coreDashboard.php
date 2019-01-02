<?php

/**
 *   @author          Black Cat Development
 *   @copyright       2013 - 2018 Black Cat Development
 *   @link            https://blackcat-cms.org
 *   @license         http://www.gnu.org/licenses/gpl.html
 *   @category        CAT_Modules
 *   @package         coreDashboard
 **/

namespace CAT\Addon;

use \CAT\Base as Base;

if(!class_exists('\CAT\Addon\coreDashboard',false))
{
    final class coreDashboard extends Tool
    {
        protected static $type        = 'tool';
        protected static $directory   = 'coreDashboard';
        protected static $name        = 'Dashboard';
        protected static $version     = '2.0.0';
        protected static $description = 'Contains the default dashboard widgets';
        protected static $author      = 'BlackCat Development';
        protected static $guid        = "7b632e4b-a001-48cd-a4d5-eecf0e9880e9";
        protected static $license     = "GNU General Public License";
    }
}