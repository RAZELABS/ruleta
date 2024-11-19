<?php

namespace App\View\Components\Inputs;

class TextInput extends BaseInput
{
    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @param string $label
     * @param string $name
     * @param string|null $placeholder
     * @param bool $required
     * @param array $attributes
     */
    public function __construct($label, $name, $placeholder = null, $required = false, $attributes = [])
    {
        parent::__construct($label, $name, $required, $attributes);
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.inputs.text-input');
    }
}
