<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pagination extends Component
{
    public $itemsCount;
    public $page;
    public $pageStr;
    public $pageEnd;
    public $from;
    public $to;
    public $elementsPerPage;

    public function render()
    {
        $this->elementsPerPage = 20;
        $this->pageStr = min(1, ($this->page / 5  + 1));
        $this->pageEnd = min((int)($this->itemsCount/$this->elementsPerPage + ($this->itemsCount%$this->elementsPerPage > 0)), ($this->page / 5  + 5));
        $this->from = ($this->page - 1) * $this->elementsPerPage + 1;
        $this->to = $this->page * $this->elementsPerPage;

        return view('livewire.pagination');
    }
}
