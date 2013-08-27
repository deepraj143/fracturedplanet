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
	<legend><?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_LIMITS' ); ?></legend>
	<table class="admintable" cellspacing="1">
		<tbody>
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_LIMITS_NEW_MESSAGES_TIPS'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_LIMITS_NEW_MESSAGES' ); ?>
					</span>
				</td>
				<td valign="top">
					<input type="text" name="pmperday" value="<?php echo $this->config->get('pmperday');?>" size="4" /> <?php echo JText::_('COM_COMMUNITY_DAILY');?>
				</td>
			</tr>
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_LIMITS_NEW_GROUPS_TIPS'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_LIMITS_NEW_GROUPS' ); ?>
					</span>
				</td>
				<td valign="top">
					<input type="text" name="limit_groups_perday" value="<?php echo $this->config->get('limit_groups_perday');?>" size="4" /> <?php echo JText::_('COM_COMMUNITY_DAILY');?>
				</td>
			</tr>
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_LIMITS_NEW_PHOTOS_TIPS'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_LIMITS_NEW_PHOTOS' ); ?>
					</span>
				</td>
				<td valign="top">
					<input type="text" name="limit_photos_perday" value="<?php echo $this->config->get('limit_photos_perday');?>" size="4" /> <?php echo JText::_('COM_COMMUNITY_DAILY');?>
				</td>
			</tr>
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_LIMITS_NEW_VIDEOS_TIPS'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_LIMITS_NEW_VIDEOS' ); ?>
					</span>
				</td>
				<td valign="top">
					<input type="text" name="limit_videos_perday" value="<?php echo $this->config->get('limit_videos_perday');?>" size="4" /> <?php echo JText::_('COM_COMMUNITY_DAILY');?>
				</td>
			</tr>
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_LIMITS_NEW_FRIENDS_TIPS'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_LIMITS_NEW_FRIENDS' ); ?>
					</span>
				</td>
				<td valign="top">
					<input type="text" name="limit_friends_perday" value="<?php echo $this->config->get('limit_friends_perday');?>" size="4" /> <?php echo JText::_('COM_COMMUNITY_DAILY');?>
				</td>
			</tr>
                        <tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_LIMITS_NEW_FILES_TIPS'); ?>">
						<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_LIMITS_NEW_FILES' ); ?>
					</span>
				</td>
				<td valign="top">
					<input type="text" name="limit_files_perday" value="<?php echo $this->config->get('limit_files_perday');?>" size="4" /> <?php echo JText::_('COM_COMMUNITY_DAILY');?>
				</td>
			</tr>
		</tbody>
	</table>
</fieldset>