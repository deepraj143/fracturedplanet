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

jimport( 'joomla.application.component.controller' );

/**
 * JomSocial Component Controller
 */
class CommunityControllerAbout extends CommunityController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function ajaxCheckVersion()
	{
		$response		= new JAXResponse();

		$data			= $this->_getCurrentVersionData();
		ob_start();

		// Get the current build number
		$build			= $this->_getLocalBuildNumber();
		$version		= $this->_getLocalVersionNumber();

		if($data)
		{
			// Test versions
			if( $version < $data->version || ( ($version <= $data->version) && ( $build < $data->build ) ) )
			{
	?>

			<h5><?php echo JText::_('COM_COMMUNITY_UPDATE_SUMMARY');?></h5>
			<div style="color: red"><?php echo JText::_('COM_COMMUNITY_OLDER_VERSION_OF_JOM_SOCIAL');?></div>
			<div><?php echo JText::sprintf('Version installed: <span style="font-weight:700; color: red">%1$s</span>' , $this->_getLocalVersionString() );?></div>
			<div><?php echo JText::sprintf('Latest version available: <span style="font-weight:700;">%1$s</span>', $data->version . '.' . $data->build ); ?></div>
			<div><?php echo JText::sprintf('View full changelog at <a href="%1$s" target="_blank">%2$s</a>', $data->changelogURL , $data->changelogURL ); ?></div>
			<div><?php echo JText::sprintf('View the upgrade instructions at <a href="%1$s" target="_blank">%2$s</a>', $data->instructionURL , $data->instructionURL ); ?></div>
	<?php
			}
			else
			{
	?>
			<div class="clearfix">
				<h5><?php echo JText::_('COM_COMMUNITY_UPDATE_SUMMARY');?></h5>
				<div><?php echo JText::_('COM_COMMUNITY_LATEST_VERSION_OF_JOM_SOCIAL'); ?></div>
				<div><?php echo JText::sprintf('Version installed: <span style="font-weight:700;">%1$s</span>' , $this->_getLocalVersionString() );?></div>
			</div>
	<?php

			}
		}
		else
		{
			?>
			<div style="color: red"><?php echo JText::_('Please enable "allow_url_fopen" to check version');?></div>
			<?php
		}
		$contents	= ob_get_contents();
		ob_end_clean();

		$response->addAssign( 'cWindowContent' , 'innerHTML' , $contents );

		$action = '<input type="button" class="button cancelButton" onclick="cWindowHide();" name="' . JText::_('COM_COMMUNITY_CLOSE') . '" value="' . JText::_('COM_COMMUNITY_CLOSE') . '" />';
		$response->addScriptCall('cWindowActions', $action);
		return $response->sendResponse();
	}

	public function _getLocalBuildNumber()
	{
		$versionString	= $this->_getLocalVersionString();
		$tmpArray		= explode( '.' , $versionString );

		if( isset($tmpArray[2]) )
		{
			return $tmpArray[2];
		}

		// Unknown build number.
		return 0;
	}

	public function _getLocalVersionNumber()
	{
		$versionString	= $this->_getLocalVersionString();
		$tmpArray		= explode( '.' , $versionString );

		if( isset($tmpArray[0] ) && isset( $tmpArray[1] ) )
		{
			return doubleval( $tmpArray[0] . '.' . $tmpArray[1] );
		}
		return 0;
	}

	public function _getCurrentVersionData()
	{
		if(ini_get('allow_url_fopen'))
		{
			$data	= new stdClass();
			$xml	= 'http://cloud.jomsocial.com/jomsocial.xml';
			$parser	= new SimpleXMLElement( $xml , NULL , true );

			/** Get version **/
			$data->version	= $parser->version;

			/** Get build number **/
			$data->build	= $parser->buid;

			/** Get updated date **/
			$data->updated	= $parser->updated;

			/** Get changelog url **/
			$data->changelogURL	= $parser->changelog;

			/** Get upgrade instructions url **/
			$data->instructionURL	= $parser->instruction;

			return $data;
		}

		return false;
	}

	public function _getLocalVersionString()
	{
		static $version		= '';

		if( empty( $version ) )
		{

			$xml		= JPATH_COMPONENT . '/community.xml';
			$parser		= new SimpleXMLElement( $xml , NULL , true );

			$version	= $parser->version;
		}
		return $version;
	}
}