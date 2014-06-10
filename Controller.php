<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\TasksTimetable;

use Piwik\Date;
use Piwik\MetricsFormatter;
use Piwik\Option;
use Piwik\Piwik;
use Piwik\View;

/**
 *
 */
class Controller extends \Piwik\Plugin\ControllerAdmin
{

    public function index()
    {
        Piwik::checkUserHasSuperUserAccess();

        $view = new View('@TasksTimetable/index.twig');
        $this->setGeneralVariablesView($view);

        $tasks = Option::get('TaskScheduler.timetable');

        if (!empty($tasks)) {
            $tasks = unserialize($tasks);
        }

        if (empty($tasks)) {
            $tasks = array();
        } else {
            asort($tasks);
        }

        $tsNow      = Date::now()->getTimestamp();
        $dateFormat = Piwik::translate('CoreHome_DateFormat') . ' %time%';

        $tasksFormatted = array();
        foreach ($tasks as $name => $timestamp) {
            $tasksFormatted[] = array(
                'name'          => $name,
                'executionDate' => Date::factory($timestamp)->getLocalized($dateFormat),
                'ts_difference' => MetricsFormatter::getPrettyTimeFromSeconds($timestamp - $tsNow)
            );
        }

        $view->serverTime = Date::now()->getLocalized($dateFormat);
        $view->tasks      = $tasksFormatted;

        return $view->render();

    }
}



