<?php

function insertInput(string $label, string $name, string $type, $value = null){
    return <<<HTML
        <div class='box-dates-item'>
            <label for="date{$label}">$label</label>
            <input id="date{$label}" type="$type" value="{$value}" name="{$name}">
        </div>
HTML;
}

function insertSelect(string $label, string $name, array $options, $value = null, $multiple = null){
    $html_options = [];
    if ($multiple !== null) {
        $multiple = 'multiple';
    }
    foreach ($options as $key => $option) {
        $isSelected ="";
        if($value !== null && $value === $option->id){
            $isSelected = "selected";
        }
        $html_options[] = "<option $isSelected value='" . $option->id . "'>" .
        $option->nom . "</option>";
    }
    // dd($multiple);
    return "
        <div class='selectInputDirection'>
            <label for='$name'>$label</label>
            <select name='$name' id='$name' $multiple>" .
            implode('', $html_options) .
            "</select>
        </div>";
}


