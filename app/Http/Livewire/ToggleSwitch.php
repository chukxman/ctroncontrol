<?php

namespace App\Http\Livewire;

use Livewire\Component;
use illuminate\Database\Eloquent\Model;


class ToggleSwitch extends Component
{
    public Model $model;
    public String $field;
    public bool $changeState;

    public function mount()
    {
        $this->changeState = (bool) $this->model->getAttribute($this->field);
    }

    public function render()
    {
        return view('livewire.toggle-switch');
    }

    public function updating($field, $value)
    {
        $this->model->setAttribute($this->field, $value)->save();
    }
}
