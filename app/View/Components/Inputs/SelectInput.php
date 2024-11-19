<?php

namespace App\View\Components\Inputs;

class SelectInput extends BaseInput
{
    public $options;
    public $multiple;

    /**
     * Create a new component instance.
     *
     * @param string $label
     * @param string $name
     * @param array $options
     * @param bool $multiple
     * @param bool $required
     * @param array $attributes
     */
    public function __construct($label, $name, $options = [], $multiple = false, $required = false, $attributes = [])
    {
        parent::__construct($label, $name, $required, $attributes);
        $this->options = $options;
        $this->multiple = $multiple;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.inputs.select-input');
    }
}
