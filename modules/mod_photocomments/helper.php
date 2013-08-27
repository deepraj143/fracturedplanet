<?php
/**
* @copyright (C) 2013 iJoomla, Inc. - All rights reserved.
* @license GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
* @author iJoomla.com <webmaster@ijoomla.com>
* @url https://www.jomsocial.com/license-agreement
* The PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
* More info at https://www.jomsocial.com/license-agreement
*/
// no direct access
defined('_JEXEC') or die('Restricted access');

class modPhotoCommentsHelper
{
	static public function getList(&$params)
	{
		$db		= JFactory::getDBO();
		
		$limit	= $params->get( 'count' , 5 );
		
		//Query for 150 to make sure comments are filtered
		$limit = 150; //limit can be set
		
		//privacy settings
		//CFactory::load('libraries', 'privacy');
		$my		= CFactory::getUser();
		
		

		$query	= 'SELECT a.*,b.*,c.' . $db->quoteName('type').' as phototype,c.' . $db->quoteName('groupid')
				.' FROM ' . $db->quoteName('#__community_wall').' AS a '
				.' INNER JOIN ' . $db->quoteName('#__community_photos').' AS b '
				.' ON a.' . $db->quoteName('contentid').'=b.' . $db->quoteName('id')
				.' INNER JOIN ' . $db->quoteName('#__community_photos_albums').' AS c '
				.' ON b.' . $db->quoteName('albumid').'=c.' . $db->quoteName('id')
				.' WHERE a.' . $db->quoteName('type').' =' . $db->Quote('photos')
				.' ORDER BY a.' . $db->quoteName('date').' DESC '
				.' LIMIT ' . $limit;
		$db->setQuery( $query );
		
		
		
		$comments	= $db->loadObjectList();
		
		//Once results are loaded, filter the count and the user premission level
		$counter = $params->get( 'count' , 5 );
		
		$filtered_comments = array();
		foreach($comments as $comment){
			$permission	= CPrivacy::getAccessLevel($my->id, $comment->creator);
			if($permission >= $comment->permissions){
				$filtered_comments[] = $comment;
				if(--$counter == 0){
					break;
				}
			}
		}
		
		return $filtered_comments; 
	}
}
