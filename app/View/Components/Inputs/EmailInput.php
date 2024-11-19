<?php

namespace App\View\Components\Inputs;

class EmailInput extends BaseInput
{
    public $placeholder;

    public function __construct($label, $name, $placeholder = null, $required = false, $attributes = [])
    {
        parent::__construct($label, $name, $required, $attributes);
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.inputs.email-input');
    }
}
