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
<table width="100%" border="0" class="panel">
	<tr>
		<td width="55%" valign="top">
			<div id="cpanel" class="clearfix">
				<?php echo $this->addIcon('configuration.png','index.php?option=com_community&view=configuration', JText::_('COM_COMMUNITY_CONFIGURATION'));?>
				<?php echo $this->addIcon('edit-user.png','index.php?option=com_community&view=users', JText::_('COM_COMMUNITY_USERS'));?>
				<?php echo $this->addIcon('multiprofile.png','index.php?option=com_community&view=multiprofile', JText::_('COM_COMMUNITY_CONFIGURATION_MULTIPROFILES'));?>
				<?php echo $this->addIcon('profiles.png','index.php?option=com_community&view=profiles', JText::_('COM_COMMUNITY_CUSTOM_PROFILES'));?>
				<?php echo $this->addIcon('groups.png','index.php?option=com_community&view=groups', JText::_('COM_COMMUNITY_GROUPS'));?>
				<?php echo $this->addIcon('groupcategories.png','index.php?option=com_community&view=groupcategories', JText::_('COM_COMMUNITY_GROUP_CATEGORIES'));?>
				<?php echo $this->addIcon('videos.png','index.php?option=com_community&view=videoscategories', JText::_('COM_COMMUNITY_VIDEO_CATEGORIES'));?>
				<?php echo $this->addIcon('templates.png','index.php?option=com_community&view=templates', JText::_('COM_COMMUNITY_TEMPLATES'));?>
				<?php echo $this->addIcon('applications.png','index.php?option=com_community&view=applications', JText::_('COM_COMMUNITY_APPLICATIONS'));?>
				<?php echo $this->addIcon('event.png','index.php?option=com_community&view=events', JText::_('COM_COMMUNITY_EVENTS'));?>
				<?php echo $this->addIcon('eventcategories.png','index.php?option=com_community&view=eventcategories', JText::_('COM_COMMUNITY_EVENT_CATEGORIES'));?>
				<?php echo $this->addIcon('mailq.png','index.php?option=com_community&view=mailqueue', JText::_('COM_COMMUNITY_MAIL_QUEUE'));?>
				<?php echo $this->addIcon('reports.png','index.php?option=com_community&view=reports', JText::_('COM_COMMUNITY_REPORTINGS')); ?>
				<?php echo $this->addIcon('userpoints.png','index.php?option=com_community&view=userpoints', JText::_('COM_COMMUNITY_USERPOINTS')); ?>
				<?php echo $this->addIcon('message.png','index.php?option=com_community&view=messaging', JText::_('COM_COMMUNITY_MASSMESSAGING')); ?>
				<?php echo $this->addIcon('activities.png','index.php?option=com_community&view=activities', JText::_('COM_COMMUNITY_ACTIVITIES')); ?>
				<?php echo $this->addIcon('memberlist.png','index.php?option=com_community&view=memberlist', JText::_('COM_COMMUNITY_MEMBERLIST')); ?>
				<?php echo $this->addIcon('about.png','index.php?option=com_community&view=about', JText::_('COM_COMMUNITY_ABOUT')); ?>
				<?php echo $this->addIcon('help.png','http://documentation.jomsocial.com', JText::_('COM_COMMUNITY_HELP'), true ); ?>
			</div>
		</td>
		<td width="45%" valign="top">
			<?php
				//echo $this->pane->startPane( 'stat-pane' );
				echo JHtml::_('sliders.start');
				//echo $this->pane->startPanel( JText::_('COM_COMMUNITY_WELCOME_TO_JOMSOCIAL') , 'welcome' );
				echo JHtml::_('sliders.panel', JText::_('COM_COMMUNITY_WELCOME_TO_JOMSOCIAL') , 'welcome' );
			?>
			<div class="pane-box welcome">
				<p>
					<b><?php echo JText::_('COM_COMMUNITY_GREAT_COMPONENT_MSG');?></b>
					<br>
					For further information, you can browse through the documentations at
					<a href="http://documentation.jomsocial.com/" target="_blank">http://documentation.jomsocial.com/</a>
				</p>
				<p>
					For support, please visit our dedicated support forum at
					<a href="http://www.jomsocial.com/forum" target="_blank">http://www.jomsocial.com/forum</a>.
				</p>
			</div>
			<?php
				//echo $this->pane->endPanel();
				//echo $this->pane->startPanel( JText::_('COM_COMMUNITY_STATISTICS') , 'community' );
				echo JHtml::_('sliders.panel', JText::_('COM_COMMUNITY_STATISTICS') , 'community'  );
			?>
			<div class="pane-box statistic">
				<table class="adminlist table table-striped">
					<tr>
						<td width="70%">
							<?php echo JText::_( 'COM_COMMUNITY_TOTAL_USERS' ).': '; ?>
						</td>
						<td width="30%" align="center">
							<strong><?php echo $this->community->total; ?></strong>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo JText::_( 'COM_COMMUNITY_TOTAL_BLOCKED_USERS' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->community->blocked; ?></strong>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo JText::_( 'COM_COMMUNITY_TOTAL_APPLICATIONS_INSTALLED' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->community->applications; ?></strong>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo JText::_( 'COM_COMMUNITY_TOTAL_ACTIVITY_UPDATES' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->community->updates; ?></strong>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo JText::_( 'COM_COMMUNITY_PHOTOS_TOTAL' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->community->photos; ?></strong>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo JText::_( 'COM_COMMUNITY_VIDEOS_TOTAL' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->community->videos; ?></strong>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo JText::_( 'COM_COMMUNITY_GROUPS_T0TAL_DISCUSSIONS' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->community->groupDiscussion; ?></strong>
						</td>
					</tr>
				</table>
			</div>
			<?php
				//echo $this->pane->endPanel();
				//echo $this->pane->startPanel( JText::_('COM_COMMUNITY_GROUPS_STATISTICS'), 'groups' );
			?>
			<div class="pane-box statistic">
				<table class="adminlist table table-striped">
					<tr>
						<td  width="70%">
							<?php echo JText::_( 'COM_COMMUNITY_GROUPS_PUBLISHED' ).': '; ?>
						</td>
						<td width="30%" align="center">
							<strong><?php echo $this->groups->published; ?></strong>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo JText::_( 'COM_COMMUNITY_GROUPS_UNPUBLISHED' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->groups->unpublished; ?></strong>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo JText::_( 'COM_COMMUNITY_GROUP_CATEGORIES' ).': '; ?>
						</td>
						<td align="center">
							<strong><?php echo $this->groups->categories; ?></strong>
						</td>
					</tr>
				</table>
			</div>
			<?php 
				echo JHtml::_('sliders.panel', JText::_('COM_COMMUNITY_DOC_VIDEO') , 'welcome' );
			?>
			<div class="pane-box welcome">
				<ul>
					<li><a href="http://tiny.cc/JSSysReq" target="_blank"><?php echo JText::_('COM_COMMUNITY_SYSTEM_REQ')?></a></li>
					<li><a href="http://tiny.cc/UpdateJS28to3onJ25" target="_blank"><?php echo JText::_('COM_COMMUNITY_UPGRADE_JS_28_3X_ON_J25')?></a></li>
					<li><a href="http://tiny.cc/MJ25to3UpJS28to3" target="_blank"><?php echo JText::_('COM_COMMUNITY_MIGRATE_J25_J3X_ON_J3X')?></a></li>
					<li><a href="http://tiny.cc/UpdateJS28to3onJ3" target="_blank"><?php echo JText::_('COM_COMMUNITY_UPGRADE_J3_FROM_JS18_3X')?></a></li>
					<li><a href="http://tiny.cc/HowToBackup" target="_blank"><?php echo JText::_('COM_COMMUNITY_HOW_BACKUP')?></a></li>
				</ul>
			</div>
			<?php
				//echo $this->pane->endPanel();
				//echo $this->pane->endPane();
				echo JHtml::_('sliders.end');
			?>
		</td>
	</tr>
</table>
