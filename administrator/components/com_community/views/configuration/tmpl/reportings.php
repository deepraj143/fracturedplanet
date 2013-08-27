<?php
/**
* @copyright (C) 2013 iJoomla, Inc. - All rights reserved.
* @license GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
* @author iJoomla.com <webmaster@ijoomla.com>
* @url https://www.jomsocial.com/license-agreement
* The PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
* More info at https://www.jomsocial.com/license-agreement
*/
// Disallow direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<fieldset class="adminform">
	<legend><?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_REPORTINGS' ); ?></legend>
	<table class="admintable" cellspacing="1">
		<tbody>
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_REPORTINGS_ENABLE_TIPS'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_REPORTINGS_ENABLE' ); ?>
					</span>
				</td>
				<td valign="top">
					<?php echo JHTML::_('select.booleanlist' , 'enablereporting' , null , $this->config->get('enablereporting') , JText::_('COM_COMMUNITY_YES_OPTION') , JText::_('COM_COMMUNITY_NO_OPTION') ); ?>
				</td>
			</tr>
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_REPORTINGS_EXECUTE_DEFAULT_TASK_TIPS'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_REPORTINGS_EXECUTE_DEFAULT_TASK' ); ?>
					</span>
				</td>
				<td valign="top">
					<input type="text" name="maxReport" style="text-align: center;" value="<?php echo $this->config->get('maxReport'); ?>" size="5" />
					<?php echo JText::_('COM_COMMUNITY_REPORTS');?>
				</td>
			</tr>
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_REPORTINGS_NOTIFICATION_EMAIL_TIPS'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_REPORTINGS_NOTIFICATION_EMAIL' ); ?>
					</span>
				</td>
				<td valign="top">
					<div><input type="text" name="notifyMaxReport" value="<?php echo $this->config->get('notifyMaxReport'); ?>" size="45" /></div>
					<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_REPORTINGS_NOTIFICATION_EMAIL_COMMA_SEPARATED');?>
				</td>
			</tr>
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_REPORTINGS_ALLOW_GUEST_TIPS'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_REPORTINGS_ALLOW_GUEST' ); ?>
					</span>
				</td>
				<td valign="top">
					<?php echo JHTML::_('select.booleanlist' , 'enableguestreporting' , null , $this->config->get('enableguestreporting') , JText::_('COM_COMMUNITY_ALLOWED_OPTION') , JText::_('COM_COMMUNITY_DISALLOWED_OPTION') ); ?>
				</td>
			</tr>
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_REPORTINGS_PREDEFINED_TEXT_TIPS'); ?>">
					<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_REPORTINGS_PREDEFINED_TEXT' ); ?>
					</span>
				</td>
				<td valign="top">
					<textarea name="predefinedreports" cols="30" rows="5"><?php echo $this->config->get('predefinedreports');?></textarea>
				</td>
			</tr>
		</tbody>
	</table>
</fieldset>