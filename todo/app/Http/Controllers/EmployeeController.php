<?php

namespace App\Http\Controllers;
use App\Http\Requests\Employees;
use App\Http\Requests\EmployeesCreate;
use App\Employee;
use App\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
  public function employeeindex() {

    //eloquent
    $datas = Employee::select(
      'employees.employee_id','employees.old',
      'employees.sex','employees.name as employees_name',
      'companies.name as companies_name',
      'companies.id as company_id'
      )
      ->leftjoin('companies','companies.id','=','employees.company_id')
      ->get();

      return view('employee/index', [
          'datas' => $datas

      ]);
    }

  public function employeeEdit(int $id) {

    $data = Employee::find($id);

    return view('employee/edit', [
        'data' => $data,
    ]);

  }

  public function employeeEditSave(Employees $request) {

    if(!empty($request->id)) {

      $data = Employee::find($request->id);
      $data->name = $request->name;
      $data->old = $request->old;
      $data->sex = $request->sex;
      $data->save();

    }


    // 3
    return redirect()->route('employees.index');

  }

  public function employeeCreate() {

    return view('employee/create');
  }


  public function employeecreateSave(EmployeesCreate $request)
  {
      // フォルダモデルのインスタンスを作成する
      $data = new Employee();
      // タイトルに入力値を代入する
      $data->name = $request->name;
      $data->old = $request->old;
      $data->sex = $request->sex;
      // インスタンスの状態をデータベースに書き込む
      $data->save();

      return redirect()->route('employees.index', [
          'id' => $data->id,
      ]);
  }

  /**
   * 削除処理
   */
   public function employeeDelete($id)
     {

    $data = Employee::find($id);

    $data->delete();

    return redirect()->route('employees.index',);

  }
}
