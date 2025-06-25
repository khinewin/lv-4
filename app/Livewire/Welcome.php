<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Welcome extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";
    public $title="", $content="";

    public function savePost(){
        $this->validate([
            "title"=>'required',
            "content"=>"required"
        ]);

        $p=new Post();
        $p->title=$this->title;
        $p->content=$this->content;
        $p->save();

        $this->reset("title", "content");
        session()->flash("success_msg", "The new post has been created.");
    }

    public function render()
    {
        $posts=Post::OrderBy("id", "desc")->paginate(2);
        return view('livewire.welcome')->with(['posts'=>$posts]);
    }
}
