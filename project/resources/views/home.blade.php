<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	@isset($title)
		<title>{{ $title }}</title>
	@else
		<title>Liste des articles</title>
	@endisset
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	<div class="container">

		<div class="jumbotron">
			@isset($title)
				<h1>{{ $title }}</h1>
			@else
				<h1>MyBlog</h1>
			@endisset
		  	<p>Apprenez à utiliser Lumen rapidement</p>
		</div>

		<div class="list-group">
			@forelse ($articles as $article)
				<a href="/article/{{ $article->art_slug }}" class="list-group-item">
					<img src="/uploads/{{ $article->img_path }}" style="float: left; margin-right: 10px; display: inline;width: auto; height: 45px;" alt="">
					<span class="badge">{{ $article->cat_name }}</span>
					<h4 class="list-group-item-heading">{{ $article->art_title }}</h4>
					<span class="badge"><?= date('d/m/Y', $article->art_create); ?></span>
					<p class="list-group-item-text">{{ $article->art_excerpt }}</p>
				</a>
			@empty
			    <p>No article</p>
			@endforelse
		</div>
	</div>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>