<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Tag;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    //Vamos a buscar tags en la base de datos, por eso necesitamos correr las migraciones de test por asi decirlo.
    public function testEmpty()
    {
        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee('No hay etiquetas');
    }
    public function testWithData()
    {
        $tag = Tag::factory()->create([

        ]);
        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee($tag->name)
            ->assertDontSee('No hay etiquetas');
    }
}
