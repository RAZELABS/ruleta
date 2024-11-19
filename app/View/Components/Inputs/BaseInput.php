<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class BaseInput extends Component
{
    public $label;
    public $name;
    public $required;
    public $attributes;

    /**
     * Create a new component instance.
     *
     * @param string $label
     * @param string $name
     * @param bool $required
     * @param array $attributes
     */
    public function __construct($label, $name, $required = false, $attributes = [])
    {
        $this->label = $label;
        $this->name = $name;
        $this->required = $required;
        $this->attributes = $attributes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.inputs.base-input');
    }
}
