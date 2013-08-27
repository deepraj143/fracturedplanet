<?php
/**
* @plugin   		K2 - Jomsocial Integration
* @version   		3.0.1
* @copyright   	Copyright (C) 2011 Minitek. All rights reserved
* @license   		GNU/GPLv3 http://www.gnu.org/copyleft/gpl.html
* @author url   http://www.minitek.gr/
* @author email info@minitek.gr
* @developer   	Ioannis Maragos - www.minitek.gr
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.plugin.plugin' );

class  plgK2Jsk2 extends JPlugin
{
	
	function plgK2Jsk2(& $subject, $config)
	{
		parent::__construct($subject, $config);
		// load the translation
		$this->loadLanguage( );	
		// load plugin parameters
	  $plugin = & JPluginHelper::getPlugin('k2', 'jsk2');
	  $pluginParams = new JRegistry($plugin->params);   
	}

	function onK2PrepareContent($item)
	{
    // check if Jomsocial is installed
    $js = JComponentHelper::getComponent('com_community'); 	    
		// get page details
		$pageoption = JRequest::getVar( 'option', '' );
		$pageview = JRequest::getVar( 'view', '' );
		$pagetask = JRequest::getVar( 'task', '' );
		$pagelayout = JRequest::getVar( 'layout', '' );			
		// get path to Jomsocial
		$pathtojs = JPATH_ROOT.DS.'components'.DS.'com_community';				
	  if (file_exists($pathtojs.DS.'libraries'.DS.'core.php')) {	
	    include_once($pathtojs.DS.'libraries'.DS.'core.php');				
		}			          
    // Jomsocial is installed
    if ($js) {	
		  // Get author
			$query = " SELECT id, created_by "
				 	." FROM #__k2_items "
				  ." WHERE id=".$item->id;			 
				  $db =& JFactory::getDBO();
				  $db->setQuery( $query );	
				  $row = $db->loadObject();		
					
			if ($row) {
			  $author_id = $row->created_by;
			
		    // replace link in category view
			  if ($this->params->get( 'cat_enable' )) {		
			    if (($pageoption == 'com_k2' && $pageview == 'itemlist')  && $pagetask == 'category' || $pagelayout == 'category' ) {		
				  $item->author->link = '';	
				  $item->author->link = CRoute::_('index.php?option=com_community&view=profile&userid='.$author_id);				
			    }		
			  }
			}
			
			// replace link in item view
			if ($this->params->get( 'item_enable' )) {		
			  if ($pageoption == 'com_k2' && $pageview == 'item') {
        $item->author->link = CRoute::_('index.php?option=com_community&view=profile&userid='.$item->author->id);
			  }		
			}			
			// replace avatar in item view
			if ($this->params->get( 'item_avatar' )) {		
			  if ($pageoption == 'com_k2' && $pageview == 'item') {
				  $jsuser =& CFactory::getUser($item->author->id);			    
			    $item->author->avatar = $jsuser->getAvatar();
			  }			
			}		
			// replace description in item view or author view
			if ($this->params->get( 'item_desc' )) {		
			  if ($pageoption == 'com_k2' && $pageview == 'item') {	
					$desc_id = $this->params->get( 'item_desc_id' );	
					$auth_id = $item->author->id;
				  $query = " SELECT id, user_id, field_id, value "
				 	." FROM #__community_fields_values "
				  ." WHERE user_id=".$auth_id
					." AND field_id=".$desc_id;			 
				  $db =& JFactory::getDBO();
				  $db->setQuery( $query );	
				  $row = $db->loadObject();		
					if ($row) {	 
				    $js_desc = $row->value;
					  $item->author->profile->description = $js_desc;
					}
			  }		
			}	
			// replace website in item view
			if ($this->params->get( 'item_web' )) {		
			  if ($pageoption == 'com_k2' && $pageview == 'item') {	
					$web_id = $this->params->get( 'item_web_id' );	
					$auth_id = $item->author->id;
				  $query = " SELECT id, user_id, field_id, value "
				 	." FROM #__community_fields_values "
				  ." WHERE user_id=".$auth_id
					." AND field_id=".$web_id;			 
				  $db =& JFactory::getDBO();
				  $db->setQuery( $query );	
				  $row = $db->loadObject();		
					if ($row) {	 
				    $js_web = $row->value;
					  $item->author->profile->url = $js_web;
					}
			  }		
			}		
			// replace avatar in author view
			if ($this->params->get( 'auth_avatar' )) {		
			  if ($pageoption == 'com_k2' && $pageview == 'itemlist' && $pagetask == 'user') {	
				  $jsuser =& CFactory::getUser($item->author->id);			    
			    $item->author->avatar = $jsuser->getAvatar();
			  }			
			}		
			// replace description in author view
			if ($this->params->get( 'auth_desc' )) {		
			  if ($pageoption == 'com_k2' && $pageview == 'itemlist' && $pagetask == 'user') {		
					$desc_id = $this->params->get( 'item_desc_id' );	
					$auth_id = $item->author->id;
				  $query = " SELECT id, user_id, field_id, value "
				 	." FROM #__community_fields_values "
				  ." WHERE user_id=".$auth_id
					." AND field_id=".$desc_id;			 
				  $db =& JFactory::getDBO();
				  $db->setQuery( $query );	
				  $row = $db->loadObject();		
					if ($row) {	 
				    $js_desc = $row->value;
					  $item->author->profile->description = $js_desc;
					}
			  }		
			}	
			// replace website in author view
			if ($this->params->get( 'auth_web' )) {	
			  if ($pageoption == 'com_k2' && $pageview == 'itemlist' && $pagetask == 'user') {	
					$web_id = $this->params->get( 'item_web_id' );	
					$auth_id = $item->author->id;
				  $query = " SELECT id, user_id, field_id, value "
				 	." FROM #__community_fields_values "
				  ." WHERE user_id=".$auth_id
					." AND field_id=".$web_id;			 
				  $db =& JFactory::getDBO();
				  $db->setQuery( $query );	
				  $row = $db->loadObject();		
					if ($row) {	 
				    $js_web = $row->value;
					  $item->author->profile->url = $js_web;
					}
			  }		
			}				
		}// if js           
	}// onK2PrepareContent

	function onAfterK2Save( & $item, $isNew )
	{
		global $mainframe;
		if ($this->params->get( 'k2_activity_new' ) && $isNew && $item->published) {
		  //jomsocial activity stream include
      $JSinstallchk = JPATH_BASE . DS . 'components' . DS . 'com_community' . DS . 'libraries' . DS . 'core.php';
      if ( file_exists($JSinstallchk)) {
        require_once($JSinstallchk);
      }
      $contentTitle = $item->title;
			include_once(JPATH_SITE.DS.'components'.DS.'com_k2'.DS.'helpers'.DS.'route.php');
      $link = K2HelperRoute::getItemRoute($item->id.':'.urlencode($item->alias),$item->catid.':'.urlencode($item->category->alias));
      $item->link=$link;                    
      $act = new stdClass();
      $act->cmd    = 'jsk2.newitem';
		  $user	=& JFactory::getUser();
      $act->actor    = $user->id;
      $act->target    = 0; // no target
      $act->title    = JText::_('{actor} '.$this->params->get( 'new_item_text' ).' <a href="'.$item->link.'">'.$contentTitle.'</a>');
      $act->content    = '';
      $act->app    = 'wall';
      $act->cid    = 0;                   
      CFactory::load('libraries', 'activities');
	  $act->comment_type = jsk2.comment;
	  $act->comment_id = CActivities::COMMENT_SELF;
		 
	  $act->like_type = jsk2.like;
	  $act->like_id = CActivities::LIKE_SELF;    
      CActivityStream::add($act);
	  }
		if ($this->params->get( 'k2_activity_upd' )  && !$isNew && $item->published) {
		  //jomsocial activity stream include
      $JSinstallchk = JPATH_BASE . DS . 'components' . DS . 'com_community' . DS . 'libraries' . DS . 'core.php';                         
      if ( file_exists($JSinstallchk)) {
        require_once($JSinstallchk);
      }
      $contentTitle = $item->title;
			include_once(JPATH_SITE.DS.'components'.DS.'com_k2'.DS.'helpers'.DS.'route.php');
      $link = K2HelperRoute::getItemRoute($item->id.':'.urlencode($item->alias),$item->catid.':'.urlencode($item->category->alias));
      $item->link=$link;                    
      $act = new stdClass();
      $act->cmd    = 'jsk2.updateitem';
		  $user	=& JFactory::getUser();
      $act->actor    = $user->id;
      $act->target    = 0; // no target
      $act->title    = JText::_('{actor} '.$this->params->get( 'update_item_text' ).' <a href="'.$item->link.'">'.$contentTitle.'</a>');
      $act->content    = '';
      $act->app    = 'wall';
      $act->cid    = 0;                   
      CFactory::load('libraries', 'activities');
	  $act->comment_type = jsk2.comment;
	  $act->comment_id = CActivities::COMMENT_SELF;
		 
	  $act->like_type = jsk2.like;
	  $act->like_id = CActivities::LIKE_SELF;   
      CActivityStream::add($act);
		}
	} 
	  
}