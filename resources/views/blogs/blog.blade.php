<div  id="blogOverview">

	<!-- The view to show the blog title as link and publishing the description  -->
 	<h2 class="article-title">
		<a href="/blogs/{{ $blog->id }}">
			{{ $blog -> title }}
		</a>
	</h2>

	<h3> By blogger:
 			{{ $blog->user->name }}
	</h3>

	<p class="article-text"><strong><em>Description:</em></strong><br />
		{{ $blog -> subject }}
		<br />
	</p>
  	<hr>
</div
