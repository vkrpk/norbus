<?php

function insertInput(string $label, string $name, string $type){
    return <<<HTML
        <div class='box-dates-item'>
            <label for="$name">$label</label>
            <input type="$type">
        </div>
    HTML;
}

function insertSelect(string $label, string $name, array $options){
    $html_options = [];

    foreach ($options as $key => $option) {
        $html_options[] = "<option value='" . $option->id . "'>" .
        $option->nom . "</option>";
    }
    return "
        <div class='selectInputDirection'>
            <label for='$name'>$label</label>
            <select name='$name' id='$name'>" .
            implode('', $html_options) .
            "</select>
        </div>";
 }


