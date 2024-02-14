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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

namespace local_tracker_demo;

use core\event\course_restored;

/**
 * Events observer class.
 *
 * @package     local_tracker_demo
 * @copyright   2024 Catalyst IT Australia
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class observer {
    /**
     * Fire up a logic after the course is restored.
     *
     * @param \core\event\course_restored $event Event.
     */
    public static function handle_course_restored(course_restored $event): void {
        get_fast_modinfo($event->objectid);
    }
}
