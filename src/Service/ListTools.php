<?php
/**
 *
 *
 * @User    : zw
 * @DateTime: 2022/12/26 10:21 下午
 */

namespace App\Service;


class ListTools
{
    /**
     *
     *
     * @var array
     */
    private $products = [];

    /**
     * @constructor ListTools.
     *
     * @param  array  $products
     */
    public function __construct(array $products)
    {
        $this->products = $products;
    }

    /**
     * map reduce
     *
     * @param  \Closure  $callable
     * @param  null      $default
     *
     * @return null
     */
    public function reduce(\Closure $callable, $default = null)
    {
        return array_reduce($this->products, $callable, $default);
    }

    /**
     * @param  string  $field
     *
     * @return ListTools
     */
    public function sortingDesc(string $field): ListTools
    {
        array_multisort(
            array_column($this->products, $field), SORT_DESC, $this->products
        );

        return new static($this->products);
    }


    /**
     * filter info
     *
     * @param  \Closure  $filterClosure
     *
     * @return ListTools
     */
    public function filter(\Closure $filterClosure): ListTools
    {
        return new static(array_filter($this->products, $filterClosure));
    }

    /**
     * to array values
     *
     * @return ListTools
     */
    public function values(): ListTools
    {
        return new static(array_values($this->products));
    }

    /**
     * map tools
     *
     * @param  \Closure  $mapClosure
     *
     * @return mixed
     */
    public function map(\Closure $mapClosure): ListTools
    {
        return new static(array_map($mapClosure, $this->products));
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->products;
    }
}