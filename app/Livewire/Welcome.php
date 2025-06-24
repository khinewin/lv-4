<?php

namespace App\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public $title="", $content="";

    public function savePost(){
        $this->validate([
            "title"=>"required|min:5",
            "content"=>"required|min:5"
        ]);
    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
