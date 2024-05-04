<?php
$news = db_first('news',"
JOIN categories on news.category_id = categories.id
JOIN users on news.user_id = users.id where news.id='".request('id')."'
","
news.title,
news.content,
news.category_id,
news.created_at,
news.updated_at,
news.user_id,
news.image,
news.description,
news.id,
users.name as username , 
categories.name as category_name
");
 ;
redirect_if(empty($news), url('/'));

//$comments = db_paginate('news', 'where category_id="'.$category['id'].'"');
?>
{{view('front.layouts.header', ['title'=>$news['title']])}}
 

<div class="row mb-2">
 <div class="col-md-12">
 <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1">{{ $news['title'] }}</h2>
        <p class="blog-post-meta">{{ $news['created_at'] }}   <span>{{ $news['username'] }}</span></p>
        <hr>
        <?php
if(!empty($news['image'])) {
    $img = url('storage/'.$news['image']);
} else {
    $img = url('assets/images/icon.jpeg');
}
	    ?>
        <img src="{{$img}}" style="width:100%;max-height:500px;"/>
        <p>{{ $news['content'] }}</p>
      </article>
      <hr />
      <div class="col-md-12">
         {{ view('front.categories.comments') }}
      </div>
    </div>
</div>

{{view('front.layouts.footer')}}