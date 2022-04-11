<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategories;
use App\Models\ProductCategorysDetails;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware(['auth:admins']);
    }

    public function index(){
        $categories = ProductCategories::paginate(5);
        Paginator::useBootstrap();
        return view('pages.admins.category.index', compact('categories'));
    }
    
    public function create(){
        return view('pages.admins.category.create');
    }
    
    public function store(Request $request){
        $this->validate($request,[
            'category_name' => 'required|unique:product_categories|max:100'
        ]);

        $category = ProductCategories::create([
            'category_name' => $request->category_name
        ]);
        $category->save();
        return Redirect::to('/admins/categories')->with(['success' => 'Berhasil menambahkan kategori']);
    }

    public function edit($id){
        $category = ProductCategories::find($id);        
        return view('pages.admins.category.edit', compact('category'));        
    }    

    public function update(Request $request, $id){
        $this->validate($request,[
            'category_name' => 'required|unique:product_categories|max:100'
        ]);
        $category = ProductCategories::find($id);
        $category->update([
            'category_name' => $request->category_name
        ]);
        return Redirect::to('/admins/categories')->with(['success' => 'Berhasil mengedit kategori']);
    }

    public function delete($id){
        ProductCategorysDetails::where('category_id',$id)->delete();
        $categories = ProductCategories::find($id);
        $categories->delete();
        return Redirect::to('/admins/categories')->with(['error' => 'Berhasil menghapus kategori']);
    }

}
