<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ $article->art_title }}</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<ol class="breadcrumb">
			<li><a href="/">Home</a></li>
			<li><a href="/category/{{ $category->cat_slug }}">{{ $category->cat_name }}</a></li>
			<li class="active">{{ $article->art_title }}</li>
		</ol>
		@isset($image)
			<img src="/uploads/{{ $image->img_path }}" alt="{{ $image->img_name }}" class="img-rounded" style="display: block; margin: 10px auto;max-height: 250px; width: auto;">
		@endisset

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">{{ $article->art_title }}</h3>
			</div>
			<div class="panel-body">{!! $article->art_content !!}</div>
		</div>
		<nav aria-label="pagination">
			<ul class="pager">
				@isset($previous)
				    <li class="previous"><a href="/article/{{ $previous->art_slug }}"><span aria-hidden="true">&larr;</span> {{ $previous->art_title }}</a></li>
				@endisset
				@isset($next)
					<li class="next"><a href="/article/{{ $next->art_slug }}">{{ $next->art_title }} <span aria-hidden="true">&rarr;</span></a></li>
				@endisset
			</ul>
		</nav>		
	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>