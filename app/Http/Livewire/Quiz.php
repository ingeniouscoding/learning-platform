<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Illuminate\Support\Arr;
use Livewire\Component;

class Quiz extends Component
{
    public string $lessonId;
    public array $radios;
    public string $answer = '';
    public bool $isCorrect = false;
    public bool $isSubmitted = false;

    public function mount(Lesson $lesson)
    {
        $this->lessonId = $lesson->id;
        $arr = explode(';', $lesson->options);
        $this->radios = Arr::shuffle($arr);
    }

    public function render()
    {
        return view('livewire.quiz');
    }

    public function check()
    {
        $lesson = Lesson::findOrFail($this->lessonId, ['answer']);
        $correctAnswer = $lesson->answer;

        $this->isCorrect = $this->answer === $correctAnswer;
        $this->isSubmitted = true;
    }

    public function retry()
    {
        $this->radios = Arr::shuffle($this->radios);
        $this->isSubmitted = false;
        $this->answer = '';
    }
}
