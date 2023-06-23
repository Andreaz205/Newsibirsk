<?php

namespace App\Http\Controllers\Api\CRUD\Author;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Author\ListResource;
use App\Models\Author;

class ListController extends Controller
{
    public function __invoke()
    {
        $authors = Author::query()->withCount('books')->get();
        return ListResource::collection($authors)->resolve();
    }
}
