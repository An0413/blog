<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditpController extends BaseController
{
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $post_tags = [];
        foreach ($post->tags as $item) {
            $post_tags[] = $item['id'];
        }
        return view('admin.post.edit', compact('post', 'categories', 'tags', 'post_tags'));
    }
}
