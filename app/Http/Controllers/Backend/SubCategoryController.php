<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdminUser\AdminUser;
use App\Models\Category\Category;
use App\Models\SubCategory\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends BackendController
{

    //For search and Default Display of Sub Category
    public function index(Request $request)
    {
        if (!empty($request->search_sub_category)) {
            $search = $request->search_sub_category;
            $subCategoryData = SubCategory::where('sub_cat_name','LIKE','%'. $search .'%')->paginate(5);
            $this->data('subCategoryData', $subCategoryData);
            if(empty($subCategoryData->first())){
                return redirect()->route('sub-category')->with('error','Data not found');
            }else{
                return view($this->pagePath . 'sub-category.show-sub-category', $this->data);
            }

        } else {
            $subCategoryData = SubCategory::orderBy('id', 'desc')->paginate(5);
            $this->data('subCategoryData', $subCategoryData);
            return view($this->pagePath . 'sub-category.show-sub-category', $this->data);
        }

    }

    //For Sub Category Insert into Database
    public function slugGenerator($data){
        return str_replace(' ','-',trim($data));
    }
    public function add(Request $request){

        if($request->isMethod('get')){
            $categoryData=Category::all();
            $this->data('categoryData',$categoryData);
            return view($this->pagePath.'sub-category.add-sub-category',$this->data);
        }
        if($request->isMethod('post')){
            $this->validate($request, [
                'sub_cat_name' => 'required|unique:sub_categories,sub_cat_name',
                'slug' => 'required|unique:sub_categories,slug',
            ]);
            //inserting data using object
            $subCatObj=new SubCategory();
            $subCatObj->sub_cat_name=$request->sub_cat_name;
            $subCatObj->slug=$this->slugGenerator($request->slug);
            $subCatObj->meta_keywords=$request->meta_keywords;
            $subCatObj->meta_description=$request->meta_description;
            $subCatObj->description=$request->description;
            $subCatObj->posted_by=Auth::guard('admin')->user()->id;
           $subCatObj->cat_id=$request->cat_id;

            if($subCatObj->save()){
                return redirect()->route('sub-category')->with('success','Data inserted Succesfully');
            }else{
                return redirect()->back()->with('error','Data cannot inserted ');
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
            $findUser = SubCategory::findOrFail($id);
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

    public function delete(Request $request)
    {
        $id = $request->criteria;
        if (SubCategory::findOrFail($id)->delete()){
            echo "Delete";
            return redirect()->route("sub-category")->with('success', "Data Deleted Successfully");
        }
    }

    public function edit(Request $request)
    {
        $id = $request->criteria;
        $subCategoryData = SubCategory::findOrFail($id);
        $this->data('categoryData',Category::all());
        $this->data('subCategoryData', $subCategoryData);
        return view($this->pagePath . 'sub-category.edit-sub-category', $this->data);
    }

    public function editAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $id = $request->criteria;
            $this->validate($request, [
                'sub_cat_name' => 'required',
                'slug' => 'required',
            ]);

            $data['sub_cat_name'] = $request->sub_cat_name;
            $data['slug'] = $request->slug;
            $data['meta_keywords'] = $request->meta_keywords;
            $data['meta_description'] = $request->meta_keywords;
            $data['description'] = $request->meta_keywords;
            $data['posted_by']=Auth::guard('admin')->user()->id;
            $data['cat_id']=$request->cat_id;

            if (SubCategory::findOrFail($id)->update($data)) {
                return redirect()->route('sub-category')->with('success', 'Data was successfully Updated');
            } else {
                return redirect()->back()->with('error', 'Data was not Updated');
            }
        }
    }
}
