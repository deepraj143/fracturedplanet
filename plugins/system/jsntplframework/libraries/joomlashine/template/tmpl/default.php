<?php
/**
 * @version     $Id$
 * @package     JSNExtension
 * @subpackage  TPLFramework
 * @author      JoomlaShine Team <support@joomlashine.com>
 * @copyright   Copyright (C) 2012 JoomlaShine.com. All Rights Reserved.
 * @license     GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.joomlashine.com
 * Technical Support:  Feedback - http://www.joomlashine.com/contact-us/get-support.html
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Get all fieldset in XML
$fieldSets = $adminFormXml->fields->fieldset;

// Set appropriate wrapper class
$wrapperClass = 'jsn-joomla' . JSNTplHelper::getJoomlaVersion(1, false);

// Prepare template name
$templateName = $this->data->template;
$templateName = preg_replace('/_(pro|free)$/i', '', $templateName);
$templateName = str_replace('_', '-', $templateName);

// Parse template name
list($prefix, $template, $suffix) = explode('_', $this->data->template);

// Generate template introduction link
$templateLink = "http://www.joomlashine.com/joomla-templates/jsn-{$template}.html";

// Process template edition
$edition = $this->templateEdition->getEdition();

if ($edition == 'FREE')
{
	$edition = '';
	$editionClass = 'jsn-free-edition';
}
else
{
	$edition = str_replace('PRO ', '', $edition);
	$editionClass = 'jsn-pro-edition';
}

// Get next template edition
$nextEdition = str_replace('PRO ', '', $this->templateEdition->getNextEdition());

// Get installed template version
$version = JSNTplHelper::getTemplateVersion($this->data->template);
?>
<div class="jsn-master"><div id="jsn-template-config" class="jsn-bootstrap <?php echo $wrapperClass ?> <?php echo $editionClass ?>">
	<form action="" method="POST" name="adminForm" id="style-form">
		<input type="hidden" name="task" />
		<input type="hidden" name="customized" value="<?php echo @count($this->data->params) ? 'yes' : 'no'; ?>" />
		<?php echo JHtml::_('form.token'); ?>

		<div id="jsn-template-toolbar">
			<label for="jform_title pull-left"><?php echo JText::_('JSN_TPLFW_FIELD_TITLE_LABEL') ?></label>
			<?php echo $this->templateForm->getInput('title') ?>

			<label for="jform_template pull-left"><?php echo JText::_('COM_TEMPLATES_FIELD_TEMPLATE_LABEL') ?></label>
			<?php echo $this->templateForm->getInput('template') ?>

			<label for="jform_home pull-left"><?php echo JText::_('COM_TEMPLATES_FIELD_HOME_LABEL') ?></label>
			<?php echo $this->templateForm->getInput('home') ?>

			<?php echo $this->templateForm->getInput('client_id') ?>
			<div class="clearfix"></div>
		</div>

		<div id="jsn-template-config-tabs" class="form-horizontal">
			<ul id="jsn-main-nav">
				<li>
					<a href="#getting-started">
						<i class="icon-home icon-black"></i>
						<?php echo JText::_('JSN_TPLFW_GETTING_STARTED') ?>
					</a>
				</li>
				<?php foreach ($fieldSets as $fieldSet): ?>
					<?php $class = isset($fieldSet['pro']) && $fieldSet['pro'] == 'true' ? 'jsn-pro-tab' : '' ?>
					<li class="<?php echo $class ?>">
						<a href="#<?php echo $fieldSet['name'] ?>">
							<?php if (isset($fieldSet['icon'])): ?>
								<i class="<?php echo $fieldSet['icon'] ?>"></i>
							<?php endif ?>

							<?php echo JText::_($fieldSet['label']) ?>
							<?php if (isset($fieldSet['pro']) && $fieldSet['pro'] == 'true'): ?>
								<span class="label label-important label-pro">PRO</span>
							<?php endif ?>
						</a>
					</li>
				<?php endforeach ?>
				<li><a href="#menu-assignment"><i class="icon-check"></i> <?php echo JText::_('JSN_TPLFW_MENU_ASSIGNMENT') ?></a></li>
			</ul>

			<div id="jsn-template-maintenance" class="btn-group pull-right">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<?php echo JText::_('JSN_TPLFW_MAINTENANCE'); ?>
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a id="jsn-template-maintenance-backup-params" href="<?php echo JRoute::_('index.php?widget=maintenance&action=backup&template=' . $this->data->template) . '&styleId=' . $this->data->id; ?>"><?php echo JText::_('JSN_TPLFW_MAINTENANCE_BACKUP'); ?></a></li>
					<li><a id="jsn-template-maintenance-restore-params" href="<?php echo JRoute::_('index.php?widget=maintenance&action=restore&template=' . $this->data->template) . '&styleId=' . $this->data->id; ?>"><?php echo JText::_('JSN_TPLFW_MAINTENANCE_RESTORE'); ?></a></li>
				</ul>
			</div>

			<div class="row-fluid" id="getting-started">
				<?php include JSN_PATH_TPLFRAMEWORK_LIBRARIES . '/template/tmpl/default_home.php' ?>
			</div>

			<?php foreach ($fieldSets as $xmlFieldSet): ?>
				<div id="<?php echo $xmlFieldSet['name'] ?>">
					<?php if (isset($xmlFieldSet['pro']) && $xmlFieldSet['pro'] == 'true' && $this->templateEdition->getEdition() == 'FREE'): ?>
					<div class="jsn-section-pro alert alert-block">
						<p class="pull-left"><?php echo JText::_('JSN_TPLFW_FEATURES_AVAILABLE_IN_PRO') ?></p>
						<a href="javascript:void(0)" class="jsn-upgrade-link btn pull-right"><?php echo JText::_('JSN_TPLFW_UPGRADE_NOW') ?></a>
						<div class="clearfix"></div>
					</div>
					<?php endif ?>

					<?php if (isset($xmlFieldSet['twoColumns']) && $xmlFieldSet['twoColumns'] == 'true'): ?>
						<?php include JSN_PATH_TPLFRAMEWORK_LIBRARIES . '/template/tmpl/default_layout.php' ?>
					<?php else: ?>
						<?php foreach ($xmlFieldSet->children() as $field): ?>
							<?php $nodeName = strtolower($field->getName()) ?>

							<?php if ($nodeName == 'field'): ?>
								<?php $input = $this->adminForm->getField($field['name'], 'jsn') ?>
								<?php if (trim($field['label']) != '') : ?>
								<div class="control-group">
									<div class="control-label">
										<label for="<?php echo $input->id ?>" rel="tipsy" title="<?php echo JText::_($field['label'] . '_DESC') ?>">
											<?php echo JText::_($field['label']) ?>
										</label>
									</div>
									<div class="controls">
										<?php echo str_replace('%TEMPLATE%', $this->data->template, $input->input) ?>
									</div>
								</div>
								<?php else : ?>
								<div>
									<?php echo str_replace('%TEMPLATE%', $this->data->template, $input->input) ?>
								</div>
								<?php endif; ?>
							<?php elseif ($nodeName == 'fieldset'): ?>
								<fieldset class="<?php echo $field['name'] ?>">
									<legend><?php echo JText::_($field['label']) ?></legend>
									<?php foreach ($field->children() as $innerField): ?>
										<?php $input = $this->adminForm->getField($innerField['name'], 'jsn') ?>
										<?php if (trim($innerField['label']) != '') : ?>
										<div class="control-group">
											<div class="control-label">
												<label for="<?php echo $input->id ?>" rel="tipsy" title="<?php echo JText::_($innerField['label'] . '_DESC') ?>">
													<?php echo JText::_($innerField['label']) ?>
												</label>
											</div>
											<div class="controls">
												<?php echo str_replace('%TEMPLATE%', $this->data->template, $input->input) ?>
											</div>
										</div>
										<?php else : ?>
										<div>
											<?php echo str_replace('%TEMPLATE%', $this->data->template, $input->input) ?>
										</div>
										<?php endif; ?>
										<?php endforeach ?>
								</fieldset>
							<?php endif ?>
						<?php endforeach ?>
					<?php endif ?>
				</div>
			<?php endforeach ?>

			<div id="menu-assignment">
				<?php include JSN_PATH_TPLFRAMEWORK_LIBRARIES . '/template/tmpl/default_assignment.php' ?>
			</div>
		</div>
	</form>

	<div role="dialog" tabindex="-1" class="modal hide" id="jsn_pro_edition_only_modal">
		<div class="modal-body">
			<p><?php echo JText::_('JSN_TPLFW_PRO_EDITION_ONLY'); ?></p>
		</div>
		<div class="modal-footer">
			<a class="btn btn-primary jsn-upgrade-link" href="javascript:void(0)" onclick="jQuery(this).parent().parent().modal('hide');"><?php echo JText::_('JSN_TPLFW_UPGRADE_NOW'); ?></a>
			<button data-dismiss="modal" class="btn" type="button"><?php echo JText::_('JSN_TPLFW_CLOSE'); ?></button>
		</div>
	</div>

	<div class="jsn-form-validation-failed jsn-box-shadow-medium alert alert-error hide">
		<span></span>
		<a href="javascript:void(0);" title="<?php echo JText::_('JSN_TPLFW_CLOSE'); ?>" class="close" onclick="jQuery(this).parent().addClass('hide');">×</a>
	</div>
</div></div>

<div class="jsn-master">
	<div class="jsn-page-footer jsn-bootstrap" id="jsn-footer">
		<div class="pull-left">
			<ul class="jsn-footer-menu">
				<li class="first">
					<a target="_blank" href="http://www.joomlashine.com/joomla-templates/<?php echo $templateName ?>-docs.zip"><?php echo JText::_('JSN_TPLFW_DOCUMENTATION'); ?></a>
				</li>
				<li>
					<a target="_blank" href="http://www.joomlashine.com/contact-us/get-support.html"><?php echo JText::_('JSN_TPLFW_SUPPORT'); ?></a>
				</li>
				<li class="jsn-iconbar">
					<strong>Keep in touch:</strong>
					<a href="http://www.facebook.com/joomlashine" target="_blank" title="Find us on Facebook"><i class="jsn-icon16 jsn-icon-social jsn-icon-facebook"></i></a><a href="http://www.twitter.com/joomlashine" target="_blank" title="Follow us on Twitter"><i "="" class="jsn-icon16 jsn-icon-social jsn-icon-twitter"></i></a><a href="http://www.youtube.com/joomlashine" target="_blank" title="Watch us on YouTube"><i "="" class="jsn-icon16 jsn-icon-social jsn-icon-youtube"></i></a>
				</li>
			</ul>

			<ul class="jsn-footer-menu">
				<li class="first">
					<a target="_blank" href="<?php echo $templateLink ?>"><?php echo JText::_($this->data->template) ?> <?php echo $edition ?> v<?php echo JSNTplHelper::getTemplateVersion($this->data->template) ?></a> by <a target="_blank" href="http://www.joomlashine.com">JoomlaShine.com</a>
					<?php if ($nextEdition) : ?>
					&nbsp;<a class="label label-important jsn-upgrade-link" href="javascript:void()"><strong class="jsn-text-attention"><?php echo JText::_($nextEdition == 'STANDARD' ? 'JSN_TPLFW_UPGRADE_TO_PRO' : 'JSN_TPLFW_UPGRADE_TO_PRO_UNLIMITED'); ?></strong></a>
					<?php endif; ?>
				</li>
				<li class="jsn-outdated-version" id="jsn-global-check-version-result" style="display:none">
					<span class="jsn-global-outdated-version"><?php echo JText::_('JSN_TPLFW_UPDATE_AVAILABLE'); ?></span>
					&nbsp;<a class="label label-important jsn-update-link" data-target="template" href="javascript:void(0)"><?php echo JText::_('JSN_TPLFW_UPDATE_NOW'); ?></a>
				</li>
			</ul>
		</div>

		<div class="pull-right">
			<ul class="jsn-footer-menu">
				<li class="jsn-iconbar first">
					<a href="http://www.joomlashine.com/joomla-extensions/jsn-poweradmin.html" target="_blank" title="JSN PowerAdmin - Manage Joomla websites with ease and joy"><i class="jsn-icon32 jsn-icon-products jsn-icon-poweradmin"></i></a><a href="http://www.joomlashine.com/joomla-extensions/jsn-imageshow.html" target="_blank" title="JSN ImageShow - One Joomla gallery extension for all image presentation needs"><i "="" class="jsn-icon32 jsn-icon-products jsn-icon-imageshow"></i></a><a href="http://www.joomlashine.com/joomla-extensions/jsn-uniform.html" target="_blank" title="JSN UniForm - The most easy, yet sophisticated Joomla form builder extension"><i "="" class="jsn-icon32 jsn-icon-products jsn-icon-uniform"></i></a>
				</li>
			</ul>
		</div>

		<div class="clearbreak"></div>
	</div>
</div>

<!-- Hidden form for saving/restoring template parameters -->
<form id="jsn-template-maintenance-restore-params-form" method="post" enctype="multipart/form-data" target="jsn-silent-save" class="hide">
	<input type="file" name="backup-upload" />
</form>
<iframe id="jsn-silent-save" name="jsn-silent-save" class="hide" src="about:blank"></iframe>

<script type="text/javascript">
	(function($) {
		var	oldJoomlaSubmitButton = Joomla.submitbutton

		// Define function to show a message box
		$.JSNTplMessage = function(msg, type) {
			var	msg = msg || '<?php echo JText::_('JSN_TPLFW_ERROR_FORM_VALIDATION_FAILED'); ?>',
				msgBox = $('#jsn-template-config').children('.jsn-form-validation-failed');

			if (type && type == 'success') {
				msgBox.removeClass('alert-error').addClass('alert-success');
			}

			// Show message box
			msgBox.children('span').html(msg);
			msgBox.removeClass('hide').css('margin-left', '-' + (msgBox.outerWidth() / 2) + 'px');

			// Schedule to hide error message box
			msgBox.timer && clearTimeout(msgBox.timer);

			msgBox.timer = setTimeout(function() {
				msgBox.fadeOut(1000, function() {
					msgBox.addClass('hide').css('display', '');
				});
			}, 5000);

			return (type && type == 'success') ? true : false;
		};

		Joomla.submitbutton = function(task) {
			if (task != 'style.cancel' && !document.formvalidator.isValid(document.id('style-form'))) {
				// Show error message box
				return $.JSNTplMessage();
			}

			// Validate <input type="number" /> fields
			if (task != 'style.cancel') {
				var valid = true;

				$('#style-form input[type="number"]').each(function(i, e) {
					if ($(e).val() == '' || isNaN(Number($(e).val()))) {
						valid = false;

						// Add class to state that field has invalid value
						$(e).addClass('invalid');
					}
				});

				if (!valid) {
					// Show error message box
					return $.JSNTplMessage();
				}
			}

			// Trigger submit button function
			typeof oldJoomlaSubmitButton == 'undefined' || oldJoomlaSubmitButton(task);

			// Hide default error message box in Joomla 3.x
			$('#system-message-container').addClass('hide');
		};

		// Setup tabs
		$('#jsn-template-config-tabs').tabs();

		// Setup event handler to validate custom css/js files
		$('#jsn_cssFiles').blur(function() {
			var files = $(this).val().split("\n"), invalid = [];

			for (var i = 0; i < files.length; i++) {
				!files[i] || files[i].match(/\.(js|css)$/i) || invalid.push(files[i]);
			}

			if (invalid.length) {
				var msg = '<?php echo JText::_('JSN_TPLFW_SYSTEM_CUSTOM_ASSETS_INVALID'); ?>';
				msg += '<ul><li>' + invalid.join('</li><li>') + '</li></ul>';

				$.JSNTplMessage(msg);
			}
		});
	})(jQuery);
</script>
