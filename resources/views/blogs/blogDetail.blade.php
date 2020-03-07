@extends('layouts.general')

@section('heading')
<div class="hero-wrap js-fullheight" style="background-image:url('/storage/uploads/{{ $blog->image   }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Full Blog</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{ route('blog.all') }}">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Full Blog <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
      </div>    
    </div>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-8 ftco-animate">
    <p class="mb-5">
      <img src="/storage/uploads/{{ $blog->image }}" alt="" class="img-fluid">
    </p>

    <h2 class="mb-3">{{$blog->title }} 

    @can('update', $blog)
      <a href="{{ route('blog.edit', $blog) }}" class="btn btn-outline-success btn-sm">Edit</a>
      <a href="{{ route('blog.delete', $blog) }}" class="btn btn-outline-danger btn-sm">Delete</a>
    @endcan
    
    </h2> 
    <p>Posted by {{ $blog->user->name }}</p>
    <p>{!! $blog->content !!}</p>
    
    <!-- <div class="about-author d-flex p-4 bg-light">
      <div class="bio mr-5">
        <img src="/images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
      </div>
      <div class="desc">
        <h3>George Washington</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
      </div>
    </div> -->
    <div class="comment-form-wrap pt-5">
        <h3 class="">Leave a comment</h3>
          {!! Form::open(['action'=>['CommentController@store', $blog->id], 'method' => 'POST', 'class' => 'p-5 bg-light']) !!}
          <div class="form-group">
            {{ Form::label('comment', 'Comment:') }}
            {{ Form::textarea('comment', null, ['id' => 'editor', 'class' => 'form-control']) }}
          </div>
            {{ Form::submit('Post Comment',['class' => 'btn py-3 px-4 btn-primary']) }}
          {!! Form::close() !!}
        {{-- <form action="{{ route('comment.store', $blog->id) }}" method="POST" class="p-5 bg-light">
        @csrf
          <div class="form-group">
            <label for="message">Comment:</label>
            <textarea name="comment" cols="30" rows="2" class="form-control"></textarea>
            @error('comment')
              <p class="text-danger">{{ $errors->first('comment') }}</p>
            @enderror
          </div>
          <div class="form-group">
            <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
          </div>
        </form> --}}
      </div>

    <div class="pt-5 mt-5">
      <h3 class="mb-5">{{ $comments->count() }} Comments</h3>
      <ul class="comment-list">
          @foreach($comments as $comment)
          <li class="comment">
            <div class="vcard bio">
              <img src="/images/person_1.jpg" alt="Image placeholder">
            </div>
            <div class="comment-body">
              <h3><span>{{  $comment->user->name  }}</span>

                @can('delete', $comment) 
                  <a href="{{route('comment.delete', $comment)}}" class="btn btn-outline-danger btn-sm">Delete</a>
                @endcan

                </h3>
              <div class="meta mb-3">{{ $comment->updated_at->diffForHumans() }}</div>
              <p>{!! $comment->comment !!}</p>
              <!-- <p><a href="#" class="reply">Reply</a></p> -->
            </div>
          </li>
          @endforeach
        </ul>  
          
      <!-- END comment-list -->
    </div>
  </div>

    <!-- .col-md-8 -->
  <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
    <div class="sidebar-box">
      <form action="#" class="search-form">
        <div class="form-group">
          <span class="icon icon-search"></span>
          <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
        </div>
      </form>
    </div>
    <div class="sidebar-box ftco-animate">
      <div class="categories">
        <h3>Categories</h3>
        <li><a href="#">Illustration <span class="ion-ios-arrow-forward"></span></a></li>
        <li><a href="#">Branding <span class="ion-ios-arrow-forward"></span></a></li>
        <li><a href="#">Application <span class="ion-ios-arrow-forward"></span></a></li>
        <li><a href="#">Design <span class="ion-ios-arrow-forward"></span></a></li>
        <li><a href="#">Marketing <span class="ion-ios-arrow-forward"></span></a></li>
      </div>
    </div>

    <div class="sidebar-box ftco-animate">
      <h3>Recent Blog</h3>
      @foreach($recent as $recent)
      <div class="block-21 mb-4 d-flex">
        <a class="blog-img mr-4" style="background-image: url(/storage/uploads/{{ $recent->image }});"></a>
        <div class="text">
          <h3 class="heading"><a href="/blogs/{{ $recent->id }}" >{{ $recent->title}}</a></h3>
          <div class="meta">
            <div><a href="#"><span class="icon-calendar"></span> {{ $blog->updated_at->format('d M Y') }}</a></div>
            <div><a href="#"><span class="icon-person"></span> Admin</a></div>
            <div><a href="#"><span class="icon-chat"></span> 19</a></div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <!-- <div class="sidebar-box ftco-animate">
      <h3>Tag Cloud</h3>
      <div class="tagcloud">
        <a href="#" class="tag-cloud-link">cat</a>
        <a href="#" class="tag-cloud-link">abstract</a>
        <a href="#" class="tag-cloud-link">people</a>
        <a href="#" class="tag-cloud-link">person</a>
        <a href="#" class="tag-cloud-link">model</a>
        <a href="#" class="tag-cloud-link">delicious</a>
        <a href="#" class="tag-cloud-link">desserts</a>
        <a href="#" class="tag-cloud-link">drinks</a>
      </div>
    </div> -->

    <div class="sidebar-box ftco-animate">
      <h3>Paragraph</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
    </div>
  </div>

</div>

@endsection

    