<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileUploadHome extends Component
{

    public $name;
    public $label;
    public $multiple;

    public function __construct($name,$label,$multiple = false)
    {
        $this->name  = $name;
        $this->label = $label;
        $this->multiple  = $multiple;
    }

    public function render()
    {
        return view('components.file-upload-home');
    }
}
