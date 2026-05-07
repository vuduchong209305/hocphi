<?php

namespace App\Services;

use Http, Log;

class VNPTInvoiceService
{
    public function publish($xml)
    {
        try {
            $response = Http::asForm()->timeout(30)->post(env('VNPT_URL'), [
                'Account'   => env('VNPT_ACCOUNT'),
                'ACpass'    => env('VNPT_ACPASS'),
                'xmlInvData'=> $xml,
                'username'  => env('VNPT_USERNAME'),
                'password'  => env('VNPT_PASSWORD'),
                'pattern'   => env('VNPT_PATTERN'),
                'serial'    => env('VNPT_SERIAL'),
            ]);

            return $this->parse($response->body());

        } catch (\Exception $e) {
            Log::error('VNPT ERROR: ' . $e->getMessage());

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    private function parse($res)
    {
        Log::info('VNPT RESPONSE: ' . $res);

        if (str_starts_with($res, 'ERR')) {
            return [
                'success' => false,
                'message' => $res
            ];
        }

        if (str_starts_with($res, 'OK')) {
            return [
                'success' => true,
                'raw' => $res
            ];
        }

        return [
            'success' => false,
            'message' => 'Unknown response'
        ];
    }
}