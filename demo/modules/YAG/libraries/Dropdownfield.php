<?php

/** 
 * Dropdown field
 * 
 * Displays Select Options field
 *
 * @access	public
 *
 * @author Thorsten Schmidt
 * @date 10.08.2009
 * @version 1.0
 * @since 1.0
 */
class Dropdownfield_Core extends Field_Core 
{
    
    /**
    * This field value is marked selected
    * @access protected
    * @var string
    */
    protected $selected = '';
    
    /**
    * Available options
    * @access protected
    * @var array
    */
    protected $options = array();

}

?>