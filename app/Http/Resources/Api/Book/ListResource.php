<?php

namespace App\Http\Resources\Api\Book;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => [
                "id" => $this->author->id,
                "name" => $this->author->name,
            ],
        ];
    }
}
