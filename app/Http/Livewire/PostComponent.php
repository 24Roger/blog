<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $view = 'create';
    public $post_id, $tittle, $body;

    public function render()
    {
        return view('livewire.post-component', [
            'posts' => Post::orderBy('id', 'desc')->paginate(8)
        ]);
    }

    public function store()
    {
        $this->validate([
            'tittle' => 'required',
            'body' => 'required'
        ]);
       $post =  Post::create([
            'tittle' => $this->tittle,
            'body' => $this->body
        ]);
       $this->edit($post->id);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->tittle = $post->tittle;
        $this->body = $post->body;
        $this->post_id = $post->id;
        $this->view = 'edit';
    }
    public function destroy($id)
    {
        Post::destroy($id);
    }

    public function default()
    {
        $this->tittle = '';
        $this->body = '';
        $this->view = 'create';
    }
    public  function update()
    {
        $this->validate([
            'tittle' => 'required',
            'body' => 'required'
        ]);
        $post = Post::find($this->post_id);

        $post->update([
            'tittle' => $this->tittle,
            'body' => $this->body
        ]);
        $this->default();
    }

}
