<?php

namespace App\Http\Controllers\Api\CRUD\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Book\BookResource;
use App\Models\Book;

class ShowController extends Controller
{
    public function __invoke(Book $book)
    {
        return BookResource::make($book)->resolve();
    }
}
