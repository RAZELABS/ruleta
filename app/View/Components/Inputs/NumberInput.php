<?php

namespace App\View\Components\Inputs;

class NumberInput extends BaseInput
{
    public $min;
    public $max;
    public $step;
    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @param string $label
     * @param string $name
     * @param int|null $min
     * @param int|null $max
     * @param int|null $step
     * @param string|null $placeholder
     * @param bool $required
     * @param array $attributes
     */
    public function __construct($label, $name, $min = null, $max = null, $step = null, $placeholder = null, $required = false, $attributes = [])
    {
        parent::__construct($label, $name, $required, $attributes);
        $this->min = $min;
        $this->max = $max;
        $this->step = $step;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.inputs.number-input');
    }
}
