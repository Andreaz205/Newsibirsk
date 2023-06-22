<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Book $book)
    {
        return BookResource::make($book)->resolve();
    }
}
