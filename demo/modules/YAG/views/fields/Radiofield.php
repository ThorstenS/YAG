<?php
    
    $selected = false;
    
    if($field->value == $field->selected) {
        $selected = true;
    }
    
    echo form::radio($field->name, $field->value, $selected, form::attributes($field->extra));

?>