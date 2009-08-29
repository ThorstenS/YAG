<?php
    echo form::dropdown($field->name, $field->options, $field->value, form::attributes($field->extra));
?>