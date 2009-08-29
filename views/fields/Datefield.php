<?php
    
    // Create date object
    $datetime = date_create($field->value, new DateTimeZone($field->timezone));
    
    echo $datetime->format($field->format);
    
?>