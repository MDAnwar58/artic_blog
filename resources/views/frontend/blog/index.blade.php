@extends('layouts.frontend')
@section('title', 'blog Posts')
@section('sub_title', 'Our Recent Blog Entries')
@section('content')
<!-- Banner Starts Here -->
<section class="blog-posts grid-system">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="all-blog-posts">
          <div class="row">
            @if($blogs->count()>0)
            @foreach($blogs as $blog)
            <div class="col-lg-6">
              <div class="blog-post">
                <div class="blog-thumb">
                  <img src="{{ url('upload/images', $blog->image) }}" alt="">
                </div>
                <div class="down-content">
                  <span>{{ $blog->category['name'] }}</span>
                  <a href="{{ route('blog.show', $blog->slug) }}"><h4>{{ $blog->title }}</h4></a>
                  <ul class="post-info">
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">{{ date('F d, Y', strtotime($blog->created_at)) }}</a></li>
                    <li><a href="#">12 Comments</a></li>
                  </ul>
                  <p>{{ $blog->meta_description }}</p>
                  <div class="post-options">
                    <div class="row">
                      <div class="col-md-12">
                        @php
                        $tag = explode(',', $blog->tags);
                        @endphp
                        <ul class="post-tags">
                          <li><i class="fa fa-tags"></i></li>
                          @foreach($tag as $data)
                          <li><a href="#">{{ $data }}</a>,</li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

            <div class="col-lg-12">
              {{ $blogs->links() }}
            </div>
            @else
            <div class="col-lg-12">
              <div class="text-center"><span style="font-size: 25px; font-weight: bold;">No Blog Found!!!</span></div>
            </div>
            @endif
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        @include('frontend.partials.sidebar')
      </div>
    </div>
  </div>
</section>
<!-- Banner Ends Here -->
@endsection