<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\ProductHandler;

/**
 * Class ProductHandlerTest
 */
class ProductHandlerTest extends TestCase
{

    /**
     *
     *
     * @var ProductHandler
     */
    private $productHandler;

    /**
     *
     */
    public function setUp(): void
    {
        $this->productHandler = new ProductHandler();
    }

    private $products = [
            [
                'id'        => 1,
                'name'      => 'Coca-cola',
                'type'      => 'Drinks',
                'price'     => 10,
                'create_at' => '2021-04-20 10:00:00',
            ],
            [
                'id'        => 2,
                'name'      => 'Persi',
                'type'      => 'Drinks',
                'price'     => 5,
                'create_at' => '2021-04-21 09:00:00',
            ],
            [
                'id'        => 3,
                'name'      => 'Ham Sandwich',
                'type'      => 'Sandwich',
                'price'     => 45,
                'create_at' => '2021-04-20 19:00:00',
            ],
            [
                'id'        => 4,
                'name'      => 'Cup cake',
                'type'      => 'Dessert',
                'price'     => 35,
                'create_at' => '2021-04-18 08:45:00',
            ],
            [
                'id'        => 5,
                'name'      => 'New York Cheese Cake',
                'type'      => 'Dessert',
                'price'     => 40,
                'create_at' => '2021-04-19 14:38:00',
            ],
            [
                'id'        => 6,
                'name'      => 'Lemon Tea',
                'type'      => 'Drinks',
                'price'     => 8,
                'create_at' => '2021-04-04 19:23:00',
            ],
        ];



    /**
     * 验证总金额
     *  test get total price
     */
    public function testGetTotalPrice()
    {
        $this->assertEquals(143, $this->productHandler->totalPrice($this->products));
    }

    /**
     * 验证列表排序
     * test list sorting
     */
    public function testListSorting()
    {
        $listSortingDesc = $this->productHandler->listSortingDesc($this->products);

        //验证排序后的id
        $this->assertEquals(3, $listSortingDesc[0]['id']);
        $this->assertEquals(5, $listSortingDesc[1]['id']);
    }

    /**
     * 验证列表筛选
     * 先从大到小排序, 然后Filter Asserting
     * test list filter
     */
    public function testListFilter()
    {
        $listFilter = $this->productHandler->listFilter($this->products);

        //预期有两个 type 等于dessert的商品
        $this->assertCount(2,$listFilter);

        //预期值
        $this->assertEquals('Dessert', $listFilter[0]['type']);
        $this->assertEquals('Dessert', $listFilter[1]['type']);
    }

    /**
     * 先从大到小排序, 然后Filter Asserting
     */
    public function testSortingAndToFilter()
    {
        $sortingAndToFilter = $this->productHandler->sortingAndToFilter($this->products);

        //预期有两个 type 等于dessert的商品
        $this->assertCount(2,$sortingAndToFilter);

        //验证Dessert
        foreach ($sortingAndToFilter as $key => $product){
            $this->assertEquals('Dessert', $sortingAndToFilter[$key]['type']);
        }
    }

    /**
     * 将list的时间转换为时间戳
     */
    public function testMapToStrToTime()
    {
        $sortingAndToFilter = $this->productHandler->mapToStrToTime($this->products);
        foreach ($this->products as $key => $product){
            $this->assertEquals(strtotime($product['create_at']),$sortingAndToFilter[$key]['create_at']);
        }
    }
}