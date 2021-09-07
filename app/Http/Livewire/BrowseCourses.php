<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class BrowseCourses extends Component
{
    use WithPagination;

    public $search = '';
    public $currentPage = 1;



    public function render()
    {
        return view('livewire.browse-courses', [
            'courses' => Course::published()->where(function($query){
                $query->where('title', 'like', '%'.$this->search.'%')
                ->orWhere('description', 'like', '%'.$this->search.'%');
            })->paginate(9),

        ]);
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    } 
}
