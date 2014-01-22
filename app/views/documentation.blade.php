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
			The baseurl is: <code>http://{{ $_SERVER['HTTP_HOST'] }}/api/v1</code>
		</p>

		<p>
			Because the questions are categorized, it's also possible to retrieve a random question from a certain category, or all questions from a category
		</p>

		<p>
			Users can also add their own question to the collection, but they'll need to provide their <code>user_id</code> as some sort of authentication measurement.
			A <code>user_id</code> is also required for updating and deleting a question.
		</p>

		<p>
			All endpoints return json by default. If you want xml you can use the Accept header:<br />
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
						<a href="#getusers">
							<span class="verb">get</span>
							<span class="uri">/users</span>
							<span class="description">Get all users</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#postusers">
							<span class="verb">post</span>
							<span class="uri">/users</span>
							<span class="description">Create a new user</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#showuser">
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
						<a href="#getcategories">
							<span class="verb">get</span>
							<span class="uri">/categories</span>
							<span class="description">Get all categories</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#showcategory">
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
						<a href="#getquestions">
							<span class="verb">get</span>
							<span class="uri">/questions</span>
							<span class="description">Get all questions</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#showquestion">
							<span class="verb">get</span>
							<span class="uri">/questions/<code>question_id</code></span>
							<span class="description">Get the information about a question</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#questionrandom">
							<span class="verb">get</span>
							<span class="uri">/questions/random</span>
							<span class="description">Get the information about a random question</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#postquestions">
							<span class="verb">post</span>
							<span class="uri">/questions</span>
							<span class="description">Create a new question</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#putquestions">
							<span class="verb">put</span>
							<span class="uri">/questions/<code>question_id</code></span>
							<span class="description">Update a question</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#deletequestion">
							<span class="verb">delete</span>
							<span class="uri">/questions/<code>question_id</code></span>
							<span class="description">Delete a question</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#getquestionsbycategory">
							<span class="verb">get</span>
							<span class="uri">/categories/<code>category_id</code>/questions</span>
							<span class="description">Get all questions from given category</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#randomquestionbycategory">
							<span class="verb">get</span>
							<span class="uri">/categories/<code>category_id</code>/questions/random</span>
							<span class="description">Get a random questions from given category</span>
						</a>
					</li>
					<li class="endpoint">
						<a href="#getquestionsbyuser">
							<span class="verb">get</span>
							<span class="uri">/users/<code>user_id</code>/questions</span>
							<span class="description">Get all questions from given user</span>
						</a>
					</li>
				</ul>				
			</div>

		</section>

		<section class="user-endpoints">
			
			<article id="getusers" class="endpoint-description">
				<header>
					<span class="verb">get</span>
					<span class="uri">/users</span>
				</header>
				<section class="url">http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/users</section>
				<section class="description">
					Get a collection of users
				</section>
				<section class="optional-parameters">
					<h3>Optional parameters</h3>
					<ul>
						<li><span class="param">limit:</span> <span class="description">Limit the results by the given number</span></li>
						<li><span class="param">offset:</span> <span class="description">Set an offset for the returned data</span></li>
					</ul>
				</section>
			</article>

			<article id="postusers" class="endpoint-description">
				<header>
					<span class="verb">post</span>
					<span class="uri">/users</span>
				</header>
				<section class="url">
					curl -X POST -d "username=<code>username</code>" http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/users
				</section>
				<section class="description">
					Create a new user
				</section>
				<section class="parameters">
					<h3>Parameters</h3>
					<ul>
						<li><span class="param">username:</span> <span class="description">The username for the created user</span></li>
					</ul>
				</section>
			</article>


			<article id="showuser" class="endpoint-description">
				<header>
					<span class="verb">get</span>
					<span class="uri">/users/<code>user_id</code></span>
				</header>
				<section class="url">http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/users/<code>user_id</code></section>
				<section class="description">
					Get a specific user
				</section>
			</article>

		</section>

		<section class="category-endpoints">
			
			<article id="getcategories" class="endpoint-description">
				<header>
					<span class="verb">get</span>
					<span class="uri">/categories</span>
				</header>
				<section class="url">http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/categories</section>
				<section class="description">
					Get a collection of categories
				</section>
				<section class="optional-parameters">
					<h3>Optional parameters</h3>
					<ul>
						<li><span class="param">limit:</span> <span class="description">Limit the results by the given number</span></li>
						<li><span class="param">offset:</span> <span class="description">Set an offset for the returned data</span></li>
					</ul>
				</section>
			</article>


			<article id="showcategory" class="endpoint-description">
				<header>
					<span class="verb">get</span>
					<span class="uri">/categories/<code>category_id</code></span>
				</header>
				<section class="url">http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/categories/<code>category_id</code></section>
				<section class="description">
					Get a specific category
				</section>
			</article>

		</section>

		<section class="question-endpoints">
			
			<article id="getquestions" class="endpoint-description">
				<header>
					<span class="verb">get</span>
					<div class="uri">/questions</div>
				</header>
				<section class="url">http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/questions</section>
				<section class="description">
					Get a collection of questions
				</section>
				<section class="optional-parameters">
					<h3>Optional parameters</h3>
					<ul>
						<li><span class="param">limit:</span> <span class="description">Limit the results by the given number</span></li>
						<li><span class="param">offset:</span> <span class="description">Set an offset for the returned data</span></li>
					</ul>
				</section>
			</article>

			<article id="showquestion" class="endpoint-description">
				<header>
					<span class="verb">get</span>
					<div class="uri">/questions/<code>question_id</code></div>
				</header>
				<section class="url">http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/questions/<code>question_id</code></section>
				<section class="description">
					Get a specific question with it's corresponding possible answers
				</section>
			</article>

			<article id="randomquestion" class="endpoint-description">
				<header>
					<span class="verb">get</span>
					<div class="uri">/questions/random</div>
				</header>
				<section class="url">http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/questions/<code>question_id</code></section>
				<section class="description">
					Get a random question
				</section>
			</article>

			<article id="postquestions" class="endpoint-description">
				<header>
					<span class="verb">post</span>
					<div class="uri">/questions</div>
				</header>
				<section class="url">
					curl -X POST -d "question=<code>question</code>&amp;user_id=<code>user_id</code>&amp;answers=<code>[\"Answer 1\", \"Answer 2\", \"etc\"]</code>&amp;categories=<code>[\"23\"]</code>" http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/questions
				</section>
				<section class="description">
					Create a new question
				</section>
				<section class="parameters">
					<h3>Parameters</h3>
					<ul>
						<li><span class="param">question:</span> <span class="description">The question 'phrase' for the new question</span></li>
						<li><span class="param">answers:</span> <span class="description">A json array with the possible answers</span></li>
						<li><span class="param">categories:</span> <span class="description">A json array with the associated categories</span></li>
					</ul>
				</section>
			</article>

			<article id="showquestion" class="endpoint-description">
				<header>
					<span class="verb">put</span>
					<div class="uri">/questions/<code>question_id</code></div>
				</header>
				<section class="url">
					curl -X PUT -d "question=<code>question</code>&amp;user_id=<code>user_id</code>&amp;answers=<code>[\"Answer 1\", \"Answer 2\", \"etc\"]</code>&amp;categories=<code>[\"23\"]</code>" http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/questions/<code>question_id</code>
				</section>
				<section class="description">
					Update an existing question
				</section>
				<section class="parameters">
					<h3>Parameters</h3>
					<ul>
						<li><span class="param">question:</span> <span class="description">The question 'phrase' for the new question</span></li>
						<li><span class="param">answers:</span> <span class="description">A json array with the possible answers</span></li>
						<li><span class="param">categories:</span> <span class="description">A json array with the associated categories</span></li>
					</ul>
				</section>		
			</article>

			<article id="deletequestion" class="endpoint-description">
				<header>
					<span class="verb">delete</span>
					<div class="uri">/questions/<code>question_id</code></div>
				</header>
				<section class="url">
					curl -X DELETE http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/questions/<code>question_id</code>?user_id=<code>user_id</code></section>
				<section class="description">
					Delete a question
				</section>
			</article>

			<article id="getquestionsbycategory" class="endpoint-description">
				<header>
					<span class="verb">get</span>
					<div class="uri">/categories/<code>category_id</code>/questions</div>
				</header>
				<section class="url">http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/categories/<code>category_id</code>/questions</section>
				<section class="description">
					Get a collection of questions related to certain category
				</section>
				<section class="optional-parameters">
					<h3>Optional parameters</h3>
					<ul>
						<li><span class="param">limit:</span> <span class="description">Limit the results by the given number</span></li>
						<li><span class="param">offset:</span> <span class="description">Set an offset for the returned data</span></li>
					</ul>
				</section>
			</article>

			<article id="randomquestionbycategory" class="endpoint-description">
				<header>
					<span class="verb">get</span>
					<div class="uri">/categories/<code>category_id</code>/questions/random</div>
				</header>
				<section class="url">http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/categories/<code>category_id</code>/questions/random</section>
				<section class="description">
					Get a random question from a category
				</section>
			</article>

			<article id="getquestionsbyuser" class="endpoint-description">
				<header>
					<span class="verb">get</span>
					<div class="uri">/users/<code>user_id</code>/questions</div>
				</header>
				<section class="url">http://{{ $_SERVER['HTTP_HOST'] }}/api/v1/users/<code>user_id</code>/questions</section>
				<section class="description">
					Get a collection of questions related to a certain user
				</section>
				<section class="optional-parameters">
					<h3>Optional parameters</h3>
					<ul>
						<li><span class="param">limit:</span> <span class="description">Limit the results by the given number</span></li>
						<li><span class="param">offset:</span> <span class="description">Set an offset for the returned data</span></li>
					</ul>
				</section>
			</article>

		</section>

	</div> <!-- End Container -->

</body>
</html>