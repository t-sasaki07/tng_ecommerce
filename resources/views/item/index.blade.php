@extends('layouts.layout')
@section('content')
<body>
	<header class="header-section">
				@include('second-header')
	</header>
	<div class="container">
    <div class="top__title text-center">
        All Items
    </div>
    <div class="row">
        @foreach($items as $item)
        <a href="/item/{{ $item->id }}" class="col-lg-4 col-md-6">
            <div class="card">
                <img src="/images/{{ $item->img_1 }}" class="item-img">
                <div class="card-body">
                    <p class="card-title">{{ $item->name }}</p>
                    <p class="card-text">¥{{ number_format($item->price) }} </p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
</body>

<section class="search-section">
	<div class="container">
		<div class="row subscribe-from">
			<div class="col-md-12">
				<form class="form-inline col-md-12 wow fadeInDown animated">
					<div class="form-group">
						<input type="email" class="form-control subscribe" id="email" placeholder="Search...">
						<button class="suscribe-btn" ><i class="pe-7s-search"></i></button>
					</div>
				</form><!-- end /. form -->
			</div>
		</div><!-- end of/. row -->
	</div><!-- end of /.container -->
</section><!-- end of /.news letter section -->
@endsection