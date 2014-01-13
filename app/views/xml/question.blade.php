{{ '<?xml version="1.0"?>' }}
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
	<updated_at>{{ $question->updated_at->toDateString() }}</updated_at>
</question>