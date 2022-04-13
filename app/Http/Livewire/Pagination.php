<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pagination extends Component
{
    public $itemsCount;
    public $page = 1;
    public $pageStr = 1;
    public $pageEnd = 5;
    public $from;
    public $to;
    public $elementsPerPage;

    public function render()
    {
        $this->page = (int)request()->page;
        $this->elementsPerPage = 20;
        // endPage based on items/itemsPerPage
        $endPage = (int)($this->itemsCount/$this->elementsPerPage);
        if($this->itemsCount%$this->elementsPerPage){
            $endPage++;
        }
        // endPage based on the currentPage
        $divided_page = (int)($this->page / 5);
        if($this->page % 5 == 0){
            $divided_page--;
        }

        $this->pageStr = $divided_page * 5 + 1;
        $this->pageEnd = min($divided_page * 5 + 5, $endPage);

        $this->from = ($this->page - 1) * $this->elementsPerPage + 1;
        $currentPageItemsCount = min($this->elementsPerPage, $this->itemsCount-($this->elementsPerPage * ($this->page - 1)));
        $this->to = ($this->page - 1) * $this->elementsPerPage + $currentPageItemsCount;

        return view('livewire.pagination');
    }
}
