<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $open = null;

    public function toggle()
    {
        $this->open = !$this->open;
    }

    public function close()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
