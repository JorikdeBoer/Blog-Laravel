@extends ('layouts.layout')

    @section ('content')
<div  id="blogOverview">

	<!-- The view to show the blog titles as links and publishing the description  -->

 	<h2 class="article-title">

			{{ $blog -> title }}

	</h2>

	<h3>By blogger:
 			{{ $blog->user->name }}
	</h3>

	<p class="article-text"><strong><em>Description:</em></strong><br />

		{{ $blog -> subject }}
		<br />
	</p>
  <hr>
  @foreach($blog->articles as $artcile)
   <span>{{{ $artcile->title }}}</span>
   <p class=”lead”>{{{ $artcile->bodytext }}}</p>
   <hr>
   @endforeach
</div>
@endsection