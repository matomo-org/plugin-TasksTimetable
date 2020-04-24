<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */
namespace Piwik\Plugins\TasksTimetable\tests\Fixtures;

use Piwik\Date;
use Piwik\Option;
use Piwik\Tests\Framework\Fixture;

class FakeTasksFixture extends Fixture
{
    public function setUp(): void
    {
        parent::setUp();

        self::updateDatabase();

        self::createWebsite("2012-01-01 00:00:00");

        $fakeTasks = array(
            'Piwik\Plugins\ExamplePlugin\Tasks.myTask' =>
                Date::factory("2012-01-02 02:33:45")->getTimestampUTC(),
            'Piwik\Plugins\CoreUpdater\Tasks.sendNotificationIfUpdateAvailable' =>
                Date::factory("2012-03-04 13:45:56")->getTimestampUTC(),
            'Piwik\Plugins\CorePluginsAdmin\Tasks.sendNotificationIfUpdatesAvailable' =>
                Date::factory("2012-02-12 15:12:10")->getTimestampUTC()
        );

        Option::set('TaskScheduler.timetable', serialize($fakeTasks));
    }
}