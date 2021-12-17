<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function editForm($id){
        $user = User::find($id);
        if (!$user){
            return redirect()->back();
        }
        return view('users.edit', compact('user', ));
    }

    public function saveEdit($id, Request $request){
        $model = User::find($id);
        if(!$model){
            return redirect(route('user.index'));
        }
        $users_except = User::all()->except($id);
        $count_user = $users_except->whereIn('email', $request->email)->count();
        if ($count_user > 0){
            return redirect(route('user.edit', ['id' => $id]))->with('message_email', 'Email đã có người dùng');
        }
        if($request->hasFile('avatar')){
            Storage::delete($model->avatar);
            
            $imgPath = $request->file('avatar')->store('public/users');
            $imgPath = str_replace('public/', 'storage/', $imgPath);
            $model->avatar = $imgPath;
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('user.detail', ['id' => $id]))->with('message_success', 'Bạn đã thay đổi thông tin thành công');
    }
    public function detail($id){
        $user = User::find($id);
        if(!$user){
            return redirect(route('403'));
        }
        
        return view('users.detail', compact('user'));
    }
}
