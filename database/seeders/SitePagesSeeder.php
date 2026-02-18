<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class SitePagesSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'home',
                'title' => 'Home',
                'meta_title' => 'Bansal Education Group - Australia\'s Most Trusted Education Consultant',
                'meta_description' => 'Your pathway to quality education. Expert guidance for university admissions, course selection, and career planning in Australia\'s top universities.',
            ],
            [
                'slug' => 'about',
                'title' => 'About Us',
                'meta_title' => 'About Us - Bansal Education Group',
                'meta_description' => 'Learn about Bansal Education Group, Australia\'s most trusted education consultant with 10+ years of experience helping students achieve their dreams.',
            ],
            [
                'slug' => 'courses',
                'title' => 'Courses',
                'meta_title' => 'Courses - Bansal Education Group',
                'meta_description' => 'Explore popular Australian courses including Engineering, Business, Healthcare, IT, Hospitality, and Trade courses from top universities.',
            ],
            [
                'slug' => 'services',
                'title' => 'Student Services',
                'meta_title' => 'Student Services - Bansal Education Group',
                'meta_description' => 'Education counselling, admission support, and career guidance for students planning to study in Australia.',
            ],
            [
                'slug' => 'testimonials',
                'title' => 'Success Stories',
                'meta_title' => 'Success Stories - Bansal Education Group',
                'meta_description' => 'Read inspiring success stories from our students who achieved their dreams in Australia\'s top universities.',
            ],
            [
                'slug' => 'contact',
                'title' => 'Contact Us',
                'meta_title' => 'Contact Us - Bansal Education Group',
                'meta_description' => 'Get in touch with Australia\'s most trusted education consultant. Book your free consultation today.',
            ],
        ];

        foreach ($pages as $data) {
            Page::updateOrCreate(
                ['slug' => $data['slug']],
                array_merge($data, ['is_published' => true])
            );
        }
    }
}
