<?php

function insertInput(string $label, string $name, string $type, $value = null){
    return <<<HTML
        <div class='box-dates-item'>
            <label for="date{$label}">$label</label>
            <input id="date{$label}" type="$type" value="{$value}" name="{$name}">
        </div>
HTML;
}

function insertSelect(string $label, string $name, array $options, $value = null){
    $html_options = [];
    foreach ($options as $key => $option) {
        $isSelected ="";
        if($value !== null && $value === $option->id){
            $isSelected = "selected";
        }
        $html_options[] = "<option $isSelected value='" . $option->id . "'>" .
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


