<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }
    public function add()
    {
        return view('admin.category.add');
    }
    public function insert(Request $request)
    {
        $category = new Category();
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time(). '.'. $ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }
        $category->name             = $request->input('name');
        $category->slug             = $request->input('slug');
        $category->description      = $request->input('description');
        $category->status           = $request->input('status') == TRUE ? '1':'0';
        $category->popular          = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title       = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords    = $request->input('meta_keywords');
        $category->save();
        return redirect('dashboard')->with('status', 'kategori başarı ile eklendi');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename= time(). '.'. $ext;
            $file->move('assets/uploads/category/',$filename);
            $category->image = $filename;
        }

        $category->name             = $request->input('name');
        $category->slug             = $request->input('slug');
        $category->description      = $request->input('description');
        $category->status           = $request->input('status') == TRUE ? '1':'0';
        $category->popular          = $request->input('popular') == TRUE ? '1':'0';
        $category->meta_title       = $request->input('meta_title');
        $category->meta_description = $request->input('meta_description');
        $category->meta_keywords    = $request->input('meta_keywords');
        $category->update();
        return redirect('categories')->with('status', 'kategori başarı ile güncellendi');
    }
    public function destroy($id)
    {
        $category = Category::find($id);

        if($category->image)
        {
            $path = 'assets/uploads/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('categories')->with('status', 'kategori başarı ile silindi');
    }
}
