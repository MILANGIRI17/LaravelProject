<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProductController extends BackendController
{
    public function index(Request $request)
    {
        if (!empty($request->search_product)) {
            $search = $request->search_product;
            $productData = Product::where('name', 'LIKE', '%' . $search . '%')
                ->orwhere('title', 'LIKE', '%' . $search . '%')
                ->orwhere('slug', 'LIKE', '%' . $search . '%')->paginate(5);
            $this->data('productData', $productData);
            if (empty($productData->first())) {
                return redirect()->route('product')->with('error', 'Data not found');
            } else {
                return view($this->pagePath . 'product.show-product', $this->data);
            }

        } else {
            $productData = Product::orderBy('id', 'desc')->paginate(5);
            $this->data('productData', $productData);
            return view($this->pagePath . 'product.show-product', $this->data);
        }

    }

    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'product.add-product', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|min:3|max:100',
                'slug' => 'required|unique:products,slug',
                'image' => 'mimes:jpg,gif,jpeg,png'
            ]);

            $data['title'] = $request->title;
            $data['slug'] = $request->slug;
            $data['price'] = $request->price;
            $data['description'] =$request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());

                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/products');

                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->back()->with('error', "File not uploaded");
                }
                $data['image'] = $imageName;
            }

            if (Product::create($data)) {
                return redirect()->route('product')->with('success', 'Data was successfully inserted');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');
            }
        }
    }

    public function updateStatus(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $id = $request->criteria;
            $findUser = Product::findOrFail($id);
            if (isset($_POST['active'])) {
                $findUser->status = 0;
                $message = "Status Updated to Inactive";
            }
            if (isset($_POST['inactive'])) {
                $findUser->status = 1;
                $message = "Status Updated to Active";
            }
            if ($findUser->update()) {
                return redirect()->back()->with('success', $message);
            }
        }
    }


    //to delete image alongside data on database;
    public function deleteFiles($id)
    {
        $findData = Product::findOrFail($id);
        $imageName = $findData->image;
        $filePath = public_path('uploads/products/' . $imageName);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }
        return true;
    }

    public function delete(Request $request)
    {
        $id = $request->criteria;
        $this->deleteFiles($id);
        if ($this->deleteFiles($id) && Product::findOrFail($id)->delete()) {
            return redirect()->route("product")->with('success', "Data Deleted Successfully");
        }
    }

    public function edit(Request $request)
    {
        $id = $request->criteria;
        $productData = Product::findOrFail($id);
        $this->data('productData', $productData);
        return view($this->pagePath . 'product.edit-product', $this->data);
    }

    public function editAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $id = $request->criteria;
            $this->validate($request, [
                'title' => 'required|min:3|max:100',
                'slug' => 'required',[
                  Rule::unique('products','slug')->ignore($id)
                ],
                'image' => 'mimes:jpg,gif,jpeg,png'
            ]);

            $data['title'] = $request->title;
            $data['slug'] = $request->slug;
            $data['price'] = $request->price;
            $data['description'] =$request->description;
            $data['posted_by']=Auth::guard('admin')->user()->id;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/admins');
                if ($this->deleteFiles($id) && $file->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;
                }

            }

            if (Product::findOrFail($id)->update($data)) {
                return redirect()->route('product')->with('success', 'Data was successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Data was not Updated');
            }
        }
    }

}
