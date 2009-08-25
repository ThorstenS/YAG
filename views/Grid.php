<?php
    
    // Start building table
    if($grid->get('display_table')) 
    {
        
        echo '<table' . form::attributes($grid->table_attributes) . '>' . PHP_EOL;
        
    }
    
    // Show table head
    if($grid->get('display_head')) 
    {
        
        echo GRID_TAB . '<thead' . form::attributes($grid->head_attributes) . '>' . PHP_EOL;
        echo GRID_TAB . GRID_TAB . '<tr>' . PHP_EOL;
            
            foreach($grid->fields AS $field) 
            {
                
                if($field->sortable === true) {
                    echo View::factory($grid->template_path . 'Sortablehead')
                            ->set('grid', $grid)
                            ->set('field', $field)
                            ->render();
                }
                else 
                {
                    echo GRID_TAB . GRID_TAB . GRID_TAB . '<td>' . $field->title . '</td>' . PHP_EOL;
                }
                
            }
        
        echo GRID_TAB . GRID_TAB . '</tr>' . PHP_EOL;
        
        if($grid->get('extra_row_head')) 
        {
    
            echo GRID_TAB . GRID_TAB . '<tr>' . PHP_EOL;
            echo GRID_TAB . GRID_TAB . GRID_TAB . $grid->extra_row_head . PHP_EOL;
            echo GRID_TAB . GRID_TAB . '</tr>' . PHP_EOL;
        }
    
    
        echo GRID_TAB . '</thead>' . PHP_EOL;
    }
    
    // Show table head
    if($grid->get('display_foot')) 
    {
        
        echo GRID_TAB . '<tfoot' . form::attributes($grid->foot_attributes) . '>' . PHP_EOL;
        echo GRID_TAB . GRID_TAB . '<tr>' . PHP_EOL;
            
            foreach($grid->fields AS $field) 
            {
                
                echo GRID_TAB . GRID_TAB . GRID_TAB . '<td>' . $field->foot . '</td>' . PHP_EOL;
                
            }
        
        echo GRID_TAB . GRID_TAB . '</tr>' . PHP_EOL;
        
        if($grid->get('extra_row_foot')) 
        {
    
            echo GRID_TAB . GRID_TAB . '<tr>' . PHP_EOL;
            echo GRID_TAB . GRID_TAB . GRID_TAB . $grid->extra_row_foot . PHP_EOL;
            echo GRID_TAB . GRID_TAB . '</tr>' . PHP_EOL;
        }
        
        echo GRID_TAB . '</tfoot>' . PHP_EOL;
    }
    
    if($grid->get('display_body')) 
    {
        
        echo GRID_TAB . '<tbody' . form::attributes($grid->body_attributes) . '>' . PHP_EOL;
        
    }
    
    $i = 0;
    // Now go for the rows
    foreach($grid->data AS $data_row) 
    {
        
        if(($i % 2) == 1) 
        {
            
            $class=$grid->css_class_row_B;
            
        } 
        else 
        {
            $class=$grid->css_class_row_A;
        }
        
        $i++;
        
        echo GRID_TAB . GRID_TAB . '<tr class="' . $class . '">' . PHP_EOL;
        
        foreach($grid->fields AS $field) 
        {
                
                if($field instanceof Actionfield_Core) 
                {
                    
                    $field->set('value', $data_row);
                    
                } 
                else 
                {
                    
                    $field->set('value', $data_row->{$field->name});
                    
                }
                
                echo GRID_TAB . GRID_TAB . GRID_TAB . '<td>' . $field->render() . '</td>' . PHP_EOL;
                
        }
        
        echo GRID_TAB . GRID_TAB . '</tr>' . PHP_EOL;
                
    }

    if($grid->get('extra_row_body')) 
    {
    
        echo GRID_TAB . GRID_TAB . '<tr>' . PHP_EOL;
            
        echo GRID_TAB . GRID_TAB . GRID_TAB . $grid->extra_row_body . PHP_EOL;
            
        echo GRID_TAB . GRID_TAB . '</tr>' . PHP_EOL;
    }
    
    if($grid->get('display_body')) 
    {
        
        echo GRID_TAB . '</tbody>' . PHP_EOL;
        
    }
    

    if($grid->get('display_table')) 
    {
        echo '</table>' . PHP_EOL;
    }
?>