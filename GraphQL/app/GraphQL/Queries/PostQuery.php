<?php

namespace App\GraphQL\Queries;

use App\Models\Post;

class PostQuery
{
    /**
     * Retorna los posts asociados a un usuario específico
     *
     * @param  mixed  $_
     * @param  array  $args
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function postsByUser($_, array $args)
    {
        return Post::where('user_id', $args['user_id'])->get();
    }
}
