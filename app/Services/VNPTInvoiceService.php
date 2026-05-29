<?php

namespace App\Services;

use Http, Log;

class VNPTInvoiceService
{
    public function publish($invoiceXml)
    {
        $soap = $this->buildSoapXML($invoiceXml);

        Log::info($soap);

        $response = Http::withHeaders([
            'Content-Type' => 'text/xml; charset=utf-8',
            'SOAPAction' => 'http://tempuri.org/ImportInvByPatternMTT',
        ])
        ->withBody($soap, 'text/xml')
        ->timeout(60)
        ->post(
            'https://0107529558-tt78cadmin.vnpt-invoice.com.vn/publishservice.asmx'
        );

        Log::info($response->body());

        return $response->body();
    }

    private function buildSoapXML($invoiceXml)
    {
        return '
            <?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope 
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                xmlns:xsd="http://www.w3.org/2001/XMLSchema"
                xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">

                <soap:Body>

                    <ImportInvByPatternMTT xmlns="http://tempuri.org/">

                        <Account>' . env('VNPT_ACCOUNT') . '</Account>

                        <ACpass>' . env('VNPT_ACPASS') . '</ACpass>

                        <xmlInvData><![CDATA[' . $invoiceXml . ']]></xmlInvData>

                        <username>' . env('VNPT_USERNAME') . '</username>

                        <password>' . env('VNPT_PASSWORD') . '</password>

                        <pattern>' . env('VNPT_PATTERN') . '</pattern>

                        <serial>' . env('VNPT_SERIAL') . '</serial>

                        <convert>0</convert>

                    </ImportInvByPatternMTT>

                </soap:Body>

            </soap:Envelope>';
    }

    public function parseSOAPResponse($soapXml)
    {
        try {

            $xml = simplexml_load_string($soapXml);

            $json = json_encode($xml);

            $array = json_decode($json, true);

            Log::info($array);

            // tìm result
            $body =
                $array['soap:Body']
                ?? $array['SOAP-ENV:Body']
                ?? null;

            if (!$body) {
                throw new \Exception('Không đọc được SOAP Body');
            }

            // response node
            $response =
                current($body);

            $result =
                current($response);

            // ví dụ:
            // OK:1/002;C26MYT-ORDER_1_0000001

            if (str_contains($result, 'ERR')) {

                return [
                    'success' => false,
                    'message' => $result
                ];
            }

            // parse OK
            $result = str_replace('OK:', '', $result);

            [$patternSerial, $invoiceData] =
                explode('-', $result);

            [$pattern, $serial] =
                explode(';', $patternSerial);

            $invoiceParts =
                explode('_', $invoiceData);

            $invoiceNumber =
                end($invoiceParts);

            return [
                'success' => true,
                'raw' => $result,
                'pattern' => $pattern,
                'serial' => $serial,
                'invoice_number' => $invoiceNumber,
            ];

        } catch (\Exception $e) {

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}