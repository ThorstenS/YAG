<?php

/** 
 * Datefield
 * 
 * Displays formatted date
 *
 * @access	public
 *
 * @author Thorsten Schmidt
 * @date 10.08.2009
 * @version 1.0
 * @since 1.0
 */
class Datefield_Core extends Field_Core 
{
    /**
    * Timezone
    * @access proteced
    * @var string
    */
    protected $timezone = 'Europe/Berlin';
    
    /**
    * Format
    * @access protected
    * @var string
    */
    protected $format = 'd.m.Y H:m:s';
}

?>