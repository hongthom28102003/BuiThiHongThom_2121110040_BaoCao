<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;

class MainSubMenu extends Component
{
    public $menu_row = null;
    public function __construct($menu)
    {
        $this->menu_row = $menu;
    }

    public function render(): View|Closure|string
    {
        $menurow = $this->menu_row;
        $arg = [
            ['status', '=', 1],
            ['position', '=', 'mainmenu'],
            ['parent_id', '=', $menurow->id] 
        ];
        $menus = Menu::where($arg)->orderBy('sort_order', 'ASC')->get();
        // $check_submenu=(count($menus) > 0) ? true :false;
        // var_dump($check_submenu);
        return view('components.main-sub-menu', compact('menurow', 'menus'));
    }
}
