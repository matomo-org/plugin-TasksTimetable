<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\TasksTimetable;
use Piwik\Menu\MenuAdmin;
use Piwik\Piwik;

/**
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
            'TasksTimetable_ScheduledTasks',
            array('module' => 'TasksTimetable', 'action' => 'index'),
            $showOnlyIf = Piwik::hasUserSuperUserAccess(),
            $order = 6
        );
    }
}
