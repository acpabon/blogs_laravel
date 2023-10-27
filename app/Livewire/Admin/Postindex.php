<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Postindex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    
    public function render()
    {
        // $posts = Post::where('user_id', auth()->user()->id)->where('title', 'like', '%' . $this->search . '%')->latest('id')->paginate();
        $posts = Post::where('user_id', auth()->user()->id)->where('title', 'like', '%' . $this->search . '%')->get();
        return view('livewire.admin.postindex', compact('posts'));
    }
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function prueba(){
        dd($this->search);
    }
}
