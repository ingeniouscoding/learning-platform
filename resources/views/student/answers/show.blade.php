@php /** @var $submissions \App\Models\Submission[] */ @endphp

@extends('layouts.student')

@section('title', 'Answers')

@section('content')

    @if(count($submissions))

        <h3 class="answer">Answers</h3>

        <div>
            <table>
                <thead>
                <tr>
                    <th>Answer</th>
                    <th>Is correct</th>
                    <th>Time <span x-text="tz"></span></th>
                </tr>
                </thead>
                <tbody>
                @foreach($submissions as $submission)
                    <tr class="@if($submission->is_correct) answer @endif">
                        <td>{{ $submission->answer }}</td>
                        <td>
                            @if($submission->is_correct)
                                Correct
                            @else
                                Mistake
                            @endif
                        </td>
                        <td x-data="{ date: new Date($el.innerText) }"
                            x-text="date.toLocaleString()"
                        >
                            {{ $submission->created_at }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @endif

@endsection
