<?php
/**
 * @package ImpressPages
 *
 */

namespace Modules\developer\form\Field;


class Farbtastic extends Field
{



    public function render($doctype)
    {
        return '<div class="ipmFarbtasticPopup ipsFarbtasticPopup"></div>
        <input '.$this->getAttributesStr($doctype).' class="ipmControlInput ipsControlInput '.implode(' ',$this->getClasses()).'" name="'.htmlspecialchars($this->getName()).'" '.$this->getValidationAttributesStr($doctype).' type="text" value="'.htmlspecialchars($this->getDefaultValue()).'" />';
    }
    
    /**
    * CSS class that should be applied to surrounding element of this field. By default empty. Extending classes should specify their value.
    */
    public function getTypeClass()
    {
        return 'farbtastic';
    }




    /**
     * Validate field
     * @param array $data usually array of string. But some elements could be null or even array (eg. password confirmation field, or multiple file upload field)
     * @param string $valueKey This value key could not exist in values array.
     * @return string return string on error or false on success
     */
    public function validate($values, $valueKey)
    {
        return false;
    }


}