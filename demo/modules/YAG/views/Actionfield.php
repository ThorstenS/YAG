<?php
    
    // For every action that we got
    foreach($field->action AS $action => $value_field) 
    {
        
        // Create <a href="URL/action/ID">TEXT</a> 
        $link = '/' . $action . '/' . $field->value->{$value_field};
        
        echo html::anchor($field->url[$action] . $link, $field->text[$action], $field->extra, $field->protocol) . ' ';
        
    }

?>