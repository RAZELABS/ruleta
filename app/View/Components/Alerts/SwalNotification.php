<?php

namespace App\View\Components\Alerts;

use Illuminate\View\Component;

class SwalNotification extends Component
{
    public $icon;
    public $title;
    public $text;
    public $timer;
    public $showConfirmButton;

    public function __construct($icon = 'success', $title = '', $text = '', $timer = 2000, $showConfirmButton = false)
    {


        $this->icon = $icon;
        $this->title = $title;
        $this->text = $text;
        $this->timer = $timer;
        $this->showConfirmButton = $showConfirmButton;
    }

    public function render()
    {
        return view('components.alerts.swal-notification');
    }
}
