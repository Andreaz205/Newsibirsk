<?php

namespace App\Http\Controllers\Api\CRUD\Book;

use App\Http\Controllers\Controller;
use App\Http\Filters\BookFilter;
use App\Http\Requests\Api\CRUD\Book\ListRequest;
use App\Http\Resources\Api\Book\ListResource;
use App\Models\Book;

class ListController extends Controller
{
    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function __invoke(ListRequest $request): array
    {
        $data = $request->validated();
        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($data)]);
        $books = Book::filter($filter)
            ->with(['author' => fn ($query) => $query->select("id", "name")])
            ->get();
        return ListResource::collection($books)->resolve();
    }
}
