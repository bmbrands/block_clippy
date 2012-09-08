<?php
// This file is part of Moodle - http://moodle.org/
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

defined('MOODLE_INTERNAL') || die();

/**
 * Form for editing profile block settings
 *
 * @package    block
 * @subpackage myprofile
 * @copyright  2010 Remote-Learner.net
 * @author     Olav Jordan <olav.jordan@remote-learner.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_mycodex_edit_form extends block_edit_form {
	protected function specific_definition($mform) {
		global $CFG;
		$mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));

		$mform->addElement('text', 'config_title', get_string('configtitle', 'block_html'));
		$mform->setType('config_title', PARAM_MULTILANG);

		$editoroptions = array('maxfiles' => EDITOR_UNLIMITED_FILES, 'noclean'=>true, 'context'=>$this->block->context);
		$mform->addElement('editor', 'config_text', get_string('configcontent', 'block_html'), null, $editoroptions);
		$mform->addRule('config_text', null, 'required', null, 'client');
		$mform->setType('config_text', PARAM_RAW); // XSS is prevented when printing the block contents and serving files

	}
}