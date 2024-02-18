<?php

namespace App\Repository;

use Illuminate\Support\Facades\Auth;
use App\Models\{Blogpost, Blogcomment, Bloglikes};

class BlogpostRepository extends GenericRepository
{
    public function __construct(Blogpost $blogpost)
    {
        parent::__construct($blogpost);
    }
    public function addView($post_id)
    {
        $post = $this->model->findOrFail($post_id);
        $post->views = ((int) $post->views) + 1;
        $post->save();
    }
    public function addComment($post_id, $comment)
    {
        $post = $this->model->findOrFail($post_id);
        $comment = new Blogcomment([
            'post_id' => $post_id,
            'comment' => $comment,
            'parent_id' => $post_id,
            'created_by' => Auth::user()->id
        ]);
        $comment->save();
        // $post->comments()->save($comment);
    }

    public function addLike($post_id)
    {
        if (!Bloglikes::where(['parent_id' => $post_id, 'created_by' => Auth::user()->id])->exists()) {
            $likes = new Bloglikes([
                'post_id' => $post_id,
                'parent_id' => $post_id,
                'created_by' => Auth::user()->id
            ]);
            $likes->save();
        }
    }
}
