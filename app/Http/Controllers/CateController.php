<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CateRequest;
use App\Category;

class CateController extends Controller
{
    public function getlist()
    {
    	$cate = Category::select('id','name','alias','parent_id')->orderBy('id','DESC')->get();
    	return view('admin.category.list',compact('cate'));
    }

    public function getadd()
    {
    	$parent = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.category.add',compact('parent'));
    }

    public function postadd(CateRequest $request)
    {
    	$cate = new Category();
    	$cate->name = $request->txtCateName;
    	$cate->alias = changeTitle($request->txtCateName);
    	$cate->parent_id = $request->sltparent;
    	$cate->save();
    	return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add category']);

    }
    public function getdelete($id)
    {
    	$parent = Category::where('parent_id',$id)->count();
    	if($parent == 0)
    	{
    		$cate = Category::find($id);
    		$cate->delete($id);
    		return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete delete category']);
    	} else {
    		echo "<script type='text/javascript'>
				alert('Sorry ! You Can Not Delete This Category');
				window.location = '";
					echo route('admin.cate.list');
				echo"'
			</script>";
    	}
    }

    public function getedit($id)
    {
    	$data = Category::find($id)->toArray();
    	$parent = Category::select('id','name','parent_id')->get()->toArray();
    	return view('admin.category.edit',compact('id','data','parent'));
    }
    public function postedit($id,Request $request)
    {
    	$this->validate($request,
			["txtCateName"=>"required"],
			["txtCateName.required"=>"Please Enter Name Category"]
			);
    	$cate = Category::find($id);
    	$cate->name = $request->txtCateName;
    	$cate->alias= changeTitle($request->txtCateName);
    	$cate->parent_id =$request->sltparent;
    	$cate->save();
    	return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Update category']);

    }
}
