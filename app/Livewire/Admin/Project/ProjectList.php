<?php

namespace App\Livewire\Admin\Project;

use App\Livewire\Admin\SearchableComponent;
use App\Models\Project;
use Livewire\Component;

class ProjectList extends SearchableComponent
{
    protected $listeners = [
        'delete',
        'refreshComponent' => '$refresh'
    ];
    protected function searchableFields(): array
    {
        return ['title_fa','title_en'];
    }

    public function deleteConfirm($id):void
    {
        $project = Project::query()->find($id);
        $this->dispatch('deleteProject',projectId: $project->id);
    }
    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id):void
    {
        $project = Project::query()->find($id)->delete();
        $this->dispatch('refreshComponent');
    }
    public function changeStatus($id)
    {
        $project = Project::query()->find($id);
        if($project->status)
            $project->update(['status' => 0]);
        else
            $project->update(['status' => 1]);
    }
    public function baseQuery()
    {
        return Project::query();
    }
    public function render()
    {
        return view('livewire.admin.project.project-list',['projects' => $this->results]);
    }
}
