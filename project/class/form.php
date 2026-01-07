<?php

class Form
{
    // INPUT TEXT, NUMBER, PASSWORD, DLL
    public static function input($type, $name, $value = '', $placeholder = '', $required = true)
    {
        $req = $required ? 'required' : '';

        return "
        <div class='form-group'>
            <input 
                type='$type' 
                name='$name' 
                value='$value' 
                placeholder='$placeholder'
                $req
            >
        </div>
        ";
    }

    // TEXTAREA
    public static function textarea($name, $value = '', $placeholder = '', $required = true)
    {
        $req = $required ? 'required' : '';

        return "
        <div class='form-group'>
            <textarea 
                name='$name' 
                placeholder='$placeholder'
                $req
            >$value</textarea>
        </div>
        ";
    }

    // SELECT / DROPDOWN
    public static function select($name, $options = [], $selected = '')
    {
        $html = "<div class='form-group'><select name='$name'>";

        foreach ($options as $value => $label) {
            $isSelected = ($value == $selected) ? 'selected' : '';
            $html .= "<option value='$value' $isSelected>$label</option>";
        }

        $html .= "</select></div>";
        return $html;
    }

    // SUBMIT BUTTON
    public static function submit($value = 'Simpan')
    {
        return "
        <div class='form-action'>
            <button type='submit' class='btn'>$value</button>
        </div>
        ";
    }
}
