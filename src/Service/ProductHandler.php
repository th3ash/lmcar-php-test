<?php

namespace App\Service;

class ProductHandler
{
    /**
     * 根据商品求和
     * @param $products
     * @return float|int
     */
    static function getTotalPrice(Array $products)
    {
        if (empty($products)) return 0;
        $priceArr = array_column($products,'price');
        return array_sum($priceArr);
    }

    /**
     * 商品排序
     * @param array $products
     * @return array
     */
    static function sortProduct(Array $products)
    {
        $sesserts = [];
        if($products){
            $keyfield = [];
            foreach ($products as $key => $val) {
                if ($val['type']=='Dessert') $sesserts[] = $val['id'];
                $keyfield[$key] = $val['price'];
            }
            array_multisort( $keyfield,SORT_DESC, $products);
        }
        return [$products,$sesserts];
    }

    /**
     * 修改蟾片日期时间为时间戳
     * @param array $products
     * @return array
     */
    static function changeTimeStamp(Array $products)
    {
        foreach ($products as &$v) {
            $v['create_at'] = strtotime($v['create_at']);
        }
        return $products;
    }
}