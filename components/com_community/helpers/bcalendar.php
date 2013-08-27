<?php
/**
* @copyright (C) 2013 iJoomla, Inc. - All rights reserved.
* @license GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
* @author iJoomla.com <webmaster@ijoomla.com>
* @url https://www.jomsocial.com/license-agreement
* The PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
* More info at https://www.jomsocial.com/license-agreement
*/

include_once JPATH_ROOT.'/components/com_community/libraries/core.php';

Class CBCalendar
{
    /**
     * Create Bootstrap date-picker
     * @param string $pickerID
     * @param array $properties
     * @param string $dateFormat
     * @return string
     */
    static public function createDatePicker($pickerID, $properties = array() , $dateFormat = 'Y-m-d', $options = '', $viewmode = 'days'){
        
        $curTime = date($dateFormat, time());
        //Convert server format to client format
        $clientFormat = str_replace("y", "yy", $dateFormat);
        $clientFormat = str_replace("Y", "yyyy", $clientFormat);
        $clientFormat = str_replace("m", "mm", $clientFormat);
        $clientFormat = str_replace("n", "m", $clientFormat);
        $clientFormat = str_replace("d", "dd", $clientFormat);
        $clientFormat = str_replace("j", "d", $clientFormat);
        $proStr = '';
        
        //Set default time
        if(empty($properties['value']))
        {
            $properties['value'] = $curTime;
        }
             
        //Set input properties
        if(is_array($properties))
        {
            foreach($properties as $key => $value)
            {
                $proStr .= ' ' . $key . '="' . $value .'" ';
            }
        }
        
        if(empty($options))
            $options = 'format: "' . $clientFormat . '", autoclose: true';
        
        //Datepicker makup
        $datePicker = '<div class="input-append date" id="' . $pickerID . '" data-date="' . $properties['value'] . '" data-date-format="' . $clientFormat . '" data-date-viewmode="' . $viewmode . '">';
        $datePicker .= '<input '. $proStr .'>';
        $datePicker .= '<span class="add-on"><i class="icon-calendar"></i></span>';
        $datePicker .= '</div>';
        
        //Datepicker init
        $datePicker .= '<script type="text/javascript">';
        $datePicker .= 'var bdp_' . $pickerID . ' = joms.jQuery("#'. $pickerID .'").datepicker({';
        $datePicker .= $options;
        $datePicker .= '});';
        $datePicker .= '</script>';
        return $datePicker;
    }
    /**
     * Add new event listener
     * @param string $pickerID
     * @param string $event
     * @param string $javascript
     * @return string
     */
    static public function addEvent($pickerID, $event = 'changeDate', $javascript = 'console.log(ev);'){
        //Add event to datepicker
        $dpEvent = '<script type="text/javascript">';
        $dpEvent .= 'bdp_' . $pickerID . '.on("' . $event . '", function(ev){';
        $dpEvent .= $javascript;
        $dpEvent .= '})';
        $dpEvent .= '</script>';
        return $dpEvent;
    }
}