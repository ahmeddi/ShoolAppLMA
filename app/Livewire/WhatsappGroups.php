<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\WhatsappGroup;

class WhatsappGroups extends Component
{
    use WithPagination;

    public $search='';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[On('refresh')] 
    public function render()
    {
        
        $groups = WhatsappGroup::where('nom', 'like', '%'.$this->search.'%')
        ->orderBy('id', 'desc')
        ->paginate(5);

        return view('livewire.whatsapp-groups', [
            'groups' => $groups
        ]);
    }
}
