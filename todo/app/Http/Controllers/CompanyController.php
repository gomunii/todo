<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
  // kaisya itiran
  public function kuboSample() {

    $datas = Company::orderBy('created_at', 'desc')->get();
    return view('company/index', [
        'datas' => $datas
    ]);
  }

  //kaisya hensyuu
  public function sampleEdit(int $id) {

    $data = Company::find($id);

    return view('company/edit', [
        'data' => $data,
    ]);

  }

  public function sampleEditSave(Request $request) {

    if(!empty($request->id)) {

      $data = Company::find($request->id);
      $data->name = $request->name;
      $data->save();

    }


    // 3
    return redirect()->route('companies.index');

  }

  public function sampleCreate() {

    return view('company/create');
  }


  public function samplecreateSave(Request $request)
  {
      // フォルダモデルのインスタンスを作成する
      $data = new Company();
      // タイトルに入力値を代入する
      $data->name = $request->name;
      // インスタンスの状態をデータベースに書き込む
      $data->save();

      return redirect()->route('companies.index', [
          'id' => $data->id,
      ]);
  }

  /**
   * 削除処理
   */
   public function sampleDelete($id)
     {

    $data = Company::find($id);

    $data->delete();

    return redirect()->route('companies.index',);

  }









}
