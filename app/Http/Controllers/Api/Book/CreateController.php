<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Book\CreateRequest;
use App\Http\Resources\Api\Book\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
        $newBook = Book::query()->create($data);
        return BookResource::make($newBook)->resolve();
    }
}
