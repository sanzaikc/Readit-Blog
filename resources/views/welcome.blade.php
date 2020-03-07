@extends('layouts.general')

@section('heading')
<div class="hero-wrap js-fullheight" style="background-image: url('/images/bg.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    	<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
				<div class="col-md-12 ftco-animate">
        			<h2 class="subheading">Hello! Welcome to</h2>
        			<h1 class="mb-4 mb-md-0">Readit blog</h1>
        			<div class="row">
          				<div class="col-md-7">
          					<div class="text">
	          					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
	          					<div class="mouse">
									<a href="#" class="mouse-icon">
										<div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
									</a>
								</div>
							</div>
          				</div>
        			</div>
    			</div>
			</div>
    	</div>
	</div>
</div>

@endsection

@section('content')
<!-- all the post available to read  -->

@if($blogs->isEmpty())
	<h2>No Blog posted yet!</h2>
@else
<h2 class="mb-4">Recent Blogs</h2>
	<div class="col-md-12">
		<div class="row">
		@foreach($blogs as $blog)
		<div class="case">
			<div class="row">
				<div class="col-md-6 col-lg-6 col-xl-8 d-flex">
					<a href="{{ route('blog.single', $blog) }}" class="img w-100 mb-3 mb-md-0" style="background-image: url(/storage/uploads/{{ $blog->image }});"></a>
				</div>
					<div class="col-md-6 col-lg-6 col-xl-4 d-flex">
					<div class="text w-100 pl-md-3">
						<span class="subheading">{{ $blog->category }}</span>
						<h2><a href="{{ route('blog.single', $blog) }}">{{ $blog->title }}</a></h2>
						<ul class="media-social list-unstyled">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
							</ul>
						<div class="meta">
							<p class="mb-0"><a href="#">{{ $blog->created_at->format('d M Y') }}</a> | <a href="#"> {{ $blog->user->name }} </a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endif

               
      <!-- Pagination html  -->
   		<!-- <div class="row mt-5">
          <div class="col text-center">
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
          </div>
        </div> -->

@endsection