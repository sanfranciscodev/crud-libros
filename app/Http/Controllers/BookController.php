<?php
namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Book;

class BookController extends Controller
{
    /**
     * Related routes.
     */
    const BOOK_ROUTE = 'book/';

    /**
     * Related views.
     */
    const BOOKS_INDEX_VIEW  = 'books.index';
    const BOOKS_CREATE_VIEW = 'books.create';
    const BOOKS_EDIT_VIEW   = 'books.edit';
    const BOOKS_SHOW_VIEW   = 'books.show';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view(self::BOOKS_INDEX_VIEW)
            ->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(self::BOOKS_CREATE_VIEW);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        try {
            $book = new Book();
            $book->setName($request->name);
            $book->setAuthor($request->author);
            $book->save();

            Session::flash('success', trans('books.stored_message'));
        } catch (Exception $e) {
            Session::flash('error', trans('books.not_stored_message'));
        }

        return redirect()->to(self::BOOK_ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view(self::BOOKS_SHOW_VIEW)
            ->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view(self::BOOKS_EDIT_VIEW)
            ->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBookRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, $id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->setName($request->name);
            $book->setAuthor($request->author);
            $book->save();

            Session::flash('success', trans('books.updated_message'));
        } catch (Exception $e) {
            Session::flash('error', trans('books.not_updated_message'));
        }

        return redirect()->to(self::BOOK_ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $book = Book::findOrFail($id);
            $book->delete();

            Session::flash('success', trans('books.removed_message'));
        } catch (Exception $e) {
            Session::flash('error', trans('books.not_removed_message'));
        }
        
        return redirect()->to(self::BOOK_ROUTE);
    }
}
