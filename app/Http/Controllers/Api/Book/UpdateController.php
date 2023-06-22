<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Book\UpdateRequest;
use App\Http\Resources\Api\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

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
