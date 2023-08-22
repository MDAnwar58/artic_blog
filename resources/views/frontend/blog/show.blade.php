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
            <div class="col-lg-12">
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
                    <li><a href="#">{{ $countComments }} Comments</a></li>
                  </ul>
                  <p>{!! $blog->blog !!}</p>
                  <div class="post-options">
                    <div class="row">
                      <div class="col-md-6">
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
                      <div class="col-6">
                        <ul class="post-share">
                          <li><i class="fa fa-share-alt"></i></li>
                          <li><a href="#">Facebook</a>,</li>
                          <li><a href="#"> Twitter</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="sidebar-item comments">
                <div class="sidebar-heading">
                  <h2>4 comments</h2>
                </div>
                <div class="content">
                  <ul>
                    @foreach($comments as $comment)
                    @if($comment->child->count()>0)
                    <li>
                      <div class="author-thumb">
                        <img src="{{ url('assets/frontend/images/user.jpg') }}" alt="">
                      </div>
                      <div class="right-content">
                        <h4>{{ $comment->name }}<span>{{ date('F d, Y', strtotime($comment->created_at)) }}</span></h4>
                        <p>{{ $comment->comment }}</p>
                      </div>
                    </li>
                    @foreach($comment->child as $reply)
                    <li class="replied">
                      <div class="author-thumb">
                        <img src="{{ url('assets/frontend/images/admin.jpg') }}" alt="">
                      </div>
                      <div class="right-content">
                        <h4>{{ $reply->user['name'] }}<span>{{ date('F d, Y', strtotime($reply->created_at)) }}</span></h4>
                        <p>In porta urna sed venenatis sollicitudin. Praesent urna sem, pulvinar vel mattis eget.</p>
                      </div>
                    </li>
                    @endforeach
                    @else
                    <li>
                      <div class="author-thumb">
                        <img src="{{ url('assets/frontend/images/user.jpg') }}" alt="">
                      </div>
                      <div class="right-content">
                        <h4>{{ $comment->name }}<span>{{ date('F d, Y', strtotime($comment->created_at)) }}</span></h4>
                        <p>{{ $comment->comment }}</p>
                      </div>
                    </li>
                    @endif
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="sidebar-item submit-comment">
                <div class="sidebar-heading">
                  <h2>Your comment</h2>
                </div>
                <div class="content">
                  <form id="comment" action="{{ route('comment.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                    <div class="row">
                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="name" id="name" type="text" placeholder="Your name" required="">
                        </fieldset>
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="email" id="email" type="text" placeholder="Your email" required="">
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="comment" rows="6" id="comment" placeholder="Type your comment" required=""></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="main-button">Submit</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
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