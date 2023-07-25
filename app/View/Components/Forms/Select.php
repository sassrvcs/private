<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    public $id;
    public $name;
    public $label;
    public $value;
    public $class;
    public $mandate;
    public $options;
    public $selectedOptions;

    /**
     * Create a new component instance.
     */
    public function __construct($options, $selectedOptions="", $label, $value = null, $id = null, $name = null, $class = null, $mandate = "")
    {
        $this->id           = $id;
        $this->name         = $name;
        $this->label        = $label;
        $this->value        = $value;
        $this->class        = $class;
        $this->options[]    = $options;
        $this->mandate      = $mandate;
        $this->selectedOptions = $selectedOptions;    
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.select');
    }

    // public function isSelected($option)
    // {
    //     return in_array($option, $this->selectedOptions);
    // }
}
