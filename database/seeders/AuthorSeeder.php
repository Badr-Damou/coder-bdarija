<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Brad Traversy',
            'bio' => 'Brad Traversy is a web developer and educator known for his comprehensive tutorials on web development technologies.',
            'website' => 'https://www.traversymedia.com',
            'twitter' => 'https://twitter.com/traversymedia',
            'youtube' => 'https://www.youtube.com/user/TechGuyWeb',
            'linkedin' => 'https://www.linkedin.com/in/bradtraversy/',
            'github' => 'https://wwWw.github.com/bradtraversy',
            'profile_picture' => 'https://www.traversymedia.com/images/brad.jpg',
        ]);
    }
}
