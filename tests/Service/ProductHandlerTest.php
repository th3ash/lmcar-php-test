<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\ProductHandler;

/**
 * Class ProductHandlerTest
 */
class ProductHandlerTest extends TestCase
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];

    public function testGetTotalPrice()
    {
        $productService =  new ProductHandler();
        $testTotalPrice = $productService->getTotalPrice($this->products);

        $this->assertEquals(143, $testTotalPrice);
    }

    public function testProductSort() {

        $productType = 'Dessert';

        $productService =  new ProductHandler();
        $products = $productService->getProductSort($this->products,$productType);


        $this->assertNotEmpty($products,'productSort 返回数据为空');

        $productPrice = PHP_INT_MAX;
        foreach ($products as $product) {
            $this->assertNotTrue(!empty($productType) && $product['type'] != $productType, "ProductSort 产品中含有非{$productType}类型数据");
            $this->assertNotTrue($product['price'] > $productPrice, 'ProductSort 产品排序不正确');
            $productPrice = $product['price'];
        }
    }

    public function testConvertCreateTime() {
        $productService =  new ProductHandler();
        $products = $productService->convertCreateTime($this->products);

        foreach ($products as $product) {
            $this->assertEquals($product['create_at'],date("Y-m-d H:i:s",$product['create_time']),'ConvertCreateTime 时间转换不正确');
        }
    }
}