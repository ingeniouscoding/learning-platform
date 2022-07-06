@php
    /**
     * @var $radios string[]
     * @var $isCorrect bool
     * @var $lessonId int
     * @var $isSubmitted bool
     * @var $hasSubmissions bool
     */
@endphp

<div>

    <div x-data="{ answer: null }">
        <fieldset>
            @foreach($radios as $radio)
                <div>
                    <input type="radio" id="{{ $radio }}" name="answer" value="{{ $radio }}"
                           wire:model.defer="answer"
                           x-model="answer"
                           @if($isSubmitted) disabled @endif
                    >
                    <label for="{{ $radio }}">{{ $radio }}</label>
                </div>
            @endforeach
        </fieldset>

        @if($isSubmitted)
            <div>
                <button wire:click="retry" x-on:click="answer = null">Try again</button>
            </div>
            <div>
                @if($isCorrect )
                    Correct
                @else
                    This is not correct. Try again.
                @endif
            </div>
        @else
            <button wire:click="check" wire:loading.attr="disabled" x-bind:disabled="!answer">
                Check
            </button>
        @endif
    </div>

    @if($hasSubmissions)
        <a href="{{ route('student.answers.show', $lessonId) }}">Answers</a>
    @endif

</div>
