@extends('layouts.general')

@section('heading')
<div class="hero-wrap js-fullheight" style="background-image: url('/images/bg.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Edit Blog</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{ route('blog.all') }}">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Edit Blog <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
      </div>
    </div>
 </div>

@endsection

@section('content')
{!! Form::model($blog, ['route' => ['blog.update', $blog->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
      <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('excerpt', 'Intro of the blog') }}
        {{ Form::text('excerpt', null, ['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('image', 'Choose Image if you want to change') }}
        {{ Form::file('image', ['class' => 'form-control']) }}
      </div>
        <div class="form-group">
        {{ Form::label('content',null ,'Content of the blog') }}
        {{ Form::textarea('content', null, ['id' => 'editor', 'class' => 'form-control']) }}
      </div>
      {{ Form::submit('Update Blog', ['class' => 'btn btn-primary py-3 px-5' ]) }}
  {!! Form::close() !!}

    {{-- <form action="{{ route('blog.single', $blog) }}" class="bg-light p-md-5 contact-form" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
          <div class="form-group">
            <input type="text" class="form-control" name='title' placeholder="Title of the blog" value= "{{ $blog->title }}">
            @error('title')
                <p class="text-danger">{{ $errors->first('title') }}</p>
            @enderror
          </div>
          <div class="form-group">
          <input type="text" class="form-control" name='excerpt' placeholder="Title of the blog" value= "{{ $blog->excerpt }}">
            @error('excerpt')
                <p class="text-danger">{{ $errors->first('excerpt') }}</p>
            @enderror
          </div>
          <div class="form-group">
            <input type="file" class="form-control" name='image' placeholder="image" value= "{{ $blog->image}}">
            @error('image')
                <p class="text-danger">{{ $errors->first('image') }}</p>
            @enderror
          </div>
          <div class="form-group">
            <textarea  cols="30" rows="7" class="form-control" name='content' placeholder="Blog content" value= "{{ $blog->content }}"></textarea>
            @error('content')
                <p class="text-danger">{{ $errors->first('content') }}</p>
            @enderror
          </div>
          <div class="form-group">
            <input type="submit" value="Post Blog" class="btn btn-primary py-3 px-5">
          </div>
    </form>     --}}
@endsection
