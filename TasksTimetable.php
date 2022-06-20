<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\TasksTimetable;

/**
 *
 */
class TasksTimetable extends \Piwik\Plugin
{

    public function registerEvents()
    {
        return [
            'Translate.getClientSideTranslationKeys' => 'getClientSideTranslationKeys',
       ];
    }

    public function getClientSideTranslationKeys(&$translations)
    {
        $translations[] = 'TasksTimetable_ScheduledTasks';
        $translations[] = 'TasksTimetable_Introduction';
        $translations[] = 'General_Name';
        $translations[] = 'General_Date';
        $translations[] = 'TasksTimetable_NothingScheduled';
    }
}
