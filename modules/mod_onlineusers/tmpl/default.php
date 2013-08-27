<?php
/**
 * @category	Module
 * @package		JomSocial
 * @subpackage	OnlineUsers
 * @copyright (C) 2008 by Slashes & Dots Sdn Bhd - All rights reserved!
 * @license		GNU/GPL, see LICENSE.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<div class="online-users<?php echo $params->get('moduleclass_sfx'); ?>">
	<ul style="list-style:none; margin: 0 0 10px; padding: 0;">
		
	<?php
	foreach ( $users as $user )
	{	
		if( !$params->get('hideAdmin') || ( $params->get('hideAdmin') && $user->usertype != 'Super Administrator' && $user->usertype != 'Administrator') )
		{
	?>
		<li style="display: inline; padding: 0 3px 3px 0; background: none;">
			<a href="<?php echo $user->link; ?>" title="<?php echo JText::sprintf( 'MOD_ONLINEUSERS_GO_TO_PROFILE', $user->name ); ?>">
				<img width="32" src="<?php echo $user->avatar; ?>" alt="<?php echo JText::sprintf( 'MOD_ONLINEUSERS_GO_TO_PROFILE', $user->name ); ?>" style="padding: 2px; border: solid 1px #ccc;" />
			</a>
		</li>
	<?php
		}
	}
	?>

	</ul>
	
	<div>
		<?php echo JText::sprintf( ( cIsPlural( $total->users ) ) ? 'MOD_ONLINEUSERS_USER_MANY' : 'MOD_ONLINEUSERS_USER', $total->users); ?>
		
		<?php if ( $params->get( 'show_guest', 1 ) ) { ?>
			<?php echo JText::_('MOD_ONLINEUSERS_AND'), ' ', JText::sprintf( ( cIsPlural( $total->guests ) ) ? 'MOD_ONLINEUSERS_GUEST_MANY' : 'MOD_ONLINEUSERS_GUEST', $total->guests ); ?>
		<?php } ?>
		
		<?php echo JText::_("MOD_ONLINEUSERS_ONLINE"); ?> 
		<div>
			<a href="<?php echo CRoute::_('index.php?option=com_community&view=search&task=browse&sort=online'); ?>"><?php echo JText::_("MOD_ONLINEUSERS_SHOW_ALL"); ?></a>
		</div>
	</div>
</div>