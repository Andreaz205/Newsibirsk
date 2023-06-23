<?php

namespace App\Http\Controllers\Api\CRUD\Author;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Author\AuthorResource;
use App\Models\Author;

class ShowController extends Controller
{
    public function __invoke(Author $author)
    {
//        $booksCount =
        return AuthorResource::make($author)->resolve();
    }
}
