/*!
 * Piwik - free/libre analytics platform
 *
 * Screenshot test for TasksTimetable main page.
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

describe("TasksTimetableReport", function () {
    this.timeout(0);

    this.fixture = "Piwik\\Plugins\\TasksTimetable\\tests\\Fixtures\\FakeTasksFixture";

    it('should load the tasks timetable correctly', function (done) {
        expect.screenshot('tasks_timetable').to.be.captureSelector('#content>*', function (page) {
            page.load("?module=TasksTimetable&action=index&idSite=1&period=day&date=yesterday");

            // remove time values that change on each test run
            page.evaluate(function () {
//                $('span.server-time').text('');
//                $('#content table td > span:contains("(in")').text('(in )');
            });
        }, done);
    });
});