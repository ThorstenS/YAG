<td>
    <?php echo $field->title; ?>
    <span class="sortable_asc">
        <?php
            echo GRID_TAB . GRID_TAB . 
                html::anchor(url::current() . '?' . $grid->order_field . '=' . $field->name . '&amp;' . 
                $grid->order_direction . '=ASC' , Kohana::lang('grid.asc')) . PHP_EOL;
            
        ?>
    </span>
    <span class="sortable_desc">
        <?php

            echo GRID_TAB . GRID_TAB . 
                html::anchor(url::current() . '?' . $grid->order_field . '=' . $field->name . '&amp;' . 
                $grid->order_direction . '=DESC' , Kohana::lang('grid.desc')) . PHP_EOL;
            
        ?>
    </span>
</td>