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

use Piwik\View;
use Piwik\Option;

/**
 *
 * @package TasksTimetable
 */
class Controller extends \Piwik\Plugin\Controller
{

    public function index()
    {
        $view = new View('@TasksTimetable/index.twig');
        $this->setGeneralVariablesView($view);
        $view->tasks =  Option::get('TaskScheduler.timetable');
	    $view->tasks = unserialize($view->tasks);

        return $view->render();
    }
}



