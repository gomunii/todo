<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProfileCreate;
use App\Http\Requests\ProfileEdit;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
  public function profileCreate() {

    return view('profile/create');
  }

  public function profilecreateSave(ProfileCreate $request)
  {
      // フォルダモデルのインスタンスを作成する
      $data = new Profile();
      // タイトルに入力値を代入する
      $data->name = $request->name;
      $data->postcode = $request->postcode;
      $data->house = $request->house;
      // インスタンスの状態をデータベースに書き込む
      $data->save();

      return redirect()->route('profiles.index', [
          'id' => $data->id,
      ]);
  }

  public function profileindex() {

    $datas = Profile::orderBy('created_at', 'desc')->get();
    return view('profile/index', [
        'datas' => $datas
    ]);
  }

  public function profileEdit(int $id) {

    $data = Profile::find($id);

    return view('profile/edit', [
        'data' => $data,
    ]);

  }

  public function profileEditSave(ProfileEdit $request) {

    if(!empty($request->id)) {

      $data = Profile::find($request->id);
      $data->name = $request->name;
      $data->postcode = $request->postcode;
      $data->house = $request->house;
      $data->save();

    }

      return redirect()->route('profiles.index');
  }

  public function profileDelete($id)
    {

   $data = Profile::find($id);

   $data->delete();

   return redirect()->route('profiles.index',);

 }
}
