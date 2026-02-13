<?php

namespace App\Livewire\Admin\Project;

use App\Livewire\Admin\SearchableComponent;
use App\Models\ProjectGallery;
use Livewire\Component;

class ProjectGalleryList extends SearchableComponent
{
    
    protected $listeners = [
        'delete',
        'refreshComponent' => '$refresh'
    ];
    public $projectId;
 
    public function mount($projectId = null)
    {
        $this->projectId = $projectId;
    }
    protected function searchableFields(): array
    {
        return [];
    }

    public function deleteConfirm($id):void
    {
        $projectGallery = ProjectGallery::query()->find($id);
        $this->dispatch('deleteProjectGallery',projectGalleryId: $projectGallery->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $projectGallery = ProjectGallery::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id)
    {
        $projectGallery = ProjectGallery::query()->find($id);
        if($projectGallery->status)
            $projectGallery->update(['status' => 0]);
        else
            $projectGallery->update(['status' => 1]);
    }
    
    public function baseQuery()
    {
        return ProjectGallery::query()->where('project_id',$this->projectId);
    }
    public function render()
    {
        return view('livewire.admin.project.project-gallery-list',['projectGalleries' => $this->results]);
    }
}
