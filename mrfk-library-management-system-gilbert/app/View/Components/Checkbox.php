<?php
namespace App\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public $name;
    public $id;
    public $checked;

    public function __construct($name, $id = null, $checked = null)
    {
        // Directly assign the values from the constructor
        $this->name = $name;
        $this->id = $id ?? $name;  // Default ID is the same as name if not provided
        $this->checked = $checked ?? false;  // Default checked value is false if not provided
    }

    public function render()
    {
        return view('components.checkbox');
    }
}
