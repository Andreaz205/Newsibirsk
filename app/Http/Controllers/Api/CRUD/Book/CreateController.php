<?php

namespace App\Http\Controllers\Api\CRUD\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CRUD\Book\CreateRequest;
use App\Http\Resources\Api\Book\BookResource;
use App\Models\Book;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
        $newBook = Book::query()->create($data);
        return BookResource::make($newBook)->resolve();
    }
}
