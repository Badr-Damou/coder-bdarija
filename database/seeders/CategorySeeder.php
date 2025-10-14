<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Laravel',
            'description' => 'All about the Laravel PHP framework and its ecosystem.',
        ]);

        Category::create([
            'name' => 'JavaScript',
            'description' => 'Frontend and backend development with JavaScript, Node.js, and frameworks.',
        ]);

        Category::create([
            'name' => 'HTML',
            'description' => 'Learn the structure of web pages using HyperText Markup Language.',
        ]);

        Category::create([
            'name' => 'CSS',
            'description' => 'Design and style web pages with Cascading Style Sheets.',
        ]);

        Category::create([
            'name' => 'Angular',
            'description' => 'Frontend development using Angular for building scalable web apps.',
        ]);

        Category::create([
            'name' => 'TypeScript',
            'description' => 'Enhance JavaScript with static typing and modern language features.',
        ]);

        Category::create([
            'name' => 'Java',
            'description' => 'Object-oriented programming with Java for desktop and web applications.',
        ]);

        Category::create([
            'name' => 'Spring Boot',
            'description' => 'Backend development using the Spring Boot framework for Java.',
        ]);

        Category::create([
            'name' => 'TailwindCSS',
            'description' => 'Utility-first CSS framework for building modern, responsive UIs.',
        ]);

        Category::create([
            'name' => 'PHP',
            'description' => 'Server-side scripting and backend web development with PHP.',
        ]);

        Category::create([
            'name' => 'DevOps',
            'description' => 'CI/CD, Docker, Kubernetes, and automation for deployment and infrastructure.',
        ]);

        Category::create([
            'name' => 'Web Security',
            'description' => 'Best practices for protecting web applications from vulnerabilities.',
        ]);

        Category::create([
            'name' => 'Database',
            'description' => 'Database design, SQL optimization, and data management techniques.',
        ]);

        Category::create([
            'name' => 'ReactJS',
            'description' => 'Modern frontend development with React, Hooks, and state management.',
        ]);

        Category::create([
            'name' => 'UI/UX Design',
            'description' => 'User interface and experience design fundamentals and best practices.',
        ]);

        Category::create([
            'name' => 'Artificial Intelligence',
            'description' => 'AI, Machine Learning, and their real-world applications in development.',
        ]);

        Category::create([
            'name' => 'APIs & RESTful Services',
            'description' => 'Building and consuming APIs using REST, GraphQL, and Laravel Sanctum.',
        ]);

        Category::create([
            'name' => 'Cloud Computing',
            'description' => 'Deploying and managing applications on AWS, Azure, or Google Cloud.',
        ]);
    }
}
