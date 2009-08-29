<?php
    
    $checked = false;
    
    // Is this field to be checked?
    if(is_array($field->checked)) 
    {
        
        if(in_array($field->value, $field->checked)) 
        {
            $checked = true;
        }
        
    } 
    elseif($field->value == $field->checked) 
    {
        $checked = true;
    }
    
    echo form::checkbox($field->name . '[]', $field->value, $checked, form::attributes($field->extra));

?>