<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class textareaHome extends Component
{
    public $name, $label, $required, $type,$value;

    public function __construct($name ,$value = null, $label ="", $required = false, $type = 'text')
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->required = $required;
        $this->type = $type;
    }

    public function render(): View|Closure|string
    {
        return view('components.textarea-home');
    }
}
