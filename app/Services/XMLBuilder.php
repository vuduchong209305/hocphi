<?php

namespace App\Services;

use App\Helpers\NumberHelper;

class XMLBuilder
{
    public static function build($order)
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><Invoices/>');

	    $inv = $xml->addChild('Inv');
	    $inv->addChild('key', $order->id);

	    $invoice = $inv->addChild('Invoice');

	    $invoice->addChild('CusCode', self::safe($order->mst));
	    $invoice->addChild('CusName', self::safe($order->mst_name));
	    $invoice->addChild('CusAddress', self::safe($order->mst_address));
	    $invoice->addChild('PaymentMethod', 'CK');

	    $products = $invoice->addChild('Products');

	    $product = $products->addChild('Product');

	    $product->addChild('ProdName', self::safe($order->course->title));
	    $product->addChild('ProdUnit', 'Khóa học');
	    $product->addChild('ProdQuantity', 1);
	    $product->addChild('ProdPrice', $order->price);

	    $total = $order->price;
	    $vat = round($total * 0.1);

	    $product->addChild('Total', $total);
	    $product->addChild('VATRate', 10);
	    $product->addChild('VATAmount', $vat);
	    $product->addChild('Amount', $total + $vat);

	    // tổng hóa đơn
	    $invoice->addChild('Total', $total);
	    $invoice->addChild('VATRate', 10);
	    $invoice->addChild('VATAmount', $vat);
	    $invoice->addChild('Amount', $total + $vat);

	    $invoice->addChild('AmountInWords', self::safe(NumberHelper::numberToWords($total + $vat)));

	    return $xml->asXML();
    }

    private static function safe($value)
    {
        return htmlspecialchars($value ?? '', ENT_XML1, 'UTF-8');
    }
}