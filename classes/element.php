<?php
// This file is part of the tool_certificate plugin for Moodle - http://moodle.org/
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

/**
 *
 * @package    certificateelement_username
 * @copyright  2025 Szabolcs Varhegyi <varhegyisz@cnw.hu>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace certificateelement_username;

/**
 *
 * @package    certificateelement_username
 * @copyright  2025 Szabolcs Varhegyi <varhegyisz@cnw.hu>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class element extends \tool_certificate\element {

    /**
     * Handles rendering the element on the pdf.
     *
     * @param \pdf $pdf the pdf object
     * @param bool $preview true if it is a preview, false otherwise
     * @param \stdClass $user the user we are rendering this for
     * @param \stdClass $issue the issue we are rendering
     */
    public function render($pdf, $preview, $user, $issue) {
        // The value to display on the PDF.
        $value = $user->username;

        $value = format_string($value, true, ['context' => \context_system::instance()]);
        \tool_certificate\element_helper::render_content($pdf, $this, $value);
    }

    /**
     * Render the element in html.
     *
     * This function is used to render the element when we are using the
     * drag and drop interface to position it.
     */
    public function render_html() {
        global $USER;

        // The value to display - we always want to show a value here so it can be repositioned.
        $value = $USER->username;

        $value = format_string($value, true, ['context' => \context_system::instance()]);
        return \tool_certificate\element_helper::render_html_content($this, $value);
    }

}
