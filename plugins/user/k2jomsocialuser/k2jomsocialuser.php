<?php
/**
 * @plugin		    K2 - Jomsocial user synchronization
 * @version		    3.0.1
 * @author		    JoomlaWorks http://www.joomlaworks.gr
 * @copyright	    Copyright (c) 2006 - 2011 JoomlaWorks Ltd. All rights reserved.
 * @license		    GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * @modification  Minitek.gr - www.minitek.gr
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

class plgUserK2jomsocialuser extends JPlugin {

    function plgUserK2jomsocialuser(&$subject, $config) {

        parent::__construct($subject, $config);
    }

    function onUserAfterSave($user, $isnew, $success, $msg) {
    	return $this->onAfterStoreUser($user, $isnew, $success, $msg);
    }
    
    function onAfterStoreUser($user, $isnew, $success, $msg) {

		  $mainframe = &JFactory::getApplication();
    	$k2params = &JComponentHelper::getParams('com_k2');
    	jimport('joomla.filesystem.file');
		  $task = JRequest::getCmd('task');
    	
    	if($mainframe->isSite() && $task != 'activate' && $isnew) {
			 
    		JPlugin::loadLanguage('com_k2');
    		JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_k2'.DS.'tables');
    		$row = &JTable::getInstance('K2User', 'Table');
    		$k2id = $this->getK2UserID($user['id']);
    		JRequest::setVar('id', $k2id, 'post');
    		$row->bind(JRequest::get('post'));
    		$row->set('userID', $user['id']);
    		$row->set('userName', $user['name']);
    		$row->set('group', $k2params->get('K2UserGroup', $this->params->get( 'k2_usergroup' )));
    		$row->set('gender', JRequest::getVar('gender'));
    		$row->set('url', JRequest::getVar('url'));

    		$row->set('description', JRequest::getVar('description', '', 'post', 'string', 2));
    		if($k2params->get('xssFiltering')){
    			$filter = new JFilterInput(array(), array(), 1, 1, 0);
    			$row->description = $filter->clean( $row->description );
    		}

    		$row->store();
			
			}
      
    }
    
    function getK2UserID($id) {

        $db = &JFactory::getDBO();
        $query = "SELECT id FROM #__k2_users WHERE userID={$id}";
        $db->setQuery($query);
        $result = $db->loadResult();
        return $result;
    }

}
