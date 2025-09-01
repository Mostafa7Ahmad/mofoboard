<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class FilesViewer extends Component
{
    use WithPagination;

    public function render()
    {
        $files = \App\Models\HubFile::where(function ($q) {})->orderBy('id', 'DESC')->simplePaginate(24);

        return view('livewire.files-viewer', compact('files'));
    }
}
