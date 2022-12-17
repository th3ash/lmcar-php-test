<?php

namespace App\Service;


class ProductHandler

{
    #问题如下:
    #1.筛选商品种类是小写的 dessert 但mockData给的首字母是大写所以我做了转换
    /**
     * 计算商品总金额
     * @param $data
     * @return int
     */
    public function getTotalPrice($data): int
    {
        $totalPrice = 0;
        foreach ($data as $item) {
            $price = $item['price'] ?: 0;
            $totalPrice += $price;
        }
        return $totalPrice;
    }

    /**
     * 排序
     * @param $data array
     * @return array
     */
    public function quickSort($data): array
    {
        $newData = [];
        $sort = array_column($data, 'price');
        array_multisort($sort, SORT_DESC, $data);
        foreach ($data as $item) {
            if (strtolower($item['type']) == 'dessert') {
                $newData[] = $item;
            }
        }
        return $newData;
    }

    /**
     * 修改create_at
     * @param $data
     * @return array
     */
    public function editCreateAt($data): array
    {
        $newData = [];
        foreach ($data as $item) {
            $item['create_at'] = strtotime($item['create_at']);
            $newData[] = $item;
        }
        return $newData;
    }
}
