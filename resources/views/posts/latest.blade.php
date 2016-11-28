<div class="latest-posts">
  <div class="title">
    <h3>LATEST POSTS</h3>
  </div>

  <div class="home-posts">
    @foreach ($latest_posts as $latest_post)
      <a class="home-post" href="{{route('posts.show', $latest_post->id)}}">
        <div class="post-image">
          <img src="{{$latest_post->image->url('medium')}}"/>
        </div>
        <div class="post-info">
          <h4>{{$latest_post->title}}</h4>
          <p>{{$latest_post->user->name}} &smashp; {{date('F j, Y', strtotime($latest_post->created_at))}}</p>
        </div>
      </a>
    @endforeach
  </div>
</div>
