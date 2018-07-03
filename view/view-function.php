<?php
function partial($name, $value) {
    require('view/' . $name . '-partial.php');
}

/**
 * @param $title string
 * @param $content string
 * @param $value array
 */
function view($title, $content, $value = []) {
    require('view/layout.php');
}


function make_time(){
    for ($h = 8; $h <= 19; $h++) {
        for ($m = 0; $m <= 45; $m += 15) {
            $minuteString = ($m == 0) ? "00" : $m;
            echo "<option value=\"$h:$minuteString\">$h:$minuteString</option>";
        }
    }
    echo '<option value="20:00">20:00</option>';
}
