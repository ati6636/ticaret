<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    private string $type;
    private string $label;
    private string $placeholder;
    private string $field;
    private string $value;

    /**
     * @param string $type
     * @param string $label
     * @param string $placeholder
     * @param string $field
     * @param string $value
     */
    public function __construct(string $label, string $placeholder, string $field, string $value = "",string $type="text")
    {
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->field = $field;
        $this->value = $value;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.input',[
            "type" => $this->type,
            "label" => $this->label,
            "placeholder" => $this->placeholder,
            "field" => $this->field,
            "value" => $this->value,
        ]);
    }
}
