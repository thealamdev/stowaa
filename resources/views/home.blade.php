@extends('layouts.dashboard')
@section('title','Dashboard')

@section('pagecontent')
	<style>
		.dashboard_container h2{
			color: #355ebd;
			font-family: "Roboto-slab";
			font-size: 21px;
			padding-top:10px;
		}

		.under_line{
			width: 100%;
			height: 2px;
			background: #355ebd;
		}

		#dashboard_main{
			margin-top: 20px;
			border-radius: 5px;
			
		}

		.dashboard_item{
			padding:20px;
			background: linear-gradient(45deg,#2a6a9b,#22a094);
			border-radius: 10px;
			box-shadow: -1px -2px 3px 4px #ffffffe1;
		}

		.dashboard_item h3{
			font-family: 'Roboto';
			font-size: 19px;
			font-weight: 500px;
			color:#f2f2f2;
		}

		.dashboard_item p{
			font-family: 'Roboto';
			font-size: 14px;
			font-weight: 400px;
			color:#fff;
		}
		
	</style>

	<div class="dashboard">
		<div class="dashboard_container">
			<h2>Dashboard</h2>
			<div class="under_line">

			</div>
		</div>
	</div>


	<div id="dashboard_main">
		<div class="row">
			<div class="col-lg-4">	 
					<div class="dashboard_item">
						<h3>Total Categories</h3>
						<p> {{ $categories->count() }} Categories</p>
					</div> 
			</div>	 

			<div class="col-lg-4">	 
				<div class="dashboard_item">
					<h3>Total Post</h3>
					@foreach ($categories as $category) 
					<p>{{ $category->posts_count }}</p>
					@endforeach
				</div> 
		</div>

		<div class="col-lg-4">	 
			<div class="dashboard_item">
				<h3>Commited Posts</h3>
				<p>15 posts</p>
			</div> 
	    </div>

		 
		</div>
	</div>
@endsection
 

