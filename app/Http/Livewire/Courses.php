<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Courses extends Component
{
    use WithPagination;

    public $search = '';
    public $currentPage = 1;



    public function render()
    {
        return view('livewire.courses', [
            'courses' => Course::where('teacher_id',Auth::id())->where(function($query){
                $query->where('title', 'like', '%'.$this->search.'%')
                ->orWhere('description', 'like', '%'.$this->search.'%');
            })->with(['subscribers','lessons'])->paginate(8),
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
