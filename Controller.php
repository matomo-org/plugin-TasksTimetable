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

use Piwik\Date;
use Piwik\MetricsFormatter;
use Piwik\Piwik;
use Piwik\View;
use Piwik\Option;

/**
 *
 * @package TasksTimetable
 */
class Controller extends \Piwik\Plugin\ControllerAdmin
{

    public function index()
    {
        Piwik::checkUserIsSuperUser();

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

        $tsNow = Date::now()->getTimestamp();

        $tasksFormatted = array();
        foreach ($tasks as $name => $timestamp) {
            $tasksFormatted[] = array(
                'name'          => $name,
                'timestamp'     => $timestamp,
                'ts_difference' => MetricsFormatter::getPrettyTimeFromSeconds($timestamp - $tsNow)
            );
        }

        $view->tasks = $tasksFormatted;

        return $view->render();

    }
}



