<?php

namespace App\Services;

use App\Helpers\NumberHelper;

class XMLBuilder
{
    public static function build($order)
    {
        $xml = new \SimpleXMLElement(
            '<?xml version="1.0" encoding="UTF-8"?><Invoices/>'
        );

        $inv = $xml->addChild('Inv');

        // key unique
        $inv->addChild('key', 'ORDER_' . $order->id);

        $invoice = $inv->addChild('Invoice');

        // thông tin khách hàng
        $invoice->addChild('CusCode', $order->code);

        $invoice->addChild(
            'CusName',
            self::safe($order->mst_name ?: $order->fullname)
        );

        $invoice->addChild(
            'CusAddress',
            self::safe($order->mst_address ?: 'Việt Nam')
        );

        if (!empty($order->mst)) {
            $invoice->addChild(
                'CusTaxCode',
                self::safe($order->mst)
            );
        }

        if (!empty($order->phone)) {
            $invoice->addChild(
                'CusPhone',
                self::safe($order->phone)
            );
        }

        $invoice->addChild('PaymentMethod', 'CK');

        // sản phẩm
        $products = $invoice->addChild('Products');

        $product = $products->addChild('Product');

        $product->addChild(
            'ProdName',
            self::safe($order->course->title)
        );

        $product->addChild('ProdUnit', 'Khóa học');

        $product->addChild('ProdQuantity', 1);

        $product->addChild('ProdPrice', (int)$order->price);

        $total = (int)$order->price;

        $vatRate = 10;

        $vat = round($total * ($vatRate / 100));

        $amount = $total + $vat;

        $product->addChild('Total', $total);

        $product->addChild('VATRate', $vatRate);

        $product->addChild('VATAmount', $vat);

        $product->addChild('Amount', $amount);

        // tổng hóa đơn
        $invoice->addChild('Total', $total);

        $invoice->addChild('VATRate', $vatRate);

        $invoice->addChild('VATAmount', $vat);

        $invoice->addChild('Amount', $amount);

        $invoice->addChild(
            'AmountInWords',
            self::safe(
                NumberHelper::numberToWords($amount)
            )
        );

        return $xml->asXML();
    }

    private static function safe($value)
    {
        return htmlspecialchars(
            $value ?? '',
            ENT_XML1,
            'UTF-8'
        );
    }
}