<?php

namespace Tests\Unit;

use App\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_can_list_categories() {
        $categories = factory(Category::class, 2)->create()->map(function ($category) {
            return $category->only(['id', 'name']);
        });

        $this->get(route('categories'))
            ->assertStatus(200)
            ->assertJson($categories->toArray())
            ->assertJsonStructure([
                '*' => [ 'id', 'name', 'updated_at', 'created_at' ],
            ]);
    }

    public function test_can_show_category() {

        $category = factory(Category::class)->create();

        $this->get(route('categories.show', $category->id))
            ->assertStatus(200);
    }

    public function test_can_create_category() {
        $data = [
            "name" => "Books",
        ];

        $this->post(route('categories.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function test_can_update_category() {

        $category = factory(Category::class)->create();

        $data = [
            'name' => $this->faker->name,
        ];

        $this->put(route('categories.update', $category->id), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function test_can_delete_category() {

        $category = factory(Category::class)->create();

        $this->delete(route('categories.delete', $category->id))
            ->assertStatus(202);
    }
}
