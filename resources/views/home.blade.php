@extends('layouts.general')
@section('heading')
<div class="hero-wrap js-fullheight" style="background-image: url('/images/funnyM.jpeg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
        <div class="container">
        
        </div>    
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Click Blogs at Nav
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
