<?php

class Elgentos_Codebase_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function mapColours($colour) {
        $mapping['blue'] = '#43A8D7';
        $mapping['red'] = '#D62222';
        $mapping['grey'] = '#606060';
        $mapping['orange'] = '#EF8D18';

        return (isset($mapping[$colour]) ? $mapping[$colour] : $colour);
    }
    
    public function getBrowsers() {
        $browsers['Chrome'][] = "14";
        $browsers['Chrome'][] = "15";
        $browsers['Chrome'][] = "16";
        $browsers['Chrome'][] = "17";
        $browsers['Chrome'][] = "18";
        $browsers['Chrome'][] = "19";
        $browsers['Chrome'][] = "20";
        $browsers['Chrome'][] = "21";
        $browsers['Chrome'][] = "22";
        $browsers['Chrome'][] = "23";
        $browsers['Chrome'][] = "24";
        
        $browsers['Internet Explorer'][] = "6";
        $browsers['Internet Explorer'][] = "7";
        $browsers['Internet Explorer'][] = "8";
        $browsers['Internet Explorer'][] = "9";

        $browsers['Safari'][] = "3";
        $browsers['Safari'][] = "4";
        $browsers['Safari'][] = "5";
        $browsers['Safari'][] = "iPad";
        $browsers['Safari'][] = "iPhone";
        
        $browsers['Firefox'][] = "3.5";
        $browsers['Firefox'][] = "3.6";
        $browsers['Firefox'][] = "4";
        $browsers['Firefox'][] = "5";
        $browsers['Firefox'][] = "6";
        $browsers['Firefox'][] = "7";
        $browsers['Firefox'][] = "8";
        $browsers['Firefox'][] = "9";
        $browsers['Firefox'][] = "10";
        $browsers['Firefox'][] = "11";
        $browsers['Firefox'][] = "12";
        $browsers['Firefox'][] = "13";
        $browsers['Firefox'][] = "14";
        $browsers['Firefox'][] = "15";
        $browsers['Firefox'][] = "16";
        $browsers['Firefox'][] = "Other";
        
        $browsers['Opera'][] = "10";
        $browsers['Opera'][] = "11";
        $browsers['Opera'][] = "12";
        $browsers['Opera'][] = "Mobile"; 
        $browsers['Opera'][] = "Mini";
        return $browsers;
    }

    public function icon($icon,$alt=null) {
        $path = 'skin/adminhtml/default/default/images/codebase/'.strtolower($icon).'.png';
        if(empty($alt)) $alt = $this->__(ucwords($icon));
        if(file_exists($path)) {
            $absPath = str_replace('skin/',Mage::getBaseUrl('skin'),$path);
            return '<img src="'.$absPath.'" alt="'.$alt.'" title="'.$alt.'" />';
        } else {
            return false;
        }
    }
}