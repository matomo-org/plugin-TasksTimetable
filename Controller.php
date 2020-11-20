<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\TasksTimetable;

use Piwik\Common;
use Piwik\Date;
use Piwik\Metrics\Formatter;
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
            $tasks = Common::safe_unserialize($tasks);
        }

        if (empty($tasks)) {
            $tasks = array();
        } else {
            asort($tasks);
        }

        $tsNow      = Date::now()->getTimestamp();

        $formatter = new Formatter();

        $tasksFormatted = array();
        foreach ($tasks as $name => $timestamp) {
            $tasksFormatted[] = array(
                'name'          => $name,
                'executionDate' => $this->getFormattedDatetime($timestamp),
                'ts_difference' => $formatter->getPrettyTimeFromSeconds($timestamp - $tsNow)
            );
        }

        $view->currentTime = $this->getFormattedDatetime(Date::now()->getTimestampUTC());
        $view->tasks       = $tasksFormatted;

        return $view->render();

    }

    /**
     * @param $timestamp
     * @return string
     * @throws \Exception
     */
    protected function getFormattedDatetime($timestamp)
    {
        $dateFormat = Piwik::translate(Date::DATE_FORMAT_LONG);
        return Date::factory($timestamp)->getLocalized($dateFormat) . ' ' . Date::factory($timestamp)->getLocalized(' h:mm:ss');
    }
}



