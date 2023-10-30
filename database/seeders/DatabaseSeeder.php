<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

USE App\Models\User;
USE App\Models\Profile;
USE App\Models\Phone;
USE App\Models\Group;
USE App\Models\Level;
USE App\Models\Location;
USE App\Models\Image;
USE App\Models\Category;
USE App\Models\Comment;
USE App\Models\Post;
USE App\Models\Tag;
USE App\Models\Video;
USE App\Models\City;
USE App\Models\Country;
USE App\Models\State;
USE App\Models\Gender;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run():void
    {
        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*User::factory(50)->create()->each(function ($user){
            $profile = $user->profile()->save(Profile::factory()->make());

            //$user->phone()->save(Phone::factory()->make());
        });*/

        Country::factory()->create(['name'=>'Mexico']);
        Country::factory()->create(['name'=>'Canada']);
        Country::factory()->create(['name'=>'Estados Unidos']);

        $states = [
            'Aguascalientes',
            'Baja California',
            'Baja California Sur',
            'Campeche',
            'Chiapas',
            'Chihuahua',
            'Coahuila',
            'Colima',
            'Ciudad de México',
            'Durango',
            'Guanajuato',
            'Guerrero',
            'Hidalgo',
            'Jalisco',
            'México',
            'Michoacán',
            'Morelos',
            'Nayarit',
            'Nuevo León',
            'Oaxaca',
            'Puebla',
            'Querétaro',
            'Quintana Roo',
            'San Luis Potosí',
            'Sinaloa',
            'Sonora',
            'Tabasco',
            'Tamaulipas',
            'Tlaxcala',
            'Veracruz',
            'Yucatán',
            'Zacatecas'
        ];

        foreach ($states as $st){
            State::factory()->create(['name'=>$st]);
        }

        $hidalgo = [
            'Ixmiquilpan',
            'Pachuca',
            'Actopan',
            'Zimapan',
            'Acatlan',
            'Alfajayucan',
            'Cardonal',
            'Chapantongo',
            'Huejutla',
            'Huichapan',
            'Pisaflores',
            'San Salvador',
            'Tlaxcoapan'
        ];

        foreach ($hidalgo as $h){
            City::factory()->create(['name'=>$h]);

            /*City::factory()->create(['state_id'=>"13"]);*/
        }

        Group::factory()->count(3)->create();

        Level::factory()->create(['name'=>'Administrador']);
        Level::factory()->create(['name'=>'Profesor']);
        Level::factory()->create(['name'=>'Alumno']);

        Gender::factory()->create(['name'=>'Femenino']);
        Gender::factory()->create(['name'=>'Masculino']);

        User::factory(50)->create()->each(function($user){
            $profile=$user->profile()->save(Profile::factory()->make());
            $profile->location()->save(Location::factory()->make());
            $user->groups()->attach($this->array(rand(1,3)));
            $user->image()->save(Image::factory()->make());
            //$user->city()->attach($this->array(rand(1,13)));
            $user->phone()->save(Phone::factory()->make());
        });

        Category::factory(4)->create();
        Tag::factory(12)->create();

        Post::factory(40)->create()->each(function ($post){
            $number_images=rand(1,3);
            for($i=0; $i<$number_images; $i++){
                $post->image()->save(Image::factory()->make());
            }

            $post->tags()->attach($this->array(rand(1,12)));

            $number_comments = rand(1,6);
            
            for($i=0; $i<$number_comments; $i++){
                $post->comments()->save(Comment::factory()->make());
            }
        });

        Video::factory(40)->create()->each(function ($video){
            $number_images=rand(1,3);
            for($i=0; $i<$number_images; $i++){
                $video->image()->save(Image::factory()->make());
            }

            $video->tags()->attach($this->array(rand(1,12)));

            $number_comments = rand(1,6);
            
            for($i=0; $i<$number_comments; $i++){
                $video->comments()->save(Comment::factory()->make());
            }
        }); 
    }

    public function array($max){
        $values = [];
        for($i=1; $i<$max; $i++){
            $values=$i;
        }

        return $values;
    }

}


/*foreach ($morelos as $m){
            City::factory()->create(['name'=>$m]);
            City::factory()->create(['state_id'=>"17"]);
        }

        foreach ($guerrro as $g){
            City::factory()->create(['name'=>$g]);
            City::factory()->create(['state_id'=>"12"]);
        }*/

        /*$morelos = [
            'Cuernavaca',
            'Mazatepec',
            'Tepalcingo',
            'Zacatepec'
        ];

        $guerrero = [
            'Acapulco',
            'Tlapa',
            'Ayutla',
            'Atoyac'
        ];*/
//Hola
