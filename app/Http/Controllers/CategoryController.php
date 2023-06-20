<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.list', [
            'categories'=> $categories,
            'msg'=> session()->get('msg')
        ]);
    }

    public function viewCreate() {
        return view('admin.category.create', ['message'=>session()->get('message')]);
    }

    public function create(Request $request) 
    {
        $data = [
            'name'=> $request->name,
            'description'=>$request->description,
            'active'=>1
        ];
        if (Category::create($data)) {
            return view('admin.category.create', ['message'=>'Created a new category']);
        }
        return view('admin.category.create', ['message'=>'Please enter enough information of category']);
    }

    public function delete($id) 
    {
        $category = Category::find($id);
        // dd($category);
        if ($category) {
            $category->delete();
            return redirect()->route('category.list')->with('msg', 'Deleted!');
        }
        // dd($id);
        return redirect()->route('category.list')->with('msg', 'Not found a category!');    
    }

    public function viewEdit($id) 
    {
        $category = Category::find($id);
        if ($category) {
            return view('admin.category.edit', ['category' => $category,
            'msg'=>session()->get('msg')]);
        }
        return redirect()->route('category.list')->with('msg', 'Not found a category!');    
    }

    public function update($id, Request $request) 
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('category.list')->with('msg', 'Not found a category!');    
        }
        // $category->name = $request->name;
        // $category->description = $request->description;
        // $category->save();
        $data = [
            'name'=> $request->name,
            'description'=> $request->description
        ];
        Category::where('id',$id)->update($data); 
        return redirect()->route('category.list')->with('msg', 'Updated!');
        // return redirect()->route('category.edit', ['id'=> $id])->with('msg', 'Updated!');
    }
}
