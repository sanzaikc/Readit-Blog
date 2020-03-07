@extends('layouts.general')

@section('heading')
<div class="hero-wrap js-fullheight" style="background-image: url('/images/funnyM.jpeg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
        <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">All Blogs</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{ route('blog.all') }}">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>All Blogs <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
        </div>
      </div>
    </div>
@endsection

@section('content')
<div class="row d-flex">
    @foreach($blogs as $blog)
    <div class="col-md-4 d-flex ftco-animate">
        <div class="blog-entry justify-content-end">
            <a href="{{ route('blog.single', $blog) }}}}" class="block-20" style="background-image: url('/storage/uploads/{{ $blog->image }}');"></a>
        <div class="text p-4 float-right d-block">
        <div class="topper d-flex align-items-center">
          <div class="one py-2 pl-3 pr-1 align-self-stretch">
            <span class="day">{{ $blog->created_at->format('d') }}</span>
          </div>
          <div class="two pl-0 pr-3 py-2 align-self-stretch">
            <span class="yr">{{ $blog->created_at->format('Y') }}</span>
            <span class="mos">{{ $blog->created_at->format('M') }}</span>
          </div>
        </div>
        <h3 class="heading mb-3"><a href="{{ route('blog.single', $blog) }}}}">{{ $blog->title }}</a></h3>
        <p>{{ $blog->excerpt }}</p>
        <p><a href="{{ route('blog.single', $blog) }}}}" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
      </div>
    </div>
  </div>
    @endforeach
</div>

<div class="row mt-5">
    <div class="col d-flex justify-content-center">
            {{ $blogs->links() }}
        <div class="block-27">
        </div>
    </div>
    
  <!-- <div class="col text-center">
    <div class="block-27">
      <ul>
        <li><a href="#">&lt;</a></li>
        <li class="active"><span>1</span></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">&gt;</a></li>
      </ul>
    </div>
  </div> -->
</div>
@endsection

    