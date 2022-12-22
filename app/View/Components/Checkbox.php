<?php

namespace App\View\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    private string $label;
    private string $field;
    private string $checked;

    /**
     * @param string $label
     * @param string $field
     * @param bool $checked
     */
    public function __construct(string $label, string $field, bool $checked = false)
    {
        $this->label = $label;
        $this->field = $field;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.checkbox',[
            "label" => $this->label,
            "field" => $this->field,
            "checked" => $this->checked,
        ]);
    }
}
