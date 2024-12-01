<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class BaseInput extends Component
{
    public $label;
    public $name;
    public $required;
    public $attributes;
    public $boxClass;
    public $labelClass;
    public $inputClass;

    public function __construct(
        $label,
        $name,
        $required = false,
        $attributes = [],
        $boxClass = null,
        $labelClass = null,
        $inputClass = null
    ) {
        $this->label = $label;
        $this->name = $name;
        $this->required = $required;
        $this->attributes = $attributes;
        $this->boxClass = $boxClass ?? ''; // Clase para el label
        $this->labelClass = $labelClass ?? ''; // Clase para el label
        $this->inputClass = $inputClass ?? 'form-control'; // Clase para el input
    }

    public function render()
    {
        return view('components.inputs.base-input');
    }
}
