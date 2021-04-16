<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $author = User::create([
            'name' => 'admin',
            'email' => 'admin@123.com',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        $category1 = Category::create([
            'name' => 'News'
        ]);
        $category2 = Category::create([
            'name' => 'Marketing'
        ]);
        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        $post1 = Post::create([ // $author->posts()->create // İlişkilendirme yapıldığı için aynı işlevi görür.
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'only five centuries, but also the leap into electronic typesetting',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
            'user_id' => $author->id

        ]);
        $post2 = $author->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'only five centuries, but also the leap into electronic typesetting',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum',
            'category_id' => $category2 ->id,
            'image' => 'posts/2.jpg',

        ]);
        $post3 = $author->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'only five centuries, but also the leap into electronic typesetting',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum',
            'category_id' => $category3 ->id,
            'image' => 'posts/3.jpg',

        ]);
        $post4  = $author->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'only five centuries, but also the leap into electronic typesetting',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum',
            'category_id' => $category2 ->id,
            'image' => 'posts/4.jpg',

        ]);

        $tag = Tag::create([
            'name' => 'Job'
        ]);
        $tag1 = Tag::create([
            'name' => 'Customers'
        ]);
        $tag2 = Tag::create([
            'name' => 'Record'
        ]);
        $tag3 = Tag::create([
            'name' => 'Job'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag2->id, $tag3->id]);
    }
}
