<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileUpload extends Component
{

    public $name;
    public $placeholder;
    public $value;
    public $multiple;

    public function __construct($name,$placeholder,$value = null,$multiple = false)
    {
        $this->name  = $name;
        $this->placeholder = $placeholder;
        $this->value  = $value;
        $this->multiple  = $multiple;
    }

    public function render()
    {
        return view('components.file-upload');
    }
}
