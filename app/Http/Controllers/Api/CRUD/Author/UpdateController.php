<?php

namespace App\Http\Controllers\Api\CRUD\Author;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CRUD\Author\UpdateRequest;
use App\Http\Resources\Api\Author\AuthorResource;
use App\Models\Author;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Author $author)
    {
        $data = $request->validated();
        $author->update($data);
        $author->refresh();
        return AuthorResource::make($author)->resolve();
    }
}
