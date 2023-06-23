<?php

namespace App\Http\Controllers\Api\CRUD\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Response;

class DeleteController extends Controller
{
    public function __invoke(Book $book)
    {
        $book->delete();
        return Response::json(['message' => 'Книга удалена успешно!']);
    }
}
