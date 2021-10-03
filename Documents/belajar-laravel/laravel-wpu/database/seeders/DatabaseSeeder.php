<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([

            'name'      => 'Iqbal Rasetio',
            'email'     => 'iqbalrasetio16@gmail.com',
            'username'     => 'iqbal',
            'password'  => bcrypt('iqbal123')

        ]);

        // User::create([

        //     'name'      => 'Fikri',
        //     'email'     => 'fikri@gmail.com',
        //     'password'  => bcrypt('123456')

        // ]);

        User::factory(3)->create();
            
        Category::create([

            'name'  => 'Web Programming',
            'slug'  => 'web-programming'   

        ]);

        Category::create([

            'name'  => 'Web Design',
            'slug'  => 'web-design'   

        ]);


        Category::create([

            'name'  => 'Personal',
            'slug'  => 'personal'   

        ]);

        Post::factory(20)->create();

        

        // Post::create([

        //     'title'         => 'Judul Post Pertama',
        //     'slug'          => 'judul-post-pertama',
        //     'excerpt'       => 'lorem ipsum dolot sit amet',
        //     'body'          => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi perspiciatis natus similique obcaecati, hic culpa temporibus. Autem officiis, quisquam in corrupti neque numquam sed officia? Voluptatem, ad consequuntur accusamus nemo eaque voluptate quia aspernatur repellat rem sapiente? Nulla, placeat distinctio. Sunt repudiandae ipsum facere quo non possimus nobis laboriosam ab et dolorum nemo sapiente minima iusto sit, ad ipsam nam quia eveniet, blanditiis modi pariatur asperiores velit illo tenetur. Natus ipsa, adipisci nisi placeat facere inventore dolores quos aut, officiis omnis aliquam? Debitis nihil dolorum animi quo facilis quasi cum consectetur perspiciatis, necessitatibus illo harum similique quisquam repudiandae reiciendis adipisci.',
        //     'category_id'   => 1,  
        //     'user_id'       => 1,

        // ]);


        // Post::create([

        //     'title'         => 'Judul Post Kedua',
        //     'slug'          => 'judul-post-kedua',
        //     'excerpt'       => 'lorem ipsum dolot sit amet',
        //     'body'          => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi perspiciatis natus similique obcaecati, hic culpa temporibus. Autem officiis, quisquam in corrupti neque numquam sed officia? Voluptatem, ad consequuntur accusamus nemo eaque voluptate quia aspernatur repellat rem sapiente? Nulla, placeat distinctio. Sunt repudiandae ipsum facere quo non possimus nobis laboriosam ab et dolorum nemo sapiente minima iusto sit, ad ipsam nam quia eveniet, blanditiis modi pariatur asperiores velit illo tenetur. Natus ipsa, adipisci nisi placeat facere inventore dolores quos aut, officiis omnis aliquam? Debitis nihil dolorum animi quo facilis quasi cum consectetur perspiciatis, necessitatibus illo harum similique quisquam repudiandae reiciendis adipisci.',
        //     'category_id'   => 1,  
        //     'user_id'       => 1,

        // ]);

        

        // Post::create([

        //     'title'         => 'Judul Post Ketiga',
        //     'slug'          => 'judul-post-ketiga',
        //     'excerpt'       => 'lorem ipsum dolot sit amet',
        //     'body'          => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi perspiciatis natus similique obcaecati, hic culpa temporibus. Autem officiis, quisquam in corrupti neque numquam sed officia? Voluptatem, ad consequuntur accusamus nemo eaque voluptate quia aspernatur repellat rem sapiente? Nulla, placeat distinctio. Sunt repudiandae ipsum facere quo non possimus nobis laboriosam ab et dolorum nemo sapiente minima iusto sit, ad ipsam nam quia eveniet, blanditiis modi pariatur asperiores velit illo tenetur. Natus ipsa, adipisci nisi placeat facere inventore dolores quos aut, officiis omnis aliquam? Debitis nihil dolorum animi quo facilis quasi cum consectetur perspiciatis, necessitatibus illo harum similique quisquam repudiandae reiciendis adipisci.',
        //     'category_id'   => 2,  
        //     'user_id'       => 2,

        // ]);


        // Post::create([

        //     'title'         => 'Judul Post Keempat',
        //     'slug'          => 'judul-post-keempat',
        //     'excerpt'       => 'lorem ipsum dolot sit amet',
        //     'body'          => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi perspiciatis natus similique obcaecati, hic culpa temporibus. Autem officiis, quisquam in corrupti neque numquam sed officia? Voluptatem, ad consequuntur accusamus nemo eaque voluptate quia aspernatur repellat rem sapiente? Nulla, placeat distinctio. Sunt repudiandae ipsum facere quo non possimus nobis laboriosam ab et dolorum nemo sapiente minima iusto sit, ad ipsam nam quia eveniet, blanditiis modi pariatur asperiores velit illo tenetur. Natus ipsa, adipisci nisi placeat facere inventore dolores quos aut, officiis omnis aliquam? Debitis nihil dolorum animi quo facilis quasi cum consectetur perspiciatis, necessitatibus illo harum similique quisquam repudiandae reiciendis adipisci.',
        //     'category_id'   => 2,  
        //     'user_id'       => 2,

        // ]);






    }
}
