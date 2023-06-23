<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class BookFilter extends AbstractFilter
{
    public const AUTHOR_NAME  = 'author_name' ;
    public const BOOK_TITLE  = 'book_title' ;

    protected function getCallbacks(): array
    {
        return [
            self::AUTHOR_NAME  => [ $this, 'author_name'  ],
            self::BOOK_TITLE  => [ $this, 'book_title'  ],
        ];
    }

    public function author_name(Builder $builder, $value)
    {
        $builder->whereRelation('author', 'name', 'ilike', '%'.$value.'%');
    }

    public function book_title(Builder $builder, $value)
    {
        $builder->where('title', 'ilike', '%'.$value.'%');
    }
}
