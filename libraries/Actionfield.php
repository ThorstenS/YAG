<?php

/** 
 * Actionfield
 * 
 * Displays an actionfield where you can add Edit / Delete... links
 *
 * @access	public
 *
 * @author Thorsten Schmidt
 * @date 10.08.2009
 * @version 1.0
 * @since 1.0
 */
class Actionfield_Core extends Field_Core 
{
    /**
    * The actions set by add_action()
    * @access protected
    * @var array
    */
    protected $action = array();
    
    /**
    * URL where to route actions
    * @access protected
    * @var array
    */
    protected $url = array();
    
    /**
    * Text to be diplayed set by add_action()
    * @access protected
    * @var array
    */
    protected $text = array();
    
    /**
    * Link protocol, usually http
    * @access protected
    * @var string
    */
    protected $protocol = 'http';
    
    /** 
     * Adds action to the field
     * 
     * Creates a link for each action you define
     * 
     * @param string    $action     Action to be called in URL
     * @param string    $valuefield Which field to use for ID?
     * @param string    $label      Label of link
     * @param string    $link       Route link to this URL
     *
     * @return $this
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 10.08.2009
     * @version 1.0
     * @since 1.0
     */
    public function add_action($action, $valuefield, $label, $link = '') 
    {
        
        $this->action[$action] = $valuefield;
        $this->text[$action] = $label;
        $this->url[$action] = $link;
        
        return $this;
        
    } // END function add_action
    
}

?>