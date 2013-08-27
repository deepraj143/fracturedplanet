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
<script type="text/javascript" language="javascript">
/**
 * This function needs to be here because, Joomla calls it
 **/
 Joomla.submitbutton = function(action){
 	submitbutton( action );
 }

function submitbutton(action)
{
	submitform(action);
}
</script>
<form action="index.php?option=com_community" method="post" name="adminForm" id="adminForm">
<p>
	<?php echo JText::sprintf('COM_COMMUNITY_MAILQUEUE_DESCRIPTION','http://www.jomsocial.com/support/docs/item/720-setting-up-cron-job-scheduled-task.html'); ?>
</p>
<table class="adminlist table table-striped" cellspacing="1">
	<thead>
		<tr class="title">
			<th width="1%"><?php echo JText::_('COM_COMMUNITY_NUMBER'); ?></th>
			<th width="1%"><input type="checkbox" name="toggle" value="" onclick="Joomla.checkAll(this)" /></th>
			<th width="5%" style="text-align: left;">
				<?php echo JText::_('COM_COMMUNITY_MAILQUEUE_RECIPIENT'); ?>
			</th>
			<th style="text-align: left;">
				<?php echo JText::_('COM_COMMUNITY_MAILQUEUE_SUBJECT'); ?>
			</th>
			<th>
				<?php echo JText::_('COM_COMMUNITY_MAILQUEUE_CONTENT'); ?>
			</th>
			<th align="center" width="10%">
				<?php echo JText::_('COM_COMMUNITY_CREATED'); ?>
			</th>
			<th align="center" width="5%">
				<?php echo JText::_('COM_COMMUNITY_STATUS'); ?>
			</th>
		</tr>
	</thead>
<?php
	if( !$this->mailqueues )
	{
?>
		<tr>
			<td colspan="7" align="center">
				<div><?php echo JText::_('COM_COMMUNITY_MAILQUEUE_NO_MAIL_QUEUE'); ?></div>
			</td>
		</tr>
<?php
	}
	else
	{
		$i		= 0;

		$mainframe	= JFactory::getApplication();

		foreach( $this->mailqueues as $queue )
		{
			$created	= JFactory::getDate( $queue->created );
			if(method_exists('JDate','getOffsetFromGMT')){
				$created->setTimezone( new DateTimeZone($mainframe->getCfg('offset')) ); //Joomla 3 compat
			} else {
				$systemOffset = $mainframe->getCfg('offset');
				$created->setOffSet($systemOffset );
			}

?>

		<tr>
			<td align="center"><?php echo $i + 1; ?></td>
			<td><?php echo JHTML::_('grid.id', $i++, $queue->id); ?></td>
			<td>
				<div>
					<?php echo $queue->recipient; ?>
				</div>
			</td>
			<td>
				<div>
					<?php echo $queue->subject; ?>
				</div>
			</td>
			<td>
				<div>
					<?php echo $queue->body; ?>
				</div>
			</td>
			<td align="center">
				<div>
					<?php echo $created->format('Y-m-d H:i:s'); ?>
				</div>
			</td>
			<td align="center">
				<?php echo $this->getStatusText( $queue->status ); ?>
			</td>
		</tr>
<?php
		}
	}
?>
	<tfoot>
	<tr>
		<td colspan="7">
			<?php echo $this->pagination->getListFooter(); ?>
		</td>
	</tr>
	</tfoot>
</table>
<input type="hidden" name="view" value="mailqueue" />
<input type="hidden" name="task" value="mailqueue" />
<input type="hidden" name="option" value="com_community" />
<input type="hidden" name="boxchecked" value="0" />
</form>