<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\Category;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        // dd(Category::where('name',request('category'))->get());
        return view('components.header',[
            'categories'=>Category::all(),
            'authors'=>User::all(),
            'currentCategory'=>Category::where('name',request('category'))->first(),
            'currentAuthor'=>User::where('name',request('author'))->first(),
        ]);
    }
}
