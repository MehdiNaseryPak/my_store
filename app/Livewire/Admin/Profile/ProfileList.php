<?php

namespace App\Livewire\Admin\Profile;

use App\Livewire\Admin\SearchableComponent;
use App\Models\Profile;
use Livewire\Component;

class ProfileList extends SearchableComponent
{
    protected function searchableFields(): array
    {
        return ['title_fa','title_en'];
    }
    public function baseQuery()
    {
        return Profile::query();
    }
    public function render()
    {
        return view('livewire.admin.profile.profile-list',['profiles' => $this->results]);
    }
}
