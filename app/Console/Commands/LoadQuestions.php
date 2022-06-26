<?php

namespace App\Console\Commands;

use App\Models\Question;
use Illuminate\Console\Command;

class LoadQuestions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'questions:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load Questions into database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Question::truncate();

        foreach ($this->getQuestions() as $question) {
            Question::create($question);
        }

        $this->info('All Questions Loaded');
    }

    private function getQuestions()
    {
        return [
            [
                'question' => 'What is your education ?',
                'options' => []
            ],
            [
                'question' => 'Are you intersted in helping peoples ?',
                'options' => []
            ],
            [
                'question' => 'Do you like physical activities like running, gym etc ?',
                'options' => []
            ],
            [
                'question' => 'Do you like to be ordered by others ?',
                'options' => []
            ],
            [
                'question' => 'Are you comfortable with issues ?',
                'options' => []
            ], [
                'question' => 'Do you like fixing issues ?',
                'options' => []
            ],
            [
                'question' => 'Does you communication skills are stronger ?',
                'options' => []
            ],
            [
                'question' => 'Do you like to share your knowlege with others ?',
                'options' => []
            ],
            [
                'question' => 'Do you like creativity ?',
                'options' => []
            ],
            [
                'question' => 'Are you intereseted in making new things ?',
                'options' => []
            ],
        ];
    }
}
