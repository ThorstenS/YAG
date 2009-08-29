<?php

/** 
 * Abstract grid field
 * 
 * Every Field needs to be abstracted from this class
 *
 * @access	public
 *
 * @author Thorsten Schmidt
 * @date 10.08.2009
 * @version 1.0
 * @since 1.0
 */
abstract class Field_Core
{
    /**
    * Field title displayed in <thead>
    * @access protected
    * @var string
    */
    protected $title = '';
    
    /**
    * Column text displayed in <tfoot> column of field
    * @access protected
    * @var string
    */
    protected $foot = '';
    
    /**
    * Fieldname used to retrieve data
    * @access protected
    * @var string
    */
    protected $name = '';
    
    /**
    * Value, set dynamically from grid data
    * @access protected
    * @var string
    */
    protected $value = '';
    
    /**
    * Field extra data, used differently based on fieldtype
    * @access protected
    * @var array
    */
    protected $extra = array();
    
    /**
    * Display sorting options in <thead>
    * @access protected
    * @var boolean
    */
    protected $sortable = false;
    
    /**
    * Path to the templates, set by grid module
    * @access public
    * @var string
    */
    protected $template_path = 'http';
    
    /** 
     * Constructor
     * 
     * Sets field name
     * 
     * @param string    $name   Fieldname
     *
     * @return none
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 10.08.2009
     * @version 1.0
     * @since 1.0
     */
    public function __construct($name) 
    {
        
        $this->name = $name;
        
        Kohana::log('debug', 'Grid :: ' . get_class($this) . ' Module loaded');
        
    } // END function __construct
    
	/** 
     * Magic getter
     * 
     * returns property
     * 
     * @param string    $name  Name of the property to retrieve
     *
     * @return string
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 10.08.2009
     * @version 1.0
     * @since 1.0
     */
    public function __get($name)
    {
        return $this->$name;
    } // END function __get
       
	/** 
     * Sets value of a property
     * 
     * Property must exists, otherwise throws exception
     * 
     * @param string    $key    Name of property
     * @param string    $value    Value
     *
     * @return $this
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 10.08.2009
     * @version 1.0
     * @since 1.0
     */
    public function set($key, $value) 
    {
        
        if(!isset($this->$key)) 
        {
            throw new Kohana_Exception('grid.unknown_property', get_class($this));
        }
        
        $this->$key = $value;
                        
        return $this;
        
    } // END function set
    
    /** 
     * Builds field
     * 
     * fills content
     * 
     * @param none
     *
     * @return string   Field html code
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 10.08.2009
     * @version 1.0
     * @since 1.0
     */
    public function render() 
    {
        return View::factory($this->template_path . 'fields/' . get_class($this))
                            ->set('field', $this)
                            ->render();
        
    } // END function render
    
    
}

?>