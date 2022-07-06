<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use App\Models\Submission;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Quiz extends Component
{
    public int $lessonId;
    public array $radios;
    public bool $hasSubmissions;
    public string $answer = '';
    public bool $isCorrect = false;
    public bool $isSubmitted = false;

    public function mount(Lesson $lesson)
    {
        $this->lessonId = $lesson->id;
        $arr = explode(';', $lesson->options);
        $this->radios = Arr::shuffle($arr);

        $this->updateSubmissions();
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

        Submission::create([
            'lesson_id' => $this->lessonId,
            'user_id' => Auth::user()->id,
            'answer' => $this->answer,
            'is_correct' => $this->isCorrect,
        ]);

        $this->updateSubmissions();
    }

    public function retry()
    {
        $this->radios = Arr::shuffle($this->radios);
        $this->isSubmitted = false;
        $this->answer = '';

        $this->updateSubmissions();
    }

    private function updateSubmissions()
    {
        $this->hasSubmissions = Submission::query()
            ->select(['id'])
            ->where([
                'user_id' => Auth::user()->id,
                'lesson_id' => $this->lessonId,
            ])
            ->get()
            ->isNotEmpty();
    }
}
