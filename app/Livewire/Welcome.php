<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class Welcome extends Component
{
    use WithPagination;
    protected $paginationTheme="bootstrap";

    public $title="", $content="", $id="", $isNew=true;

    public function deletePost($id){
        $p=Post::whereId($id)->firstOrFail();
        $p->delete();
        session()->flash("success_msg", "The selected post has been deleted.");
    }
    public function editPost($p){
        $this->isNew=false;
        $this->id=$p['id'];
        $this->title=$p['title'];
        $this->content=$p['content'];
    }

    public function savePost(){
        $this->validate([
            "title"=>'required',
            "content"=>"required"
        ]);

        if($this->isNew){
            $p=new Post();
            $p->title=$this->title;
            $p->content=$this->content;
            $p->save();
            session()->flash("success_msg", "The new post has been created.");
        }else{
            $p=Post::whereId($this->id)->firstOrFail();
            $p->title=$this->title;
            $p->content=$this->content;
            $p->update();
            $this->isNew=true;
            session()->flash("success_msg", "The selected post has been updated.");
        }

        $this->reset("title", "content", "id");

    }

    public function render()
    {
        $posts=Post::OrderBy("id", "desc")->paginate(2);
        return view('livewire.welcome')->with(['posts'=>$posts]);
    }
}
