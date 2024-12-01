<?php

namespace App\View\Components\Inputs;

class TextInput extends BaseInput
{
    public $placeholder;

    public function __construct(
        $label,
        $name,
        $placeholder = null,
        $required = false,
        $attributes = [],
        $labelClass = null,
        $boxClass = null,
        $inputClass = null
    ) {
        parent::__construct(label: $label, name: $name, required: $required, attributes: $attributes, boxClass: $boxClass, labelClass: $labelClass, inputClass: $inputClass);
        $this->placeholder = $placeholder ?? '';
    }

    public function render()
    {
        return view('components.inputs.text-input');
    }
}
