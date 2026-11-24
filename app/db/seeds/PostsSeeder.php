<?php

use Phinx\Seed\AbstractSeed;

class PostsSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Alice',
                'message' => 'Welcome to the guestbook!',
                'posted_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Bob',
                'message' => 'Nice to see the database is connected.',
                'posted_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $posts = $this->table('posts');
        $posts->insert($data)->save();
    }
}
