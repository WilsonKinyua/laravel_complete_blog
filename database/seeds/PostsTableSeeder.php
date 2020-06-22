<?php

use App\Category;
use App\Photo;
use App\Role;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role1 = Role::create([
            "name"=>"administrator"
        ]);
        $role2 = Role::create([
            "name"=>"subscriber"
        ]); 
        $role3 = Role::create([
            "name"=>"author"
        ]);
        $role4 = Role::create([
            "name"=>"guest"
        ]);

        $photo1 = Photo::create(["file"=>"4.jpg"]);
        $photo2 = Photo::create(["file"=>"5.jpg"]);
        $photo3 = Photo::create(["file"=>"6.jpg"]);
        $photo4 = Photo::create(["file"=>"7.jpg"]);

        $author1 = User::create([
            "name"=>"WJohn Doe",
            "email"=>"hello@gmail.com",
            "password"=>Hash::make('password'),
            "role_id"=>$role2->id,
            "photo_id"=>$photo1->id,
        ]);

        $author2 = User::create([
            "name"=>"WTruk Does",
            "email"=>"hellos@gmail.com",
            "password"=>Hash::make('password'),
            "role_id"=>$role3->id,
            "photo_id"=>$photo3->id,
        ]);


        $author3 = User::create([
            "name"=>"Miss Wilson",
            "email"=>"slisaser@gmail.com",
            "password"=>Hash::make('password'),
             "role_id"=>$role4->id,
             "photo_id"=>$photo2->id,
        ]);


        $category1 = Category::create([
            "name"=>"News",
            "user_id"=>$author1->id
        ]);
        $category2 = Category::create([
            "name"=>"Updates",
            "user_id"=>$author2->id
        ]); 
        $category3 = Category::create([
            "name"=>"Design",
            "user_id"=>$author1->id
        ]);
        $category4 = Category::create([
            "name"=>"Marketing",
            "user_id"=>$author3->id
        ]);
        $category5 = Category::create([
            "name"=>"Partnership",
            "user_id"=>$author1->id
        ]);  
        $category6 = Category::create([
            "name"=>"Product",
            "user_id"=>$author1->id
        ]);
        $category7 = Category::create([
            "name"=>"Hiring",
            "user_id"=>$author1->id
        ]);
        $category8 = Category::create([
            "name"=>"Offers",
            "user_id"=>$author1->id
        ]);


        $tag1 = Tag::create([
            "name"=>"Progress",
            "user_id"=>$author1->id
        ]);
        $tag2 = Tag::create([
            "name"=>"Record",
            "user_id"=>$author1->id
        ]);
        $tag3 = Tag::create([
            "name"=>"Custormers",
            "user_id"=>$author1->id
        ]);
        $tag4 = Tag::create([
            "name"=>"Freebie",
            "user_id"=>$author1->id
        ]);
        $tag5 = Tag::create([
            "name"=>"Offer",
            "user_id"=>$author1->id
        ]);
        $tag6 = Tag::create([
            "name"=>"Screenshot",
            "user_id"=>$author1->id
        ]);
        $tag7 = Tag::create([
            "name"=>"Milestone",
            "user_id"=>$author1->id
        ]);
        $tag8 = Tag::create([
            "name"=>"Version",
            "user_id"=>$author1->id
        ]);
        $tag9 = Tag::create([
            "name"=>"Design",
            "user_id"=>$author1->id
        ]);
        $tag10 = Tag::create([
            "name"=>"Customers",
            "user_id"=>$author1->id
        ]);
        $tag11 = Tag::create([
            "name"=>"Job",
            "user_id"=>$author1->id
        ]);
        $tag12 = Tag::create([
            "name"=>"Gender",
            "user_id"=>$author1->id
        ]);


        $post1 = $author1->posts()->create([
            "title"=>"This friendship between a dolphin and dog is melting hearts on the Internet",
            "short_description"=>" Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo ni",
            "content"=>" Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo nihil ex, odio nemo amet dolores. Animi, autem.",
            "category_id"=>$category1->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag1->id,
            "photo_id"=>$photo1->id
        ]);
        $post2 = $author3->posts()->create([
            "title"=>"Top 5 brilliant content marketing strategies",
            "short_description"=>" Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo ni",
            "content"=>" Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo nihil ex, odio nemo amet dolores. Animi, autem.",
            "category_id"=>$category2->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag2->id,
            "photo_id"=>$photo2->id
        ]);
        $post3 = $author2->posts()->create([
            "title"=>"Best practices for minimalist design with example",
            "short_description"=>" Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo ni",
            "content"=>" Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo nihil ex, odio nemo amet dolores. Animi, autem.",
            "category_id"=>$category3->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag3->id,
            "photo_id"=>$photo3->id
        ]);


        $post4 = $author1->posts()->create([
            "title"=>"Congratulate and thank to Maryam for joining our team",
            "short_description"=>" Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo ni",
            "content"=>" Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo nihil ex, odio nemo amet dolores. Animi, autem.",
            "category_id"=>$category4->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag4->id,
            "photo_id"=>$photo4->id
        ]);

        $post5 = $author1->posts()->create([
            "title"=>"We relocated our office to a new designed garage",
            "short_description"=>" Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo ni",
            "content"=>" Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo nihil ex, odio nemo amet dolores. Animi, autem.",
            "category_id"=>$category1->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag1->id,
            "photo_id"=>$photo1->id
        ]);
        $post6 = $author3->posts()->create([
            "title"=>"Top 5 brilliant content marketing strategies",
            "short_description"=>" Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo ni",
            "content"=>" Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo nihil ex, odio nemo amet dolores. Animi, autem.",
            "category_id"=>$category2->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag2->id,
            "photo_id"=>$photo2->id
        ]);


        $post7 = $author2->posts()->create([
            "title"=>"Best practices for minimalist design with example",
            "short_description"=>" Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo ni",
            "content"=>" Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo nihil ex, odio nemo amet dolores. Animi, autem.",
            "category_id"=>$category3->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag3->id,
            "photo_id"=>$photo3->id
        ]);


        $post8 = $author1->posts()->create([
            "title"=>"Congratulate and thank to Maryam for joining our team",
            "short_description"=>" Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo ni",
            "content"=>" Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium nostrum, libero blanditiis ullam soluta recusandae atque, voluptate distinctio consequatur similique iusto explicabo nihil ex, odio nemo amet dolores. Animi, autem.",
            "category_id"=>$category4->id,
            "published_at"=>"2020-06-21 12:00:00",
            "tag_id"=>$tag4->id,
            "photo_id"=>$photo4->id
        ]);

    }
}
