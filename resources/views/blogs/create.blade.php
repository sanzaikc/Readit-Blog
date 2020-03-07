@extends('layouts.general')

@section('heading')
<div class="hero-wrap js-fullheight" style="background-image: url('/images/funnyM.jpeg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
            <h1 class="mb-3 bread">Create New Blog</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="{{ route('blog.all') }}">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Create New Blog <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
      </div>
    </div>
 </div>
@endsection

@section('content')
{!! Form::open(['action' => 'BlogController@store','class' => 'bg-light p-md-5 contact-form', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
  <div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter the title of the blog']) }}
  </div>
  <div class="form-group">
    {{ Form::label('excerpt', 'Intro of the blog') }}
    {{ Form::text('excerpt', '', ['class' => 'form-control', 'placeholder' => 'Brief introduction of the blog']) }}
  </div>
  <div class="form-group">
    {{ Form::label('image', 'Image for the blog') }}
    {{ Form::file('image', ['class' => 'form-control']) }}
  </div>
    <div class="form-group">
    {{ Form::label('content', 'Content of the blog') }}
    {{ Form::textarea('content', '', ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Content of the blog']) }}
  </div>
  {{ Form::submit('Post Blog', ['class' => 'btn btn-primary py-3 px-5' ]) }}
{!! Form::close() !!}

        {{-- <form action="{{ route('blog.store') }}" class="bg-light p-md-5 contact-form" method="POST" enctype="multipart/form-data">
        @csrf
              <div class="form-group">
                <input type="text" class="form-control" name='title' placeholder="Title of the blog" value= "{{ old('title') }}">
                @error('title')
                    <p class="text-danger">{{ $errors->first('title') }}</p>
                @enderror
              </div>
              <div class="form-group">
              <input type="text" class="form-control" name='excerpt' placeholder="Intro about the blog" value= "{{ old('excerpt') }}">
                @error('excerpt')e
                    <p class="text-danger">{{ $errors->first('excerpt') }}</p>
                @enderror
              </div>
              <div class="form-group">
                <input type="file" class="form-control" name='image' placeholder="image" value= "{{ old('image')}}">
                @error('image')
                    <p class="text-danger">{{ $errors->first('image') }}</p>
                @enderror
              </div>
              <div class="form-group">
                <textarea  cols="30" rows="7" class="form-control" name='content' placeholder="Blog content" value= "{{ old('content') }}"></textarea>
                @error('content')
                    <p class="text-danger">{{ $errors->first('content') }}</p>
                @enderror
              </div>
              <div class="form-group">
                <input type="submit" value="Post Blog" class="btn btn-primary py-3 px-5">
              </div>
        </form>     --}}
@endsection
