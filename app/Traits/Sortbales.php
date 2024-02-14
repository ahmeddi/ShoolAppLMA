<?php

namespace App\Traits;

use Livewire\Attributes\Url;
use Illuminate\Support\Facades\DB;


trait Sortables
{
    #[Url]
    public $sortCol;

    #[Url]
    public $sortAsc = true;


    public function sortBy($col)
    {
        if ($this->sortCol == $col) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortCol = $col;
            $this->sortAsc = true;
        }
    }

    protected function applySorting($query)
    {

        if ($this->sortCol) {
            if ($this->sortCol == 'montant') {
                $query->orderBy(DB::raw('CAST(montant AS DECIMAL(10, 2))'), $this->sortAsc ? 'asc' : 'desc');
            } else {
                $query->orderBy($this->sortCol, $this->sortAsc ? 'asc' : 'desc');
            }
        }

        return $query;
    }
}
