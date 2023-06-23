<?php

namespace App\Http\Controllers\Api\CRUD\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CRUD\Author\CreateRequest;
use App\Http\Resources\Api\Author\AuthorResource;
use App\Models\Author;

class CreateController extends Controller
{
    public function __invoke(CreateRequest $request)
    {
        $data = $request->validated();
        $newAuthor = Author::query()->create($data);
        return AuthorResource::make($newAuthor)->resolve();
    }
}
