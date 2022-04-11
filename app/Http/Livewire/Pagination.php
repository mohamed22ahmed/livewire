<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pagination extends Component
{
    public $itemsCount;
    public $pageNumber = 1;
    public $pageStr;
    public $pageEnd;
    public $from;
    public $to;
    public $elementsPerPage;

    public function render()
    {
        $this->elementsPerPage = 20;
        $this->pageStr = (int)($this->pageNumber / 5  + 1);
        $this->pageEnd = (int)min((int)($this->itemsCount/$this->elementsPerPage + ($this->itemsCount%$this->elementsPerPage > 0)), ($this->pageNumber / 5  + 5));
        $this->from = ($this->pageNumber - 1) * $this->elementsPerPage + 1;
        $this->to = $this->pageNumber * $this->elementsPerPage;

        return view('livewire.pagination');
    }
}
