<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TagForm extends Component
{
    public $action;
    public $method;
    public $tag;

    public function __construct($action = '', $method = 'POST', $tag = null)
    {
        $this->action = $action;
        $this->method = $method;
        $this->tag = $tag;
    }

    public function render()
    {
        return view('components.tag-form');
    }
}