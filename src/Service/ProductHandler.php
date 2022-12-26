<?php

namespace App\Service;

/**
 * @Class   ProductHandler
 * @package App\Service
 */
class ProductHandler
{

    /**
     * get product list total price
     *
     * @param  array  $products  the product list
     *
     * @return mixed
     */
    public function totalPrice(array $products): int
    {
        $listTools = new ListTools($products);

        return $listTools->reduce(function (int $currentPrice, array $products): int {
            return $currentPrice + (int)$products['price'];
        },0);
    }

    /**
     * to sorting
     *
     * @param  array  $products
     *
     * @return array
     */
    public function listSortingDesc(array $products): array
    {
        $listTools = new ListTools($products);

        return $listTools->sortingDesc('price')->toArray();
    }

    /**
     * list filter
     *
     * @param  array  $products
     *
     * @return array
     */
    public function listFilter(array $products): array
    {
        $listTools = new ListTools($products);

        return $listTools->filter(function(array $product) :bool{
            return strtolower($product['type']) === 'dessert';
        })->values()->toArray();
    }

    /**
     *
     *
     * @param  array  $products
     *
     * @return array
     */
    public function sortingAndToFilter(array $products): array
    {
        $listTools = new ListTools($products);

        return $listTools->sortingDesc('price')->filter(function(array $product) :bool{
            return strtolower($product['type']) === 'dessert';
        })->values()->toArray();
    }

    /**
     * 转换成时间戳
     *
     * @param  array  $products
     *
     * @return array|mixed
     */
    public function mapToStrToTime(array $products): array
    {
        $listTools = new ListTools($products);
        return $listTools->map(function(array $product):array{ $product['create_at'] = strtotime($product['create_at']); return $product;})->toArray();
    }
}