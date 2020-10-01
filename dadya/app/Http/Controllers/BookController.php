<?php

namespace App\Http\Controllers;

use App\Books;
use App\User;
use App\Helpers\UploadPaths;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookController extends Controller
{
    public function bookCreateView(){
        return view('books.create');
    }

    public function bookCreate(Request $request){
        $data = $request->all();
        $createdBy = $request->get('created_by');
        $updatedBy = $createdBy;
        $filePhotoUrl = $request->file('photo');
        if(isset($filePhotoUrl)){
            $bookPhotoName = uniqid('book_'). '.' . $filePhotoUrl->getClientOriginalExtension();
            $filePhotoUrl->move(UploadPaths::getUploadPath('books_photos'),$bookPhotoName);
        }
        $this->validate($request,[
            'book_name' => 'required|unique:books,name',
            'author' => 'required',
            'type' => 'required',
            'number' => 'required',
            'price' => 'required',
            'is_approved' => 'boolean',
            'created_by' => 'required'
        ]);
        Book::create([
            'photo' => $bookPhotoName,
            'name' => $request->get('book_name'),
            'author' => $request->get('author'),
            'type' => $request->get('type'),
            'number' => $request->get('number'),
            'price' => $request->get('price'),
            'is_approved' => $request->get('is_approved'),
            'created_by' => $createdBy,
            'updated_by' => $updatedBy
        ]);
        return redirect()->route('book.index')->with('message','Kitap başarıyla oluşturuldu!');
    }

    public function bookIndex(){
        $books = Book::with(['user'])->where('deleted_at',null)->get();
        return view('books.index',compact('books'));
    }

    public function bookDelete($id){
        $book = Book::where('id',$id)->get();
        $book = $book->first();
        Book::where('id','=',$id)->update([
            'deleted_at' => Carbon::now()
        ]);

        return redirect()->back()->with('message', 'Kitap başarıyla silindi!');
    }

    public function bookUpdateView($id){
        $book = Book::where('id',$id)->get();
        $book = $book->first();
        return view('books.update',compact('book'));
    }

    public function bookUpdate($id,Request $request){
        $data = $request->all();
        $book = Book::where('id',$id)->get();
        $book = $book->first();
        $currentPhoto = $book->photo;
        $createdBy = $request->get('created_by');
        $updatedBy = $createdBy;
        $filePhotoUrl = $request->file('photo');
        $this->validate($request,[
            'book_name' => 'required|unique:books,name',
            'author' => 'required',
            'type' => 'required',
            'number' => 'required',
            'price' => 'required',
            'is_approved' => 'boolean',
            'created_by' => 'required'
        ]);
        if(isset($filePhotoUrl)){
            $bookPhotoName = uniqid('book_'). '.' . $filePhotoUrl->getClientOriginalExtension();
            $filePhotoUrl->move(UploadPaths::getUploadPath('books_photos'),$bookPhotoName);
            Book::where('id',$id)->update([
                'photo' => $bookPhotoName,
                'name' => $request->get('book_name'),
                'author' => $request->get('author'),
                'type' => $request->get('type'),
                'number' => $request->get('number'),
                'price' => $request->get('price'),
                'is_approved' => $request->get('is_approved'),
                'created_by' => $createdBy,
                'updated_by' => $updatedBy
            ]);
        }
        else{
            Book::where('id',$id)->update([
                'photo' => $currentPhoto,
                'name' => $request->get('book_name'),
                'author' => $request->get('author'),
                'type' => $request->get('type'),
                'number' => $request->get('number'),
                'price' => $request->get('price'),
                'is_approved' => $request->get('is_approved'),
                'created_by' => $createdBy,
                'updated_by' => $updatedBy
            ]);
        }


        return redirect()->route('book.index')->with('message',$id." ID'li kitap başarıyla güncellendi!");
    }

    public function bookDetail($id){
        $book = Book::where('id',$id)->get();
        $book = $book->first();
        return view('books.detail',compact('book'));
    }
}
