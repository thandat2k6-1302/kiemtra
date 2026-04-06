<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $index = 0;

    public function definition(): array
    {
        $products = [
            // Hoa quả (8 unique)
            ["category" => "Hoa quả", "name" => "Táo Đỏ Mỹ", "image" => "https://images.unsplash.com/photo-1570913149827-d2ac84ab3f9a?w=600&h=400&fit=crop"],
            ["category" => "Hoa quả", "name" => "Chuối Chín", "image" => "https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?w=600&h=400&fit=crop"],
            ["category" => "Hoa quả", "name" => "Cam Úc", "image" => "https://images.unsplash.com/photo-1557800636-894a64c1696f?w=600&h=400&fit=crop"],
            ["category" => "Hoa quả", "name" => "Dâu Tây Đà Lạt", "image" => "https://images.unsplash.com/photo-1464965911861-746a04b4bca6?w=600&h=400&fit=crop"],
            ["category" => "Hoa quả", "name" => "Nho Tím Ninh Thuận", "image" => "https://images.unsplash.com/photo-1596333523244-64f79737c988?w=600&h=400&fit=crop"],
            ["category" => "Hoa quả", "name" => "Xoài Cát Hòa Lộc", "image" => "https://images.unsplash.com/photo-1553279768-865429fa0078?w=600&h=400&fit=crop"],
            ["category" => "Hoa quả", "name" => "Thanh Long Đỏ", "image" => "https://images.unsplash.com/photo-1551465228-ca735e0545f9?w=600&h=400&fit=crop"],
            ["category" => "Hoa quả", "name" => "Măng Cụt Tươi", "image" => "https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?w=600&h=400&fit=crop"],
            
            // Thực phẩm hữu cơ (5 unique)
            ["category" => "Thực phẩm hữu cơ", "name" => "Rau Bina Tươi", "image" => "https://images.unsplash.com/photo-1576045057995-568f588f82fb?w=600&h=400&fit=crop"],
            ["category" => "Thực phẩm hữu cơ", "name" => "Cà Rốt Hữu Cơ", "image" => "https://images.unsplash.com/photo-1598170845058-32b9d6a5da37?w=600&h=400&fit=crop"],
            ["category" => "Thực phẩm hữu cơ", "name" => "Salad Xanh Sạch", "image" => "https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=600&h=400&fit=crop"],
            ["category" => "Thực phẩm hữu cơ", "name" => "Súp Lơ Xanh", "image" => "https://images.unsplash.com/photo-1584270354949-c26b0d5b4a0c?w=600&h=400&fit=crop"],
            ["category" => "Thực phẩm hữu cơ", "name" => "Cà Chua Bi", "image" => "https://images.unsplash.com/photo-1558231221-db994806a14a?w=600&h=400&fit=crop"],
            ["category" => "Thực phẩm hữu cơ", "name" => "Khoai Tây Đà Lạt", "image" => "https://images.unsplash.com/photo-1518977676601-b53f02ac6d31?w=600&h=400&fit=crop"],

            // Thực phẩm khô (6 unique)
            ["category" => "Thực phẩm khô", "name" => "Gạo ST25 Loại 1", "image" => "https://images.unsplash.com/photo-1586201375761-83865001e31c?w=600&h=400&fit=crop"],
            ["category" => "Thực phẩm khô", "name" => "Hạt Điều Rang Muối", "image" => "https://images.unsplash.com/photo-1590080874088-eec64895b423?w=600&h=400&fit=crop"],
            ["category" => "Thực phẩm khô", "name" => "Hạnh Nhân Tự Nhiên", "image" => "https://images.unsplash.com/photo-1514733670139-4d87a1941d55?w=600&h=400&fit=crop"],
            ["category" => "Thực phẩm khô", "name" => "Hạt Mắc Ca Sấy", "image" => "https://images.unsplash.com/photo-1623543940177-3bc1d3a5ca04?w=600&h=400&fit=crop"],
            ["category" => "Thực phẩm khô", "name" => "Mì Ramen Khô", "image" => "https://images.unsplash.com/photo-1569718212165-3a8278d5f624?w=600&h=400&fit=crop"],
            ["category" => "Thực phẩm khô", "name" => "Đậu Phộng Rang", "image" => "https://images.unsplash.com/photo-1567306226416-28f0efdc88c0?w=600&h=400&fit=crop"],

            // Sản phẩm nổi bật (6 unique)
            ["category" => "Sản phẩm nổi bật", "name" => "Thịt Bò Mỹ", "image" => "https://images.unsplash.com/photo-1544025162-d76694265947?w=600&h=400&fit=crop"],
            ["category" => "Sản phẩm nổi bật", "name" => "Cá Hồi Nauy", "image" => "https://images.unsplash.com/photo-1467003909585-2f8a72700288?w=600&h=400&fit=crop"],
            ["category" => "Sản phẩm nổi bật", "name" => "Trứng Gà Ta", "image" => "https://images.unsplash.com/photo-1582722872445-41DC50bfce30?w=600&h=400&fit=crop"],
            ["category" => "Sản phẩm nổi bật", "name" => "Thịt Gà Quay", "image" => "https://images.unsplash.com/photo-1598515214211-89d3c73ae83b?w=600&h=400&fit=crop"],
            ["category" => "Sản phẩm nổi bật", "name" => "Hải Sản Tươi Sống", "image" => "https://images.unsplash.com/photo-1615141982883-c7ad0e69fd62?w=600&h=400&fit=crop"],
            ["category" => "Sản phẩm nổi bật", "name" => "Sữa Tươi Nguyên Chất", "image" => "https://images.unsplash.com/photo-1550583724-b26497a5ee5b?w=600&h=400&fit=crop"]
        ];

        $item = $products[self::$index % count($products)];
        self::$index++;

        return [
            'name' => $item['name'],
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(10, 500) * 1000,
            'image' => $item['image'],
            'category' => $item['category'],
        ];
    }
}
