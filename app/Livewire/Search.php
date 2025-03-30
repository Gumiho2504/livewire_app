<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Url;

class Search extends Component
{
    #[Url(keep:true,history:true)]
    public $search = '';

    public function render()
    {

        $results = [];
        if(strlen($this->search) >= 2){
            $results = auth()->user()->tasks()
            ->orWhere('title','like','%'.$this->search.'%')
            ->orWhere('description','%','%'.$this->search.'%')
            ->get();
        }
        return view('livewire.search',compact('results'));
    }
}
