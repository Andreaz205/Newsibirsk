<?php

namespace App\Http\Controllers\Api\CRUD\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CRUD\Book\UpdateRequest;
use App\Http\Resources\Api\Book\BookResource;
use App\Models\Book;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Book $book)
    {
        $data = $request->validated();
        $book->update($data);
        $book->refresh();
        return BookResource::make($book)->resolve();
    }
}
