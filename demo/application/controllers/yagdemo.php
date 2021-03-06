<?php defined('SYSPATH') OR die('No direct access allowed.');

class Yagdemo_Controller extends Template_Controller {

	// Set the name of the template to use
	public $template = 'template';

	public function index($page = 1)
	{
        $db = new Database();
        
		// You can assign anything variable to a view by using standard OOP
		// methods. In my welcome view, the $title variable will be assigned
		// the value I give it here.
		$this->template->title = 'Welcome to YAG demo!';

        $grid = Grid::factory()->
                        // Optional parameters
                        set('display_head', true)->
                        set('display_foot', true)->
                        set('display_body', true)->
                        set('table_attributes', array('id' => 'demo_table_1', 'width' => '100%'));
                        
        $grid->CheckboxField('id')->
                            set('title', 'ID')->
                            // Array with Checkbox values that are checked by default
                            set('checked', array(2,3,4, 6, 9))->
                            // Can be sorted by ID
                            set('sortable', true)->
                            // Add extra data to the foot row
                            set('foot', 
                                form::checkbox('checkall', 'yes', false, "onclick=\"check_all('id[]');\"") . 
                                form::dropdown('action',array('edit' => 'Edit', 'delete' => 'Delete'),'edit') . 
                                form::submit('submit', 'OK')
                                )->
                            set('extra', array("onclick" => "checkbox_check('id[]')"))
                            ;
        
        $grid->TextField('id')->
                            set('title', 'ID')->
                            set('sortable', true);
                            
        $grid->TextField('text')->
                            set('title', 'Text')->
                            set('sortable', true);
        
        $grid->DateField('date')->
                            set('title', 'Date')->
                            // Date format
                            set('format', 'Y-m-d')->
                            set('sortable', true);
                                                
        $grid->ActionField()->
                            set('title', 'Action')->
                            // Add action "edit", linked to a specific controller
                            add_action('edit', 'id', 'Edit', 'http://www.path.to/my/controller')->
                            // Add action "delete"
                            add_action('delete', 'id', 'Delete');
        
        $offset = (int) ($page - 1) * 10 ;
        $offset = $offset < 0 ? 0 : $offset;
        
        $order_field = 'id';
        $order_direction = 'asc'; 
        
        if( $this->input->get('order_by') and 
            $grid->field_exists($order_field, true)) {
            $order_field = $this->input->get('order_by');
        }
        
        if( $this->input->get('order_direction') and 
            in_array(strtoupper($this->input->get('order_direction')), array('ASC', 'DESC'))) {
            $order_direction = strtoupper($this->input->get('order_direction'));
            
        }
                
        $data = $db->select($grid->get_fields(true))->
                       from('demotable')->
                       limit(10)->
                       offset($offset)->
                       orderby($order_field, $order_direction)->
                       get();
        
        $count = $db->query('SELECT FOUND_ROWS() AS rows;')->current();
        
        $this->pagination = new Pagination(array('total_items' => $count->rows,
                                                 'items_per_page' =>  10
                                                ));
        
        $grid->set('extra_row_foot', '<td colspan="' . count($grid->fields) . '">' . $this->pagination->render() . '</td>');


        $grid->set('data', $data);
        
        $html = $grid->render();
        
        // Get Javascript for checkbox gimmicks
        $this->template->checkall_js = $grid->render_js('checkall');
        
        $this->template->content = $html;
        
	}

	public function __call($method, $arguments)
	{
		// Disable auto-rendering
		$this->auto_render = FALSE;

		// By defining a __call method, all pages routed to this controller
		// that result in 404 errors will be handled by this method, instead of
		// being displayed as "Page Not Found" errors.
		echo 'This text is generated by __call. If you expected the index page, you need to use: welcome/index/'.substr(Router::$current_uri, 8);
	}

} // End Welcome Controller