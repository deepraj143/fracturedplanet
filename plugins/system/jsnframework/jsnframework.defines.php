<?php
/**
 * @version     $Id$
 * @package     JSN_Framework
 * @subpackage  Html
 * @author      JoomlaShine Team <support@joomlashine.com>
 * @copyright   Copyright (C) 2012 JoomlaShine.com. All Rights Reserved.
 * @license     GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.joomlashine.com
 * Technical Support:  Feedback - http://www.joomlashine.com/contact-us/get-support.html
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Shorten directory separator constant
defined('DS') OR define('DS', DIRECTORY_SEPARATOR);

// Define identified name and version
define('JSN_FRAMEWORK_IDENTIFIED_NAME',	'ext_framework');
define('JSN_FRAMEWORK_VERSION',			'1.3.1');

// Define required Joomla version
define('JSN_FRAMEWORK_REQUIRED_JOOMLA_VER', '3.0');

// Define necessary constants
define('JSN_EXT_VERSION_CHECK_URL',		'http://www.joomlashine.com/versioning/product_version.php?category=cat_extension');
define('JSN_EXT_DOWNLOAD_UPDATE_URL',	'http://www.joomlashine.com/index.php?option=com_lightcart&controller=remoteconnectauthentication&task=authenticate&tmpl=component&upgrade=yes');

define('JSN_PATH_FRAMEWORK',	dirname(__FILE__));
define('JSN_PATH_LIBRARIES',	JSN_PATH_FRAMEWORK . '/libraries');
define('JSN_URL_ASSETS',		JURI::root(true) . '/plugins/system/jsnframework/assets');

define('JSN_LASTUPDATE',		'jsn-lastupdate-');
define('JSN_LASTUPDATE_RESULT',	'jsn-lastupdate-result-');
define('CHECK_UPDATE_PERIOD',	86400);
define('REVIEW_POPUP_PERIOD',	1209600);

// Third-party templates
define('JSN_TEMPLATE_CLASSES_OVERWRITE',	JSN_PATH_FRAMEWORK . '/libraries/template/overwrites/');

// Define necessary variables.
$baseUrl	= JURI::base(true);
$rootUrl	= JURI::root(true);
$application = JFactory::getApplication();

// Add base path that point to folder contains javascript files of the framework
JSNHtmlAsset::addScriptPath('jsn', 'joomlashine/js');

// Prepare config
foreach (JSNVersion::$products as $product)
	JSNHtmlAsset::prepare($product, !$application->isSite());

// Predefine script libraries
if (JSNVersion::isJoomlaCompatible('3.0'))
{
	JSNHtmlAsset::addScriptLibrary('jquery.ui', '3rd-party/jquery-ui/js/jquery-ui-1.9.0.custom.min', array('jquery'));
}
else
{
	JSNHtmlAsset::addScriptLibrary('jquery.ui', '3rd-party/jquery-ui/js/jquery-ui-1.8.16.custom.min', array('jquery'));
}

JSNHtmlAsset::addScriptLibrary('bootstrap',					'3rd-party/bootstrap/js/bootstrap.min',										array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.cookie',				'3rd-party/jquery-ck/jquery.ck',											array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.hotkeys',			'3rd-party/jquery-hotkeys/jquery.hotkeys',									array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.jstorage',			'3rd-party/jquery-jstorage/jquery.jstorage',								array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.jstree',				'3rd-party/jquery-jstree/jquery.jstree',									array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.layout',				'3rd-party/jquery-layout/js/jquery.layout-latest',							array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.tinyscrollbar',		'3rd-party/jquery-tinyscrollbar/jquery.tinyscrollbar',						array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.topzindex',			'3rd-party/jquery-topzindex/jquery.topzindex',								array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.contextMenu',		'3rd-party/jquery-contextMenu/jquery.contextMenu',							array('jquery', 'jquery.ui'));
JSNHtmlAsset::addScriptLibrary('jquery.daterangepicker',	'3rd-party/jquery-daterangepicker/js/daterangepicker.jQuery.compressed',	array('jquery', 'jquery.ui'));
JSNHtmlAsset::addScriptLibrary('jquery.scrollto',			'3rd-party/jquery-scrollto/jquery.scrollTo',								array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.stickyfloat',		'3rd-party/jquery-stickyfloat/stickyFloat',									array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.zeroclipboard',		'3rd-party/jquery-zeroclipboard/ZeroClipboard',								array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.json',				'3rd-party/jquery-json/jquery.json-2.3.min',								array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.tipsy',				'3rd-party/jquery-tipsy/jquery.tipsy',										array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.jwysiwyg',			'3rd-party/jquery-jwysiwyg/jquery.wysiwyg',									array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.select2',			'3rd-party/jquery-select2/select2.min',										array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.tmpl',               '3rd-party/jquery.tmpl/jquery.tmpl.min',                                    array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.colorpicker',        '3rd-party/jquery-colorpicker/js/colorpicker',                              array('jquery'));
JSNHtmlAsset::addScriptLibrary('jquery.gradientPicker',     '3rd-party/jquery-gradientpicker/jquery.gradientPicker',                    array('jquery', 'jquery.ui'));