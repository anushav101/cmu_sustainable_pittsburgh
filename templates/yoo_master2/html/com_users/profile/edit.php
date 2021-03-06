<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

// load user_profile plugin language
$lang = JFactory::getLanguage();
$lang->load( 'plg_user_profile', JPATH_ADMINISTRATOR);

require_once(JPATH_ROOT . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_gwc' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'gwc.php');
//require_once( JPATH_ROOT . DS . 'components' . DS . 'com_gwc' . DS . 'helpers' . DS . 'gwc.php' );
gwcHelper::getCompanies();
?>

<div id="system">
	
	<?php if ($this->params->get('show_page_heading')) : ?>
	<h1 class="title"><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	<?php endif; ?>

	<form class="register submission box style" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save'); ?>" method="post" enctype="multipart/form-data">
		
		<?php

		$fieldsets = $this->form->getFieldsets();

		$fieldsets = array_reverse($fieldsets);

		foreach ($fieldsets as $fieldset): ?>
			<?php $fields = $this->form->getFieldset($fieldset->name);?>
			<?php if (count($fields)): ?>
				
					<?php if (isset($fieldset->label)): ?>
					<legend><?php echo JText::_($fieldset->label); ?></legend>
					<?php endif;?>
					<?php foreach ($fields as $field): ?>
						<?php if ($field->hidden): ?>
							<?php echo $field->input; ?>
						<?php else: ?>
							<div><?php echo $field->label.$field->input; ?>
								<?php if (!$field->required && $field->type!='Spacer' && $field->name!='jform[username]'): ?>
									<span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL');?></span>
								<?php endif; ?>
							</div>
					<?php endif; ?>
					<?php endforeach; ?>
				
			<?php endif; ?>
		<?php break;?>
		<?php endforeach; ?>

		<div class="submit">
			<button class="validate" type="submit"><?php echo JText::_('JSUBMIT'); ?></button>
		</div>
		<input type="hidden" id="jform_company_name" name="jform_company_id" value="0" />
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="profile.save" />
		<?php echo JHtml::_('form.token'); ?>

	</form>

</div>