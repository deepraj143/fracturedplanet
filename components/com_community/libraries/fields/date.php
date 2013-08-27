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
jimport('joomla.utilities.date');
require_once (COMMUNITY_COM_PATH.'/libraries/fields/profilefield.php');
class CFieldsDate extends CProfileField
{
	/**
	 * Method to format the specified value for text type
	 **/
	public function getFieldData( $field )
	{
		$value = $field['value'];
		if( empty( $value ) )
			return $value;

		if(! class_exists('CFactory'))
		{
			require_once( JPATH_ROOT .'/components/com_community/libraries/core.php' );
		}
		require_once( JPATH_ROOT .'/components/com_community/models/profile.php' );
		$params	= new CParameter($field['params']);
		$format = $params->get('date_format');
		$model	= CFactory::getModel( 'profile' );
		$myDate = $model->formatDate($value,$format);

		return $myDate;
	}

	public function getFieldHTML( $field , $required )
	{
		$params	= new CParameter($field->params);
		$html	= '';

		$day	= '';
		$month	= 0;
		$year	= '';

		$readonly	= $params->get('readonly') && !COwnerHelper::isCommunityAdmin() ? ' readonly=""' : '';
		$style 		= $this->getStyle()?' style="' .$this->getStyle() . '" ':'';

		if(! empty($field->value))
		{
		    if(! is_array($field->value))
		    {
				$myDateArr	= explode(' ', $field->value);
			}
			else
			{
			    $myDateArr[0]  = $field->value[2] . '-' . $field->value[1] . '-' . $field->value[0];
			}

			if(is_array($myDateArr) && count($myDateArr) > 0)
			{
				$myDate	= explode('-', $myDateArr[0]);

				if(strlen($myDate[0])>2)
				{
					$year	= !empty($myDate[0]) ? $myDate[0] : '';
					$day	= !empty($myDate[2]) ? $myDate[2] : '';
				}
				else
				{
					$day	= !empty($myDate[0]) ? $myDate[0] : '';
					$year	= !empty($myDate[2]) ? $myDate[2] : '';
				}

				$month	= !empty($myDate[1]) ? $myDate[1] : 0;

			}
		}

		$months	= Array(
						JText::_('COM_COMMUNITY_MONTH_JANUARY'),
						JText::_('COM_COMMUNITY_MONTH_FEBRUARY'),
						JText::_('COM_COMMUNITY_MONTH_MATCH'),
						JText::_('COM_COMMUNITY_MONTH_APRIL'),
						JText::_('COM_COMMUNITY_MONTH_MAY'),
						JText::_('COM_COMMUNITY_MONTH_JUNE'),
						JText::_('COM_COMMUNITY_MONTH_JULY'),
						JText::_('COM_COMMUNITY_MONTH_AUGUST'),
						JText::_('COM_COMMUNITY_MONTH_SEPTEMBER'),
						JText::_('COM_COMMUNITY_MONTH_OCTOBER'),
						JText::_('COM_COMMUNITY_MONTH_NOVEMBER'),
						JText::_('COM_COMMUNITY_MONTH_DECEMBER')
						);

		$class	= ($field->required == 1) ? ' required' : '';
		$class	.= !empty( $field->tips ) ? ' jomNameTips tipRight' : '';
		$title = ' title="' . CStringHelper::escape( JText::_( $field->tips ) ) . '"';
                //CFactory::load( 'helpers' , 'string' );

                //$class	= !empty( $field->tips ) ? ' jomNameTips tipRight' : '';
		$html .= '<div style="display: inline-block; " title="' . CStringHelper::escape( JText::_( $field->tips ) ). '">';
                
                //New date picker
                $html .= CBCalendar::createDatePicker('datefieldpicker'.$field->id, array(
                        'class' => 'span2 required input-small',
                        'size' => '10',
                        'style' => 'width:auto;',
                        'type' => 'text',
                        'value' => ((empty($year))?'0000':$year) . '-' . (((int)$month < 10)? '0'.$month: $month) . '-' . (((int)$day < 10)? '0'.$day: $day),
                        'id' => 'datefield'.$field->id,
                        'readonly' => 'true'),
                     'Y-m-d',
                     '' ,
                     'years'
                   );
                $html .= CBCalendar::addEvent('datefieldpicker'.$field->id, 'changeDate', '
                     updateFields'.$field->id.'();
                ');
		// Individual field should not have a tooltip
		//$class	= '';
                $html .= '<script type="text/javascript">
                    function updateFields'.$field->id.'(){
                        var dayVal = new Date(joms.jQuery(\'#datefield'.$field->id.'\').val());
                        joms.jQuery(\'#dp_birth_date\').val(dayVal.getDate());
                        joms.jQuery(\'#dp_birth_month\').val(dayVal.getMonth()+1);
                        joms.jQuery(\'#dp_birth_year\').val(dayVal.getFullYear());
                    }
                </script>';
		$html .= '<input type="hidden" name="field' . $field->id . '[]" id="dp_birth_date" value="' . $day . '" /> ';
                $html .= '<input type="hidden" name="field' . $field->id . '[]" id="dp_birth_month" value="' . $month . '" /> ';
		$html .= '<input type="hidden" name="field' . $field->id . '[]" id="dp_birth_year" value="' . $year . '" /> ';
		$html .= '<span id="errfield'.$field->id.'msg" style="display:none;">&nbsp;</span>';
		$html .= '</div>';

		return $html;
	}

	public function isValid( $value , $required )
	{
		if( ($required && empty($value)) || !isset($this->fieldId))
		{
			return false;
		}

		$db		= JFactory::getDBO();
		$query	= 'SELECT * FROM '.$db->quoteName('#__community_fields')
				. ' WHERE '.$db->quoteName('id').'='.$db->quote($this->fieldId);
		$db->setQuery($query);
		$field	= $db->loadAssoc();

		$params	= new CParameter($field['params']);
		$max_range = $params->get('maxrange');
		$min_range = $params->get('minrange');
		$value = JFactory::getDate(strtotime($value))->toUnix();
		$max_ok = true;
		$min_ok = true;

		//$ret = true;

		if ($max_range)
		{
			$max_range = JFactory::getDate(strtotime($max_range))->toUnix();
			$max_ok = ($value < $max_range);
		}
		if ($min_range)
		{
			$min_range = JFactory::getDate(strtotime($min_range))->toUnix();
			$min_ok = ($value > $min_range);
		}

		return ($max_ok && $min_ok) ? true : false;
		//return $ret;
	}

	public function formatdata( $value )
	{
		$finalvalue = '';

		if(is_array($value))
		{
			if( empty( $value[0] ) || empty( $value[1] ) || empty( $value[2] ) )
			{
				$finalvalue = '';
			}
			else
			{
				$day	= intval($value[0]);
				$month	= intval($value[1]);
				$year	= intval($value[2]);

				$day 	= !empty($day) 		? $day 		: 1;
				$month 	= !empty($month) 	? $month 	: 1;
				$year 	= !empty($year) 	? $year 	: 1970;

				if( !checkdate($month, $day, $year) )
				{
					return $finalvalue;
				}

				$finalvalue	= $year . '-' . $month . '-' . $day . ' 23:59:59';
			}
		}

		return $finalvalue;
	}

	public function getType()
	{
		return 'date';
	}
}
