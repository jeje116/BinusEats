<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\MenuDetail;
use App\Models\Menu;
use App\Models\Cart;

class MenuDetailController extends Controller
{
    public function show($id, $tenant_name, $menu_id) {
        $tenant = Tenant::where("name", $tenant_name)->first();
        $Menu = Menu::where('id', $menu_id)->first();

        return view('/user_page.main_content.menudetail', [
            'page_title' => 'Menu | BinusEats',
            'active_number' => 0,
            'menu' => $Menu,
            'tenant' => $tenant,

            // 'tenant_name' => $tenant->name,
            // 'tenant_img' => $tenant->img,
            // 'tenant_desc' => $tenant->description,
            // 'menu' => Menu::where('id', $tenant_id)
        ])->with('id', $id);
    }

    public function store(Request $request, $id) {
        $menu_id = $request->input('menuId');
        $quantity = $request->input('quantity');
        $additionalDescription = $request->input('additionalDescription');
        $jenis = $request->input('jenis');

        Cart::insert([
            'menu_id' => $menu_id,
            'quantity' => $quantity,
            'additional_description' => $additionalDescription,
            'jenis' => $jenis,
            'user_id' => $id,
        ]);
    }
}
