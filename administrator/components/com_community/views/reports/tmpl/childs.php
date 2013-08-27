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
<form action="index.php?option=com_community" method="post" name="adminForm">
<table class="adminlist table table-striped" cellspacing="1">
	<thead>
		<tr class="title">
			<th width="1%"><?php echo JText::_('COM_COMMUNITY_NUMBER'); ?></th>
			<th style="text-align: left;">
				<?php echo JText::_('COM_COMMUNITY_MESSAGE'); ?>
			</th>
			<th width="10%" style="text-align: center;">
				<?php echo JText::_('COM_COMMUNITY_REPORTS_CREATED_BY'); ?>
			</th>
			<th align="center" width="5%">
				<?php echo JText::_('COM_COMMUNITY_REPORTS_IP_ADDRESS'); ?>
			</th>
			<th style="text-align: center;" width="10%">
				<?php echo JText::_('COM_COMMUNITY_CREATED'); ?>
			</th>
		</tr>
	</thead>
<?php
	if( !$this->reporters )
	{
?>
		<tr>
			<td colspan="7" align="center">
				<div><?php echo JText::_('COM_COMMUNITY_REPORTS_NOT_SUBMITTED'); ?></div>
			</td>
		</tr>
<?php
	}
	else
	{
		$count		= 0;

		foreach( $this->reporters as $row )
		{
			$count	= $count + 1;
			$user	= JFactory::getUser( $row->created_by );
?>
		<tr id="row<?php echo $count;?>">
			<td align="center"><?php echo $count; ?></td>
			<td>
				<div>
					<?php echo $this->escape( $row->message );?>
				</div>
			</td>
			<td style="text-align: center;">
				<div>
					<?php if( $user->id == 0 ){ ?>
					<?php echo JText::_('COM_COMMUNITY_GUEST');?>
					<?php } else { ?>
					<a href="<?php echo JURI::root() . '/index.php?option=com_community&view=profile&userid=' . $user->id;?>" target="_blank">
					<?php echo $user->name;?>
					</a>
					<?php } ?>
				</div>
			</td>
			<td align="center">
				<div>
					<?php echo $row->ip; ?>
				</div>
			</td>
			<td align="center">
				<div>
					<?php echo $row->created;?>
				</div>
			</td>
		</tr>
<?php
		}
	}
?>
	<tfoot>
	<tr>
		<td colspan="5">
			<?php echo $this->pagination->getListFooter(); ?>
		</td>
	</tr>
	</tfoot>
</table>
<input type="hidden" name="view" value="reports" />
<input type="hidden" name="layout" value="childs" />
<input type="hidden" name="option" value="com_community" />
<input type="hidden" name="boxchecked" value="0" />
</form>