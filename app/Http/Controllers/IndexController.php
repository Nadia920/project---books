<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\AuthorsModel;
use App\Models\BooksModel;
use Illuminate\Http\Request;

use Valid;
class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function books(){
        $books = BooksModel::all();
        $total_books= count($books);
        $total_pages = ceil( $total_books / 4 );
        $current_query = isset($_POST) ? 'data-query="' . http_build_query($_POST) . '"' : '';


        return view('books', [
            'data' => BooksModel::getAuthorsWithBooksWithLimit(4),
            'current_query' => $current_query,
            'total_pages' => $total_pages,
        ]);

    }

    public function authors()
    {
        $authors = AuthorsModel::all();
        $total_authors= count($authors);
        $total_pages = ceil( $total_authors / 4 );
        $current_query = isset($_POST) ? 'data-query="' . http_build_query($_POST) . '"' : '';

        return view('authors', [
            'data' => AuthorsModel::with('books')->limit(4)->get(),
            'current_query' => $current_query,
            'total_pages' => $total_pages,
        ]);
    }

    public function booksPaginate(Request $request){
        $req = $request->data;
        $limit = isset($_POST['limit']) ? $_POST['limit'] : 4;

        $offset = 0;
        $current_page = 1;

        if(isset($_POST['page_number'])) {
            $current_page = $_POST['page_number'];
            $offset = ($current_page * $limit) - $limit;
        }
        $books = BooksModel::getAuthorsWithBooks();
		$paged_books = $books->slice($offset, $limit);
		$total_books= count($books);
		$total_pages = ceil( $total_books / $limit );
		$paged = $total_books > count($paged_books) ? true : false;
		$current_query = isset($_POST) ? 'data-query="' . http_build_query($_POST) . '"' : '';

		return response()->json([
			'status' => 'success',
			'data' => $paged_books,
            'total_pages' => $total_pages,
		]);
    }

    public function paginate(Request $request){
        $req = $request->data;
        $limit = isset($_POST['limit']) ? $_POST['limit'] : 4;

        $offset = 0;
        $current_page = 1;

        if(isset($_POST['page_number'])) {
            $current_page = $_POST['page_number'];
            $offset = ($current_page * $limit) - $limit;
        }
        $authors = AuthorsModel::with('books')->get();
		$paged_authors = $authors->slice($offset, $limit);
		$total_authors= count($authors);
		$total_pages = ceil( $total_authors / $limit );
		$paged = $total_authors > count($paged_authors) ? true : false;
		$current_query = isset($_POST) ? 'data-query="' . http_build_query($_POST) . '"' : '';

		return response()->json([
			'status' => 'success',
			'data' => $paged_authors,
            'total_pages' => $total_pages,
		]);
    }

	public function send(Request $request)
  {
    $data = $request->all();
    Mail::to($data['email'])->send(new SendEmail($data));
  }

}


