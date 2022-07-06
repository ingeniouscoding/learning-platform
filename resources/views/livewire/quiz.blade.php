@php
    /**
     * @var $radios string[]
     * @var $isCorrect bool
     * @var $isSubmitted bool
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
            @if($isCorrect )
                <div>
                    Correct
                </div>
            @else
                <div>
                    This is not correct. Try again.
                </div>
            @endif
        @else
            <button wire:click="check" wire:loading.attr="disabled" x-bind:disabled="!answer">
                Check
            </button>
        @endif
    </div>
</div>
