<?php

namespace App\Service;

class ProductHandler
{
    public function getTotalPrice(&$products) {
        $totalPrice = 0;

        foreach ($products as $product) {
            $totalPrice += isset($product['price']) && $product['price'] > 0 ? $product['price'] : 0;
        }
        return $totalPrice;
    }

    public function getProductSort(&$products, $type = 'Dessert') {

        $newProdcts = [];
        if (empty($products)) {
            return $newProdcts;
        }

        if (empty($type)) {
            $newProdcts = $products;
        } else {
            foreach ($products as $product) {
                if ($product['type'] == $type) {
                    $newProdcts[] = $product;
                }
            }
        }

        array_multisort(array_column($newProdcts,'price'),SORT_DESC,$newProdcts);
        return $newProdcts;
    }

    public function convertCreateTime($products) {

        foreach ($products as &$product) {
            $product['create_time'] = isset($product['create_at']) ? strtotime($product['create_at']) : 0;
        }
        return $products;
    }
}