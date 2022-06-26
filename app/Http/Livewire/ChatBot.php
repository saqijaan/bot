<?php

namespace App\Http\Livewire;

use App\Models\Career;
use App\Models\Question;
use Livewire\Component;

class ChatBot extends Component
{
    public $search;

    public $questionCounter;

    public array $conversation = [];

    public function mount()
    {
        $this->questionCounter = -1;
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
    }

    public function getNextQuestion()
    {
        $question = Question::where('id', '>', $this->questionCounter)->first();

        if (!$question) {
            return 'Thanks for providing information. Let us suggest career based on your answers.';
        }

        $this->questionCounter = $question->id;

        return $question->question;
    }
}
