{{ '<?xml version="1.0"?>' }}
<questions>
	@foreach($questions as $question)
	
		<question id="{{ $question->id }}">
			<question_phrase>{{ $question->question }}</question_phrase>
			<answers>
				@foreach($question->answers as $answer)
					<answer id="{{ $answer->id }}">
						<answer_phrase>{{ $answer->answer }}</answer_phrase>
					</answer>
				@endforeach		
			</answers>
			<author>{{ $question->author->username }}</author>
			<created_at>{{ $question->created_at->toDateString() }}</created_at>
		</question>

	@endforeach
</questions>