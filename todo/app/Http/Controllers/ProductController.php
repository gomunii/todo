<?php

namespace App\Http\Controllers;
use App\Http\Requests\Products;
use App\Http\Requests\ProductCreate;
use App\Http\Requests\Productsindex;
use App\Product;
use App\profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductController extends Controller
{

  public function productchoice(int $id) {

    Product::where('profile_id','>=', 1)->update(['profile_id' => $id]);
    Product::where('products.id', '>=',1)->update(['situation' => 0]);
    $datas = Product::orderBy('name', 'desc')->get();

    return view('product/choice', [
        'datas' => $datas
    ]);

  }

  public function productdisplay(int $id) {
    //eloquent
    $datas = Product::select(
    'profiles.*','products.*',
    'profiles.name as profiles_name','products.name as products_name',
    'profiles.id as profile_id','products.id as product_id')
    ->join('profiles','profiles.id','=','products.profile_id')
    ->where('products.id', '=', $id)
    ->get();

      return view('product/display', [
          'datas' => $datas,
          'index' => $id
      ]);
  }


  public function productindex(Request $request) {

    Product::where('products.id', '=', $request->id)->update(['situation' => 1]);

    $datas = Product::select(
      'products.price','products.situation',
    'products.image','products.name as products_name',
    'profiles.postcode','profiles.house',
    'profiles.updated_at',
    'profiles.name as profiles_name',
    'profiles.id as profile_id','products.id as product_id')
    ->join('profiles','profiles.id','=','products.profile_id')
    ->where('products.id', '=', $request->id)
    ->get();

      return view('product/index', [
          'datas' => $datas

      ]);
  }
  public function productEdit(int $id) {

    $data = Product::find($id);

    return view('product/edit', [
        'data' => $data,
    ]);

  }

  public function productEditSave(Products $request) {

    if(!empty($request->id)) {

      $data = Product::find($request->id);
      $data->name = $request->name;
      $data->price = $request->price;
      $data->image = $request->image;
      $data->save();

    }


    // 3
    return redirect()->route('products.index');

  }

  public function productCreate() {

    return view('product/create');
  }


  public function productCreateSave(ProductCreate $request)
  {
      $dir = 'sample';

      $file_name = $request->file('image')->getClientOriginalName();
      $request->
      file('image')->storeAs('public/' . $dir, $file_name);
      // フォルダモデルのインスタンスを作成する
      $data = new Product();
      // タイトルに入力値を代入する
      $data->name = $request->name;
      $data->price = $request->price;
      $data->image = 'storage/' . $dir . '/' . $file_name;

      $data->save();

      return redirect()->route('products.index', [
          'id' => $data->id,
      ]);
  }



  /**
   * 削除処理
   */
   public function productDelete($id)
     {

    $data = Product::find($id);

    $data->delete();

    return view('product/index', [
        'id' => $id

    ]);
  }

  public function productshop() {

    $datas = Product::select(
      'products.price','products.situation','products.situation',
    'products.image','products.name as products_name',
    'profiles.postcode','profiles.house',
    'profiles.updated_at',
    'profiles.name as profiles_name',
    'profiles.id as profile_id','products.id as product_id')
    ->join('profiles','profiles.id','=','products.profile_id')
    ->where('products.situation', '>=', 1)
    ->get();

      return view('product/shop', [
          'datas' => $datas
      ]);
  }

  public function productChange($id,Request $request)
  {
    $data = Product::find($id);
    $situation = $request->situation;
    if($situation == 1)
    {
    Product::where('id','=',$id)->update(['situation' => 2]);
    }
    if($situation == 2)
    {
    Product::where('id','=',$id)->update(['situation' => 3]);
    }

    return redirect()->route('products.shop');
  }

}
