<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class mainLayout extends Component
{
    /**
     * Create a new component instance.
     */

     protected $name;
     protected $path;
    public function __construct($name,$path)
    {
        $this->name=$name;
        $this->path=$path;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main',["name"=>$this->name,"path"=>$this->path]);
    }
}
