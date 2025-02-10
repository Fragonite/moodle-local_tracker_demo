<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace local_tracker_demo;

use advanced_testcase;

/**
 * Unit tests for the markinganonymous assignment.
 *
 * @package     local_tracker_demo
 * @author      Alexander Van der Bellen <alexandervanderbellen@catalyst-au.net>
 * @copyright   2025 Catalyst IT Australia
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class markinganonymous_test extends advanced_testcase {
    /**
     * Set up before each test.
     */
    protected function setUp(): void {
        parent::setUp();
        $this->resetAfterTest();
    }

    /**
     * Test markinganonymous assignment.
     *
     * @covers \mod_assign\locallib::update_instance
     *
     * @return void
     */
    public function test_markinganonymous(): void {
        $this->setAdminUser();

        $course = $this->getDataGenerator()->create_course();

        // Set the data required for creating the module.
        $plugindata = (object) [
            'modulename' => 'assign',
            'course' => $course->id,
            'section' => 0,
            'visible' => true,
            'name' => 'Some assignment',
            'introeditor' => ['text' => 'Introduction', 'format' => 1, 'itemid' => 0],
            'duedate' => 0,
            'submissiondrafts' => 0,
            'requiresubmissionstatement' => 0,
            'sendnotifications' => 0,
            'sendlatenotifications' => 0,
            'cutoffdate' => 0,
            'gradingduedate' => 0,
            'allowsubmissionsfromdate' => 0,
            'grade' => 100,
            'completionsubmit' => 1,
            'teamsubmission' => 0,
            'requireallteammemberssubmit' => 0,
            'blindmarking' => 0,
            'markingworkflow' => 0,
            'markingallocation' => 0,
            'cmidnumber' => '',
        ];

        // Create the module.
        $moduleinfo = create_module($plugindata);

        // We need to redefine introeditor.
        $moduleinfo->introeditor = ['text' => 'Introduction', 'format' => 1, 'itemid' => 0];

        // Update the module. This will throw an undefined property error.
        $moduleinfo = update_module($moduleinfo);
    }
}
