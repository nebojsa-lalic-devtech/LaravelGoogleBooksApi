<?php
/**
 * Created by PhpStorm.
 * User: nebojsa.lalic
 * Date: 12-May-17
 * Time: 3:15 PM
 */

namespace App\Http\Controllers;


use App\Book;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BooksController extends Controller
{
    public $client;
    
     # GET ALL BOOKS
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }
    
    # GET ONE EMPLOYEE BY ID
    /**
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function getBook()
    {
        $isbn = $_GET['isbn']; // valid isbn numbers: 9781491924440, 9781785283291, 9789332517868
        try {
            $book = Book::where('isbn', $isbn)->firstOrFail();
            return response()->json($book);
        } catch (ModelNotFoundException $ex) {
            return 'Sorry, this book is not in DevTech library! :(';
        }
    }

    /**
     * @return array|string
     */
    public function getGoogleBookApiInfo()
    {
        try {
            $isbn = $_GET['isbn'];
            $this->client = new Client();
            $body = $this->client->get('https://www.googleapis.com/books/v1/volumes?q=' . $isbn)->getBody();
            $response = json_decode($body);
            $bookInfo = array();
            if ($response->totalItems != 0) {
                $bookInfo['thumbnail'] = $response->items[0]->volumeInfo->imageLinks->thumbnail;
                $bookInfo['isbn'] = $response->items[0]->volumeInfo->industryIdentifiers[0]->identifier;
                $bookInfo['title'] = $response->items[0]->volumeInfo->title;
                $bookInfo['author'] = $response->items[0]->volumeInfo->authors[0];
                return $bookInfo;
            } else {
                throw new NotFoundHttpException();
            }
        } catch (\Exception $ex) {
            return '***  Sorry, book with ' . $isbn = $_GET['isbn'] . ' not exist in GoogleBook Library  ***';
        }
    }
}