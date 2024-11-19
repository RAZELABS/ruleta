<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $action;
    public $method;
    public $class;
    public $enctype;

    /**
     * Create a new component instance.
     *
     * @param string $action
     * @param string $method
     * @param string $class
     * @param array $attributes
     * @param string|null $enctype
     */
    public function __construct($action, $method = 'POST', $enctype = null, $class = null, $attributes = [] )
    {

        $this->action = $action;
        $this->method = strtoupper($method);
        $this->enctype = $enctype;
        $this->attributes = $attributes;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.form');
    }
}
