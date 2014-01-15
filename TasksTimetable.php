<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 * @category Piwik_Plugins
 * @package TasksTimetable
 */
namespace Piwik\Plugins\TasksTimetable;
use Piwik\Piwik;
use Piwik\Menu\MenuAdmin;

/**
 * @package TasksTimetable
 */
class TasksTimetable extends \Piwik\Plugin
{
    /**
     * @see Piwik\Plugin::getListHooksRegistered
     */
    public function getListHooksRegistered()
    {
        return array(
            'Menu.Admin.addItems' => 'addMenuItems',
        );
    }

    public function addMenuItems()
    {
        MenuAdmin::getInstance()->add(
        'CoreAdminHome_MenuDiagnostic',
        'Timetable',
        array('module' => 'TasksTimetable', 'action' => 'index'),
        $showOnlyIf = Piwik::isUserIsSuperUser(),
        $order = 6
    );
    }
}
