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
                'question' => 'What is your education ? (eg: BSCS, BSIT, MSIT)',
                'options' => [],
                'keywords' => []
            ],
            [
                'question' => 'What skills do you have ? (eg: leadership, communication)',
                'options' => [],
                'keywords' => []
            ],
            [
                'question' => 'How much experience do you have ? (eg: 30 years)',
                'options' => [],
                'keywords' => []
            ],
            [
                'question' => 'What are your hobbies (eg: Reading, Computers, Gaming, Creativity)',
                'options' => [],
                'keywords' => []
            ],
            [
                'question' => 'What are your interested professions. (eg: Developer, Teacher, Web Designer, Engineer, Law)',
                'options' => [],
                'keywords' => []
            ],
        ];
    }
}
