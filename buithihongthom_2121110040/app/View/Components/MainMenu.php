<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menus;

class MainMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $arg = [
            ['status', '=', 1],
            ['position', '=', 'mainmenu'],
            ['parent_id', '=', 0]
        ];
        $menus = Menu::where($arg)->orderBy('sort_order', 'ASC')->get();
        return view('components.main-menu', compact('menus'));
    }
}
