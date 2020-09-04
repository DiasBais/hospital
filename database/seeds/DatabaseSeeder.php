<?php

use App\User;
use App\News;
use App\Directions;
use App\query;
use App\doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory(Directions::class, 20)->create();
        // factory(query::class, 20)->create();
        // factory(doctor::class, 20)->create();
        // factory(User::class, 20)->create();
        // factory(News::class, 20)->create();
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'admin@test.com',
        //     'password' => Hash::make('admin'),
        //     'role' => 2
        // ]);
        // User::create([
        //     'name' => 'User',
        //     'email' => 'user@test.com',
        //     'password' => Hash::make('secret'),
        //     'role' => 1
        // ]);
        // News::create([
        //     'title' => 'New_title',
        //     'description' => 'user@test.comh hddhrdsishsiese esuoesruoersuo ersusrui  eruseuesruiesruio eesruesr eiues s tsoiotsoeesuo ti etioeo irt fjtdtdt',
        //     'photo' => 'https://hsto.org/getpro/habr/post_images/d55/56b/807/d5556b807e74c5f1ba534192a5352d7a.png'
        // ]);
        // News::create([
        //     'title' => 'ef werfwefegwe wegwr weferg wefrgweqwef wrg wefwe',
        //     'description' => 'asdasdSAASDadsasdasd asdasd a asdasd  asdasd asd asd afsgfgegw wgwr erewfqewefqewf wef efsfs efsef sfwsdf ewf wefwwefs ea fsese fse sef srgwefe shsheer trh rsthrdhs trhshsethtsrhtyrdth rt rthrdh rthrtdh drhrthtrsestrs rdrthseeererege eregdgtdrghffgthfth fthfhthd dtdddddgf tddrgdrtdh ddh ydjdhts drt trdhdrhrdhrdh hrdh rth td rt rd drt dr td sth rt t th dhthrd dr rg er gegregeger eggeegrger erg eg ergtrhf htfh ft htfh t dt ddfhdis iu susugisds sggdhsgdd',
        //     'photo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/1200px-Vue.js_Logo_2.svg.png'
        // ]);
    }
}
