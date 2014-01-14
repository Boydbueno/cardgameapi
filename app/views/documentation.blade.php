<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Api documentation</title>
</head>
<body>

	<div class="container">
		<h1>This will be my awesome documentation!</h1>
		
		<section class="categories">
			<header><h1>Category endpoints</h1></header>

			<div class="endpoints-summary">
				<ul>
					<li class="endpoint"> 
						<span class="type">GET</span> 
						<span class="endpoint">/categories</span>
						<span class="description">Get all categories</span> 
					</li>
					<li class="endpoint"> 
						<span class="type">GET</span> 
						<span class="endpoint">/categories/{category_id}</span>
						<span class="description">Get basic information about a category</span> 
					</li>
				</ul>				
			</div>

		</section>

		<section class="questions">
			<header><h1>Question endpoints</h1></header>

			<div class="endpoints-summary">
				<ul>
					<li class="endpoint"> 
						<span class="type">GET</span> 
						<span class="endpoint">/questions</span>
						<span class="description">Get all questions</span> 
					</li>
					<li class="endpoint"> 
						<span class="type">GET</span> 
						<span class="endpoint">/questions/{question_id}</span>
						<span class="description">Get basic information about a question</span> 
					</li>
					<li class="endpoint"> 
						<span class="type">GET</span> 
						<span class="endpoint">/questions/random</span>
						<span class="description">Get basic information about a random question</span> 
					</li>
					<li class="endpoint"> 
						<span class="type">POST</span> 
						<span class="endpoint">/questions?user_id={user_id}</span>
						<span class="description">Get basic information about a question</span> 
					</li>
					<li class="endpoint"> 
						<span class="type">DELETE</span> 
						<span class="endpoint">/questions/{question_id}?user_id={user_id}</span>
						<span class="description">Get basic information about a question</span> 
					</li>
					<li class="endpoint"> 
						<span class="type">GET</span> 
						<span class="endpoint">/categories/{category_id}/questions</span>
						<span class="description">Get all questions from given category</span> 
					</li>
					<li class="endpoint"> 
						<span class="type">GET</span> 
						<span class="endpoint">/categories/{category_id}/questions/random</span>
						<span class="description">Get a random questions from given category</span> 
					</li>
					<li class="endpoint"> 
						<span class="type">GET</span> 
						<span class="endpoint">/users/{user_id}/questions</span>
						<span class="description">Get all questions from given user</span> 
					</li>
				</ul>				
			</div>

		</section>

		<section class="users">
			<h1>User endpoints</h1>
			<li class="endpoint"> 
				<span class="type">GET</span> 
				<span class="endpoint">/users</span>
				<span class="description">Get all users</span> 
			</li>
			<li class="endpoint"> 
				<span class="type">POST</span> 
				<span class="endpoint">/users</span>
				<span class="description">Create a new user</span> 
			</li>
			<li class="endpoint"> 
				<span class="type">GET</span> 
				<span class="endpoint">/users/{user_id}</span>
				<span class="description">Get basic information from given user</span> 
			</li>
		</section>

	</div>

</body>
</html>