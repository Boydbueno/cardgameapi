<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Api documentation</title>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	{{ HTML::style('css/base.css') }}
</head>
<body>

	<div class="container">
		<h1>This will be my awesome documentation!</h1>
		
		<section class="endpoint-group categories">
			<header><h1>Category endpoints</h1></header>

			<div class="endpoints-summary">
				<ul>
					<li class="endpoint">
						<a href="#">
							<span class="verb">get</span>
							<span class="uri">/categories</span>
							<span class="description">Get all categories</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">get</span>
							<span class="uri">/categories/<code>category_id</code></span>
							<span class="description">Get basic information about a category</span>
						</a>
					</li>
				</ul>
			</div>

		</section>

		<section class="endpoint-group questions">
			<header><h1>Question endpoints</h1></header>

			<div class="endpoints-summary">
				<ul>
					<li class="endpoint">
						<a href="#">
							<span class="verb">get</span>
							<span class="uri">/questions</span>
							<span class="description">Get all questions</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">get</span>
							<span class="uri">/questions/<code>question_id</code></span>
							<span class="description">Get basic information about a question</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">get</span>
							<span class="uri">/questions/random</span>
							<span class="description">Get basic information about a random question</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">post</span>
							<span class="uri">/questions</span>
							<span class="description">Get basic information about a question</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">delete</span>
							<span class="uri">/questions/<code>question_id</code></span>
							<span class="description">Get basic information about a question</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">get</span>
							<span class="uri">/categories/<code>category_id</code>/questions</span>
							<span class="description">Get all questions from given category</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">get</span>
							<span class="uri">/categories/<code>category_id</code>/questions/random</span>
							<span class="description">Get a random questions from given category</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">get</span>
							<span class="uri">/users/<code>user_id</code>/questions</span>
							<span class="description">Get all questions from given user</span>
						</a>
					</li>
				</ul>				
			</div>

		</section>

		<section class="endpoint-group users">
			<h1>User endpoints</h1>
			<div class="endpoints-summary">			
				<ul>
					<li class="endpoint">
						<a href="#">
							<span class="verb">get</span>
							<span class="uri">/users</span>
							<span class="description">Get all users</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">post</span>
							<span class="uri">/users</span>
							<span class="description">Create a new user</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">get</span>
							<span class="uri">/users/<code>user_id</code></span>
							<span class="description">Get basic information from given user</span>
						</a>
					</li>
				</ul>
			</div>
		</section>

	</div>

</body>
</html>