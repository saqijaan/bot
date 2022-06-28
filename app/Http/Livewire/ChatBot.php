<?php

namespace App\Http\Livewire;

use App\Models\Career;
use App\Models\Question;
use Livewire\Component;

class ChatBot extends Component
{
    public $search;

    public $questionCounter;
    public $isLast;

    public array $conversation = [];

    public function mount()
    {
        $this->questionCounter = -1;
        $this->isLast = false;
        $this->conversation[] = [ 
            'id' => $this->questionCounter,
            'question' => 'Hi, How are you ?' 
        ];
    }

    public function render()
    {
        return view('livewire.chat-bot');
    }

    public function submit()
    {
        $this->conversation = collect($this->conversation)->map(function($item){
            
            if ( $this->questionCounter == $item['id'] ){
                $item['answer'] = $this->search;
                $this->search = '';
            }

            return $item;

        })->toArray();

        $nexQuestion = $this->getNextQuestion();

        $this->conversation[] = [
            'id' => $this->questionCounter ,
            'question' =>  $nexQuestion,
        ];

        if ( !$this->isLast ){
            return;
        }

        $answers = collect($this->conversation)->filter(fn($question) => isset($question['answer']) && $question['id'] >= 0 )->pluck('answer')->join(' ');

        $matchingCareers = Career::search($answers)->take(3)->get()->pluck('career_name');

        $this->questionCounter ++;
        
        if ( $matchingCareers->isNotEmpty() ){
            $this->conversation[] = [
                'id' => $this->questionCounter,
                'question' => "We've found following Career matching your answers. ".$matchingCareers->join(', ')
            ];

            return;
        }

        $this->conversation[] = [
            'id' => $this->questionCounter,
            'question' => "Sorry we didn't found any matching career:"
        ];
    }

    public function getNextQuestion()
    {
        $question = Question::where('id', '>', $this->questionCounter)->first();

        if (!$question) {
            $this->isLast = true;
            return 'Thanks for providing information. Let us suggest career based on your answers.';
        }

        $this->questionCounter = $question->id;

        return $question->question;
    }
}
