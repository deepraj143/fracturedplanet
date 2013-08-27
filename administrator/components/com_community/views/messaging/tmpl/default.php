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
<script type="text/javascript">
Joomla.submitbutton = function(action){
	submitbutton( action );
}

function submitbutton( action )
{
	if( action == 'save' )
	{
		sendMessage( joms.jQuery('#title').val() , joms.jQuery('#message').val() , 1 );
	}
}

function sendMessage( title , message , limit )
{
	jax.call( 'community' , 'admin,messaging,ajaxSendMessage' , title , message, limit );
}
</script>
<form name="adminForm" method="post" id="adminForm">
<div id="messaging-form">
<p><?php echo JText::_('COM_COMMUNITY_MESSAGING_ALLOWS_SEND_EMAIL');?></p>
<table class="admintable">
	<tr>
		<td class="key" valign="top"><span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_MASSMESSAGE_TITLE_TIPS')?>"><?php echo JText::_('COM_COMMUNITY_TITLE');?></span></td>
		<td><input type="text" id="title" name="title" value="" size="120" /></td>
	</tr>
	<tr>
		<td class="key" valign="top"><span class="hasTip" title="::<?php echo JText::_('COM_COMMUNITY_MASSMESSAGE_DESC_TIPS')?>"><?php echo JText::_('COM_COMMUNITY_MESSAGE');?></span></td>
		<td>
			<textarea name="message" id="message" rows="10" cols="80"></textarea>
		</td>
	</tr>
</table>
</div>
<div id="messaging-result" style="display: none;">
<fieldset style="width: 50%">
	<legend><?php echo JText::_('COM_COMMUNITY_MESSAGING_SENDING_MESSAGES');?></legend>
	<div><?php echo JText::_('COM_COMMUNITY_MESSAGING_DONT_REFRESH_PAGE');?></div>
	<div id="no-progress"><?php echo JText::_('COM_COMMUNITY_MESSAGING_NO_PROGRESS');?></div>
	<div id="progress-status" style="padding-top: 5px;"></div>
</fieldset>
</div>
</form>