<?php

namespace App\Exports;

use App\Models\Product;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;


class ProductsExportForAdmin implements FromArray,  WithHeadings ,ShouldAutoSize ,WithStrictNullComparison
{
    use Exportable;

    public function  __construct($request)
    {
        $this->request = $request;

    }

    public function array(): array
    {

        $products = Product::filter()->orderBy('id')->get();

        foreach($products as $one){
            $items[] = [
                $one->id,
                @$one->name,
                @$one->category->name ? : __('cp.un_assigned'),
                @$one->price,
                $one->status=='active'?__('cp.active') : __('cp.not_active'),
                $one->created_at->format('Y-m-d')
            ];
        }

        return $items;
    }

    public function headings() :array
    {
        return ["id",__('cp.name') ,__('cp.category') ,__('cp.price')
            ,__('cp.status'),__('cp.created')];

    }
}



