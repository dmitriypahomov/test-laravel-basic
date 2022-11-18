<?php

namespace App\Console\Commands;

use App\Repositories\PostRepository;
use Illuminate\Console\Command;
use App\Jobs\SendEmailJob;

class SendMailAboutPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:send_mail_to_creators';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command send mails to posts creators';

    public function __construct(
        private PostRepository $postRepository,
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach ($this->postRepository->getAll() as $post) {
            dispatch(new SendEmailJob($post));
        }

        $this->info('mails sent.');

        return Command::SUCCESS;
    }
}
