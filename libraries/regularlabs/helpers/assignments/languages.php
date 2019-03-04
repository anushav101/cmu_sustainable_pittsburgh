<?php
/**
 * @package         Regular Labs Library
 * @version         18.9.3123
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2018 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

/* @DEPRECATED */

defined('_JEXEC') or die;

if (is_file(JPATH_LIBRARIES . '/regularlabs/autoload.php'))
{
	require_once JPATH_LIBRARIES . '/regularlabs/autoload.php';
}

require_once dirname(__DIR__) . '/assignment.php';

class RLAssignmentsLanguages extends RLAssignment
{
	public function passLanguages()
	{
		return $this->passSimple(JFactory::getLanguage()->getTag(), true);
	}
}