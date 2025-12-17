<?php

namespace App\Livewire\Admin\Content\Post;

use App\Livewire\Admin\SearchableComponent;
use App\Models\Content\Post;
use Livewire\Component;

class PostList extends SearchableComponent
{
    protected $listeners = [
        'delete',
        'refreshComponent' => '$refresh'
    ];
    protected function searchableFields(): array
    {
        return ['title','summary'];
    }

    public function deleteConfirm($id):void
    {
        $post = Post::query()->find($id);
        $this->dispatch('deletePost',postId: $post->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $post = Post::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id)
    {
        $post = Post::query()->find($id);
        if($post->status)
            $post->update(['status' => 0]);
        else
            $post->update(['status' => 1]);
    }
    public function changeCommentable($id)
    {
        $post = Post::query()->find($id);
        if($post->commentable)
            $post->update(['commentable' => 0]);
        else
            $post->update(['commentable' => 1]);
    }
    public function baseQuery()
    {
        return Post::query()->with(['author','category']);
    }

    public function render()
    {
        return view('livewire.admin.content.post.post-list',['posts'=>$this->results]);
    }
}
