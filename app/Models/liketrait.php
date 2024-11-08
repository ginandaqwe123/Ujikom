<?php 

// namespace App;

// use App\Models\like;

// trait liketrait

// {
//     public function likes()
//     {
//         return $this->morphMany('App\like', 'likeable');
//     }

//     public function YoulikeIt()
//     {
//         $like = new like();
//         $like->user_id = auth()->user()->id;

//         $this->likes()->save($like);

//         return $like;
//     }

//     public function Youliked()
//     {
//         return !!$this->likes()->where('user_id', auth()->id)->count();
//     }

//     public function YouUnlike()
//     {
//         $this->likes()->where('user_id' , auth()->id())->delete();
//     }
// }