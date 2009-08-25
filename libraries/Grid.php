<?php defined('SYSPATH') OR die('No direct access allowed.');

define('GRID_TAB', "\t");

/** 
 * Grid Class
 * 
 * Provides functions create a grid
 *
 * @access	public
 *
 * @author Thorsten Schmidt
 * @date 10.08.2009
 * @version 1.0
 * @since 1.0
 */
class Grid_Core {
    
    /**
    * Path to the templates
    * @access public
    * @var string
    */
    protected $template_path = '';
    
    /**
    * Grid fields
    * @access protected
    * @var array
    */
    private $fields = array();
    
    /**
    * Data to fill into fields
    * @access private
    * @var Database ressource
    */
    private $data = null;
    
    /**
    * Display <thead><tfoot><tbody> Tags or only plain table?
    * Note: Not all combinations make sense! Check on html.w3.org
    * @access private
    * @var boolean
    */
    private $display_table   = true;
    private $display_head    = true;
    private $display_foot    = true;
    private $display_body    = true;
    
    /**
    * <thead><tfoot><tbody> Attributed to be added into declaration
    * @access private
    * @var array
    */
    private $table_attributes = array();
    private $head_attributes  = array();
    private $foot_attributes  = array();
    private $body_attributes  = array();
            
    /**
    * CSS Class name for even / uneven Rows
    * @access private
    * @var string
    */
    private $css_class_row_A = 'rowA';
    private $css_class_row_B = 'rowB';
    
    /**
    * Additional row inserted below last row in <thead><tfoot><tbody> section
    * <tr> is set automatically, note: You must set <td>'s respectiong your table layout
    * @access private
    * @var string
    */
    private $extra_row_head = null;
    private $extra_row_body = null;
    private $extra_row_foot = null;
    
    /**
    * The name of the variables that are used to identify the order field and direction
    * e.g. ?order_by=FIELDNAME&order_direction=ASC
    * @access private
    * @var string
    */
    private $order_field        = 'order_by';
    private $order_direction    = 'order_direction';
    
    /**
	 * Create an instance of Grid.
	 *
	 * @return  object
	 */
	public static function factory($template_path = null)
	{
		return new Grid($template_path);
	}
	
    /** 
     * Constructor
     * 
     * Sets template path
     * 
     * @param string    $template_path  Path to Grid templates, default: null
     *
     * @return none
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 10.08.2009
     * @version 1.0
     * @since 1.0
     */
    public function __construct($template_path = null) 
    {
        Benchmark::start('GridModule Loading');
        
        if($template_path) 
        {
            $this->template_path = $template_path;
        }
        
        Kohana::log('debug', 'Grid :: Grid_Core Module loaded');
        
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
    }

    /** 
     * Setter
     * 
     * Sets properties
     * 
     * @param string    $key  Name of property
     * @param mixed    $value  Value of property
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
        $this->$key = $value;

        return $this;
        
    } // END function 
    
    /** 
     * Getter
     * 
     * Gets properties
     * 
     * @param string    $key  Name of property
     *
     * @return property value
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 10.08.2009
     * @version 1.0
     * @since 1.0
     */
    function get($key) 
    {
        return $this->$key;
        
    } // END function 
    
    /** 
     * Returns field names as string, seperated with commata
     *
     * Handy for querying the database
     *
     * @return string   fieldnames
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 13.08.2009
     * @version 1.0
     * @since 1.0
     */
    public function get_fields($count = false) {
        
        $return = '';
        
        $i = 0;
        foreach($this->get('fields') as $field) 
        {
            if($count === true AND $i == 0) 
            {
                $return .= 'SQL_CALC_FOUND_ROWS(`' . $field->name . '`), ';
                $i = 1;
            } 
            else
            {
                $return .= $field->name . ', ';
            }
        }
        
        return substr($return, 0, -2);
        
    } // END function 
    
    /** 
     * Check if a field exists
     * 
     * @param string    $fieldname  Name of field
     * @param boolean    $is_sortable  Check if field is marked sortable
     *
     * @return boolean  true / false
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 20.08.2009
     * @version 1.0
     * @since 1.0
     */
    public function field_exists($fieldname, $is_sortable = null) 
    {
        
        foreach($this->get('fields') AS $field) 
        {
            
            if($field->name == $fieldname) 
            {
                
                if($is_sortable === true) 
                {
                    
                    if($field->sortable === true) 
                    {
                        return true;
                    } 
                    else 
                    {
                        return false;
                    }
                    
                }
                
                return true;
            }
            
        }
        
    } // END function field_exists
    
    /** 
     * Magic call method
     * 
     * Created new fields
     * 
     * @param string    $method field type
     * @param string    $arguments field name
     *
     * @return field object
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 10.08.2009
     * @version 1.0
     * @since 1.0
     */
    public function __call($method, $arguments) 
    {
        // Class name
		$field = ucfirst(strtolower($method));

		// Create the field
		$field = new $field($arguments[0]);

		if (!($field instanceof Field_Core)) 
		{
			throw new Kohana_Exception('grid.unknown_field', get_class($field));
		}
        
        $field->set('template_path', $this->template_path);
        
		$this->fields[] = $field;
		
		return $field;
        
    } // END function __call
    
    /** 
     * Build grid
     * 
     * fills content and returns html code
     * 
     * @param none
     *
     * @return string   html code
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 10.08.2009
     * @version 1.0
     * @since 1.0
     */
    function render() 
    {
        return View::factory($this->template_path . get_class($this))
                            ->set('grid', $this)
                            ->render();
        
    } // END function render
        
    /** 
     * Destrcutor
     * 
     * Stops benchmarking
     *
     * @access	public
     *
     * @author Thorsten Schmidt
     * @date 10.08.2009
     * @version 1.0
     * @since 1.0
     */
    public function __destruct() 
    {
        Benchmark::stop('GridModule Loading');
        
    } // END function __destruct
    
}

?>