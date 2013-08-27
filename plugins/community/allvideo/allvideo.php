<?php
/**
 * @category	Plugins
 * @package		JomSocial
 * @copyright (C) 2008 by Slashes & Dots Sdn Bhd - All rights reserved!
 * @license		GNU/GPL, see LICENSE.php
 */
// no direct access
defined('_JEXEC') or die('Restricted access');

require_once( JPATH_ROOT . DS . 'components' . DS . 'com_community' . DS . 'libraries' . DS . 'core.php');

if(!class_exists('plgCommunityAllvideo'))
{
	class plgCommunityAllvideo extends CApplications
	{
		var $name		= 'Allvideo';
		var $_name		= 'allvideo';
	
	    function plgCommunityAllvideo(& $subject, $config)
	    {
			$this->_my		= CFactory::getUser();
		
			parent::__construct($subject, $config);
	    }
		
		/**
		 * ->title
		 * ->comment 	 
		 */
		function onWallDisplay( &$row ) 
		{
			CError::assert( $row->comment, '', '!empty', __FILE__ , __LINE__ );
			$mainframe =& JFactory::getApplication();
			if(file_exists(dirname(dirname(__FILE__)) . DS.'content'.DS.'jw_allvideos.php')){			
				$applications	= JPluginHelper::getPlugin('content');				
				$obj = new stdClass();
				$obj->text = &$row->comment;
				$dispatcher =& JDispatcher::getInstance();
				$results = $dispatcher->trigger( 'onPrepareContent', array( $obj, '', 0 ) );
			}
		}
		
		/**
		 * ->message
		 */	 	
		function onBulletinDisplay( &$row ) 
		{
			CError::assert( $row->message, '', '!empty', __FILE__ , __LINE__ );
			$mainframe =& JFactory::getApplication();
			if(file_exists(dirname(dirname(__FILE__)) . DS.'content'.DS.'jw_allvideos.php')){
				$applications	= JPluginHelper::getPlugin('content');				
				$obj = new stdClass();
				$obj->text = &$row->comment;
				$dispatcher =& JDispatcher::getInstance();
				$results = $dispatcher->trigger( 'onPrepareContent', array( $obj, '', 0 ) );
			}
		} 
		
		/**
		 * ->message
		 */
		function onDiscussionDisplay( &$row ) 
		{
			CError::assert( $row->message, '', '!empty', __FILE__ , __LINE__ );
			$mainframe =& JFactory::getApplication();
			if(file_exists(dirname(dirname(__FILE__)) . DS.'content'.DS.'jw_allvideos.php')){
				$applications	= JPluginHelper::getPlugin('content');				
				$obj = new stdClass();
				$obj->text = &$row->comment;
				$dispatcher =& JDispatcher::getInstance();
				$results = $dispatcher->trigger( 'onPrepareContent', array( $obj, '', 0 ) );
			}
		}	
	}
}


