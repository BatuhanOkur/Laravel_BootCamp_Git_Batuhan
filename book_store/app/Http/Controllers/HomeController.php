<?php

namespace App\Http\Controllers;

use App\Books;
use App\Employees;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function employeeCreateView(){
        return view('users.create');
    }

    public function employeeCreate(Request $request){
        $data = $request->all();
        $password = $request->get('password');
        DB::table('employees')->insert([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' =>  Hash::make($password),
            'duty' => $request->get('duty'),
            'salary' => $request->get('salary')
        ]);

        return view('users.create-success');
    }

    public function employeeList(){
        $employees = Employees::where('deleted_at','=',null)->get();
        return view('users.index',compact('employees'));

    }

    public function deleteEmployee($id){
        $employee = Employees::where('id',$id)->get();
        $employee = $employee->first();
        DB::table('employees')->where('id','=',$id)->update([
            'deleted_at' => Carbon::now()
        ]);
        return view('users.delete-success',compact('employee'));
    }

    public function updateEmployeeView($id){
        $employee = Employees::where('id',$id)->get();
        $employee = $employee->first();

        return view('users.update',compact('employee'));
    }

    public function updateEmployee(Request $request,$id){
        $employee = Employees::where('id',$id)->get();
        $employee = $employee->first();
        $password = $request->get('password');
        Employees::where('id',$id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' =>  Hash::make($password),
            'duty' => $request->get('duty'),
            'salary' => $request->get('salary')
        ]);
        return view('users.update-success',compact('employee'));
    }

    public function createBookView(){
        return view('books.create');
    }

    public function createBook(Request $request){
        $data = $request->all();
        DB::table('books')->insert([
           'name' => $request->get('book_name'),
            'author' => $request->get('author'),
            'type' => $request->get('type'),
            'number' => $request->get('number'),
            'price' => $request->get('price'),
            'created_by' => $request-> get('created_by'),
            'updated_by' => $request->get('updated_by')
        ]);
        return view('books.create-success');
    }


    public function bookList(){
        $books = Books::where('deleted_at','=',null)->get();
        return view('books.index',compact('books'));

    }

    public function deleteBook($id){
        $book = Books::where('id',$id)->get();
        $book = $book->first();
        DB::table('books')->where('id','=',$id)->update([
            'deleted_at' => Carbon::now()
        ]);
        return view('books.delete-success',compact('book'));
    }

    public function updateBookView($id){
        $book = Books::where('id',$id)->get();
        $book = $book->first();

        return view('books.update',compact('book'));
    }

    public function updateBook(Request $request,$id){
        $book = Books::where('id',$id)->get();
        $book = $book->first();
        DB::table('books')->where('id',$id)->update([
            'name' => $request->get('book_name'),
            'author' => $request->get('author'),
            'type' => $request->get('type'),
            'number' => $request->get('number'),
            'price' => $request->get('price'),
            'created_by' => $request-> get('created_by'),
            'updated_by' => $request->get('updated_by')
        ]);
        return view('books.update-success',compact('book'));
    }
}
