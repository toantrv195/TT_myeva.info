<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PopupRequest;
use App\Popup;
use File;

class PopupController extends Controller
{
    public function getlist()
    {
        $popup =Popup::select('id', 'name', 'alias', 'image', 'url', 'p_check')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.popup.list', compact('popup'));
    }

    public function getadd()
    {
    	return view('admin.popup.add');
    }
    public function postadd(PopupRequest $request)
    {
    	$popup = new Popup();
    	$file_name = $request->file('fImages')->getClientOriginalName();
    	$popup->name = $request->txtName;
    	$popup->alias = changeTitle($request->txtName);
    	$popup->image = $file_name;
    	$popup->url = $request->txturl;
    	$popup->p_check = $request->rdoStatus;
    	$request->file('fImages')->move('resources/upload/popup/',$file_name);
    	$popup->save();
    	return redirect()->route('admin.popup.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Add Popup']);
    }

    public function getedit($id)
    {
        $data = Popup::find($id)->toArray();
        return view('admin.popup.edit', compact('data'));
    }

    public function postedit($id,PopupRequest $request)
    {
        $popup = Popup::find($id);
        $popup->name = $request->txtName;
        $popup->alias = changeTitle($request->txtName);
        $popup->url = $request->txturl;
        $popup->p_check = $request->rdoStatus;
        $img_current = 'resources/upload/popup/'.$request->file('img_current');
        if(!empty($request->file('fImages')))
        {
            $file_name = $request->file('fImages')->getClientOriginalName();
            $popup->image = $file_name;
            $request->file('fImages')->move('resources/upload/popup/',$file_name);
            if(File::exists($img_current))
            {
                File::delete($img_current);
            }
        } else{
            echo "Not Exists File";
        }
        $popup->save();
        return redirect()->route('admin.popup.list')->with(['flash_level'=>'success','flash_message'=>'Success !! Complete Edit Popup']);
    }
}
