<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inputHome extends Component
{
    public $name, $label, $required, $type,$value;
    /**
     * Create a new component instance.
     */
    public function __construct($name ,$value = null, $label ="", $required = false, $type = 'text')
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->required = $required;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-home');
    }
}
