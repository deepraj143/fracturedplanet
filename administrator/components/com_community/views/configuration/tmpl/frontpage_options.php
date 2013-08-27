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
	<legend><?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_DISPLAY_FRONTPAGE' ); ?></legend>
	<table class="admintable" cellspacing="1">
		<tbody>
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FRONTPAGE_ACTIVITIES_COUNT_TIPS'); ?>">
					<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_ACTIVITIES_COUNT' ); ?>
					</span>
				</td>
				<td valign="top">
					<input type="text" name="maxactivities" value="<?php echo $this->config->get('maxactivities');?>" size="4" /> 
				</td>
			</tr>
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FRONTPAGE_DEFAULT_ACTIVITY_FILTER_TIPS'); ?>">
					<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_DEFAULT_ACTIVITY_FILTER' ); ?>
					</span>
				</td>
				<td valign="top">
					<select name="frontpageactivitydefault">
						<option <?php echo ( $this->config->get('frontpageactivitydefault') == 'all' ) ? 'selected="true"' : ''; ?> value="all"><?php echo JText::_('COM_COMMUNITY_SHOW_ALL_OPTION');?></option>
						<option <?php echo ( $this->config->get('frontpageactivitydefault') == 'friends' ) ? 'selected="true"' : ''; ?> value="friends"><?php echo JText::_('COM_COMMUNITY_USER_AND_FRINEDS_OPTION');?></option>
					</select>
				</td>
			</tr>

			<!--tr>
				<td width="300" class="key">
					<span class="hasTip" title="<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_SEARCH' ); ?>::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_SEARCH_TIPS'); ?>">
					<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_SEARCH' ); ?>
					</span>
				</td>
				<td valign="top">
					<select name="showsearch">
						<option <?php echo ( $this->config->get('showsearch') == '0' ) ? 'selected="true"' : ''; ?> value="0"><?php echo JText::_('COM_COMMUNITY_HIDE_OPTION');?></option>
						<option <?php echo ( $this->config->get('showsearch') == '1' ) ? 'selected="true"' : ''; ?> value="1"><?php echo JText::_('COM_COMMUNITY_SHOW_OPTION');?></option>
						<option <?php echo ( $this->config->get('showsearch') == '2' ) ? 'selected="true"' : ''; ?> value="2"><?php echo JText::_('COM_COMMUNITY_MEMBERSONLY_OPTION');?></option>
					</select>
				</td>
			</tr-->
			<!--tr>
				<td width="300" class="key">
					<span class="hasTip" title="<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_ONLINE_MEMBERS' ); ?>::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_ONLINE_MEMBERS_TIPS'); ?>">
					<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_ONLINE_MEMBERS' ); ?>
					</span>
				</td>
				<td valign="top">
					<select name="showonline">
						<option <?php echo ( $this->config->get('showonline') == '0' ) ? 'selected="true"' : ''; ?> value="0"><?php echo JText::_('COM_COMMUNITY_HIDE_OPTION');?></option>
						<option <?php echo ( $this->config->get('showonline') == '1' ) ? 'selected="true"' : ''; ?> value="1"><?php echo JText::_('COM_COMMUNITY_SHOW_OPTION');?></option>
						<option <?php echo ( $this->config->get('showonline') == '2' ) ? 'selected="true"' : ''; ?> value="2"><?php echo JText::_('COM_COMMUNITY_MEMBERSONLY_OPTION');?></option>
					</select>
				</td>
			</tr-->
			<!--tr>
				<td width="300" class="key">
					<span class="hasTip" title="<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_MEMBERS' ); ?>::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_MEMBERS_TIPS'); ?>">
					<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_MEMBERS' ); ?>
					</span>
				</td>
				<td valign="top">
					<select name="showlatestmembers">
						<option <?php echo ( $this->config->get('showlatestmembers') == '0' ) ? 'selected="true"' : ''; ?> value="0"><?php echo JText::_('COM_COMMUNITY_HIDE_OPTION');?></option>
						<option <?php echo ( $this->config->get('showlatestmembers') == '1' ) ? 'selected="true"' : ''; ?> value="1"><?php echo JText::_('COM_COMMUNITY_SHOW_OPTION');?></option>
						<option <?php echo ( $this->config->get('showlatestmembers') == '2' ) ? 'selected="true"' : ''; ?> value="2"><?php echo JText::_('COM_COMMUNITY_MEMBERSONLY_OPTION');?></option>
					</select>
				</td>
			</tr-->
			<!--tr>
				<td width="300" class="key">
					<span class="hasTip" title="<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_EVENTS' ); ?>::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_EVENTS_TIPS'); ?>">
					<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_EVENTS' ); ?>
					</span>
				</td>
				<td valign="top">
					<select name="frontpage_latest_events">
						<option <?php echo ( $this->config->get('frontpage_latest_events') == '0' ) ? 'selected="true"' : ''; ?> value="0"><?php echo JText::_('COM_COMMUNITY_HIDE_OPTION');?></option>
						<option <?php echo ( $this->config->get('frontpage_latest_events') == '1' ) ? 'selected="true"' : ''; ?> value="1"><?php echo JText::_('COM_COMMUNITY_SHOW_OPTION');?></option>
						<option <?php echo ( $this->config->get('frontpage_latest_events') == '2' ) ? 'selected="true"' : ''; ?> value="2"><?php echo JText::_('COM_COMMUNITY_MEMBERSONLY_OPTION');?></option>
					</select>
				</td>
			</tr-->
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_ACTIVITY_STREAM_TIPS'); ?>">
					<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_ACTIVITY_STREAM' ); ?>
					</span>
				</td>
				<td valign="top">
					<select name="showactivitystream">
						<option <?php echo ( $this->config->get('showactivitystream') == '0' ) ? 'selected="true"' : ''; ?> value="0"><?php echo JText::_('COM_COMMUNITY_HIDE_OPTION');?></option>
						<option <?php echo ( $this->config->get('showactivitystream') == '1' ) ? 'selected="true"' : ''; ?> value="1"><?php echo JText::_('COM_COMMUNITY_SHOW_OPTION');?></option>
						<option <?php echo ( $this->config->get('showactivitystream') == '2' ) ? 'selected="true"' : ''; ?> value="2"><?php echo JText::_('COM_COMMUNITY_MEMBERSONLY_OPTION');?></option>
					</select>
				</td>
			</tr>

			<!--tr>
				<td width="300" class="key">
					<span class="hasTip" title="<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_VIDEOS' ); ?>::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_VIDEOS_TIPS'); ?>">
					<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_VIDEOS' ); ?>
					</span>
				</td>
				<td valign="top">
					<select name="showlatestvideos">
						<option <?php echo ( $this->config->get('showlatestvideos') == '0' ) ? 'selected="true"' : ''; ?> value="0"><?php echo JText::_('COM_COMMUNITY_HIDE_OPTION');?></option>
						<option <?php echo ( $this->config->get('showlatestvideos') == '1' ) ? 'selected="true"' : ''; ?> value="1"><?php echo JText::_('COM_COMMUNITY_SHOW_OPTION');?></option>
						<option <?php echo ( $this->config->get('showlatestvideos') == '2' ) ? 'selected="true"' : ''; ?> value="2"><?php echo JText::_('COM_COMMUNITY_MEMBERSONLY_OPTION');?></option>
					</select>
				</td>
			</tr-->

			<!--tr>
				<td width="300" class="key">
					<span class="hasTip" title="<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_GROUPS' ); ?>::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_GROUPS_TIPS'); ?>">
					<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_GROUPS' ); ?>
					</span>
				</td>
				<td valign="top">
					<select name="showlatestgroups">
						<option <?php echo ( $this->config->get('showlatestgroups') == '0' ) ? 'selected="true"' : ''; ?> value="0"><?php echo JText::_('COM_COMMUNITY_HIDE_OPTION');?></option>
						<option <?php echo ( $this->config->get('showlatestgroups') == '1' ) ? 'selected="true"' : ''; ?> value="1"><?php echo JText::_('COM_COMMUNITY_SHOW_OPTION');?></option>
						<option <?php echo ( $this->config->get('showlatestgroups') == '2' ) ? 'selected="true"' : ''; ?> value="2"><?php echo JText::_('COM_COMMUNITY_MEMBERSONLY_OPTION');?></option>
					</select>
				</td>
			</tr-->

			<!--tr>
				<td width="300" class="key">
					<span class="hasTip" title="<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_PHOTOS' ); ?>::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_PHOTOS_TIPS'); ?>">
					<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_LATEST_PHOTOS' ); ?>
					</span>
				</td>
				<td valign="top">
					<select name="showlatestphotos">
						<option <?php echo ( $this->config->get('showlatestphotos') == '0' ) ? 'selected="true"' : ''; ?> value="0"><?php echo JText::_('COM_COMMUNITY_HIDE_OPTION');?></option>
						<option <?php echo ( $this->config->get('showlatestphotos') == '1' ) ? 'selected="true"' : ''; ?> value="1"><?php echo JText::_('COM_COMMUNITY_SHOW_OPTION');?></option>
						<option <?php echo ( $this->config->get('showlatestphotos') == '2' ) ? 'selected="true"' : ''; ?> value="2"><?php echo JText::_('COM_COMMUNITY_MEMBERSONLY_OPTION');?></option>
					</select>
				</td>
			</tr-->
			<tr>
				<td width="300" class="key">
					<span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_CUSTOM_ACTIVITY_TIPS'); ?>">
					<?php echo JText::_( 'COM_COMMUNITY_CONFIGURATION_FRONTPAGE_SHOW_CUSTOM_ACTIVITY' ); ?>
					</span>
				</td>
				<td valign="top">
					<?php echo JHTML::_('select.booleanlist' , 'custom_activity' , null , $this->config->get('custom_activity') , JText::_('COM_COMMUNITY_YES_OPTION') , JText::_('COM_COMMUNITY_NO_OPTION') ); ?>
				</td>
			</tr>
		</tbody>
	</table>
</fieldset>