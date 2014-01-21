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
		<h1>Questions documentation!</h1>

		<p>
			This API allows the retrieval of some kind of quiz or trivia questions.
			You can retrieve random questions, questions by an id and a list of all questions.
		</p>
		
		<p>
			The baseurl is <code>{{ $_SERVER['HTTP_HOST'] }}/api/v1</code>
		</p>

		<p>
			Because the questions are categorized, it's also possible to retrieve a random question from a certain category, or all questions from a category
		</p>

		<p>
			Users can also add their own question to the collection, but they'll need to provide their user_id as some sort of authentication measurement.
			This same methods allows deleting and updating questions.
		</p>

		<p>
			All endpoints return either json by default. If you want xml you can use the Accept header:<br />
			<code>Accept: application/xml</code>  
		</p>

		<p>
			Endpoints that return an array of objects can make use of the limit and offset parameters: <br />
			<code>/questions?limit=10&amp;offset=20</code>
		</p>

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
							<span class="description">Get the information from given user</span>
						</a>
					</li>
				</ul>
			</div>
		</section>

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
							<span class="description">Get the information about a category</span>
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
							<span class="description">Get the information about a question</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">get</span>
							<span class="uri">/questions/random</span>
							<span class="description">Get the information about a random question</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">post</span>
							<span class="uri">/questions</span>
							<span class="description">Get the information about a question</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#">
							<span class="verb">delete</span>
							<span class="uri">/questions/<code>question_id</code></span>
							<span class="description">Get the information about a question</span>
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

	</div>

</body>
</html>