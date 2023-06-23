<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Book\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CRUD\Book\ByIdRequest;
use App\Http\Resources\Api\Book\BookResource;
use App\Http\Resources\Api\Book\ListResource;
use App\Models\Book;
use Illuminate\Support\Facades\Response;

class BookController extends Controller
{
    public function list(): array
    {
        $books = Book::query()
            ->with(['author' => fn ($query) => $query->select("id", "name")])
            ->get();
        return ListResource::collection($books)->resolve();
    }

    public function byId(ByIdRequest $request): array
    {
        $id = $request->validated()['id'];
        $book = Book::query()->find($id);
        return BookResource::make($book)->resolve();
    }

    public function update(UpdateRequest $request): array
    {
        $data = $request->validated();
        $book = Book::query()->where('id', $data['id'])->first();
        $book->update($data);
//        dd($book);
        $book->refresh();
        return BookResource::make($book)->resolve();
    }

    public function destroy(Book $book): \Illuminate\Http\JsonResponse
    {
        $book->delete();
        return Response::json(['message' => 'Книга удалена успешно!']);
    }
}
