<?php

namespace App\Http\Controllers\Api\CRUD\Author;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Support\Facades\Response;

class DeleteController extends Controller
{
    public function __invoke(Author $author)
    {
        $author->delete();
        return Response::json(['message' => 'Автор удалён успешно!']);
    }
}
