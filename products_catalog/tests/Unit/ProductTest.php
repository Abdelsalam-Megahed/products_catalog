<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_can_list_products()
    {
        $category = factory(Category::class)->create(["name" => $this->faker->name]);

        $products = factory(Product::class, 2)->create(['category_id' => $category->id])->map(function ($product) {
            return $product->only(['id', 'name', 'price', 'quantity', 'in_stock', 'rating', 'category_id']);
        });

        $this->get(route('products'))
            ->assertStatus(200)
            ->assertJson($products->toArray())
            ->assertJsonStructure([
                '*' => ['id', 'name', 'price', 'quantity', 'in_stock', 'rating', 'category_id'],
            ]);
    }

    public function test_can_show_product() {
        $category = factory(Category::class)->create(["name" => $this->faker->name]);

        $product = factory(Product::class)->create(['category_id' => $category->id]);

        $this->get(route('products.show', $product->id))
            ->assertStatus(200);
    }

    public function test_can_create_product() {
        $category = factory(Category::class)->create(["name" => $this->faker->name]);

        $data = [
            "name" => $this->faker->name,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomDigit,
            'quantity' => $this->faker->numberBetween($min = 10, $max = 900),
            'in_stock' => $this->faker->boolean,
            'rating' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 5),
            'category_id' => $category->id
        ];

        $this->post(route('products.store'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function test_can_update_product() {

        $category = factory(Category::class)->create(["name" => $this->faker->name]);

        $product = factory(Product::class)->create(['category_id' => $category->id]);
        $data = [
            'name' => $this->faker->name,
        ];

        $this->put(route('products.update', $category->id), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function test_can_delete_product() {
        $category = factory(Category::class)->create(["name" => $this->faker->name]);

        $product = factory(Product::class)->create(['category_id' => $category->id]);

        $this->delete(route('products.delete', $product->id))
            ->assertStatus(202);
    }


}
