<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DeleteController extends Controller
{
    public function __invoke(Book $book)
    {
        $book->delete();
        return Response::json(['message' => 'Книга удалена успешно!']);
    }
}
