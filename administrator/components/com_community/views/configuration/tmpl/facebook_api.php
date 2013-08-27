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
	<legend><?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FACEBOOK_API' ); ?></legend>
	<a href="http://tiny.cc/jssysreq" target="_blank"><?php echo JText::_('COM_COMMUNITY_DOC_REQUIREMENT'); ?></a> | <a href="http://tiny.cc/jsfbsetup" target="_blank"><?php echo JText::_('COM_COMMUNITY_DOC_SETTING_UP'); ?></a>
	( <a href="http://tiny.cc/SetupFBConnect" target="_blank"><?php echo JText::_('COM_COMMUNITY_DOC_VIDEO'); ?></a> )
	<table class="admintable" cellspacing="1">
		<tbody>
			<tr>
				<td width="350" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FACEBOOK_API_KEY_TIPS'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FACEBOOK_API_KEY' ); ?>
					</span>
				</td>
				<td valign="top">
					<input type="text" name="fbconnectkey" value="<?php echo $this->config->get('fbconnectkey' , '' );?>" size="50" />
				</td>
			</tr>
			<tr>
				<td class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FACEBOOK_APPLICATION_SECRET_TIPS'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FACEBOOK_APPLICATION_SECRET' ); ?>
					</span>
				</td>
				<td valign="top">
					<input type="text" name="fbconnectsecret" value="<?php echo $this->config->get('fbconnectsecret' , '' );?>" size="50" />
				</td>
			</tr>
		</tbody>
	</table>
</fieldset>

<fieldset class="adminform">
	<legend><?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_JFBC' ); ?></legend>
	<a href="http://www.sourcecoast.com/" target="_blank"><?php echo JText::_('COM_COMMUNITY_ABOUT_SOURCECOAST'); ?></a> | <a href="http://tiny.cc/fn450w" target="_blank"><?php echo JText::_('COM_COMMUNITY_DOC_SETTING_UP'); ?></a>
	<table class="admintable" cellspacing="1">
		<tbody>
			<tr>
				<td class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_JFBC_LABEL'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_JFBC_LABEL' ); ?>
					</span>
				</td>
				<td valign="top">
					<?php echo JHTML::_('select.booleanlist' , 'usejfbc' , null , $this->config->get( 'usejfbc') , JText::_('COM_COMMUNITY_YES_OPTION') , JText::_('COM_COMMUNITY_NO_OPTION') ); ?>
				</td>
			</tr>
		</tbody>
	</table>
</fieldset>