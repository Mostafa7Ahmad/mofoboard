<?php

namespace App\Helpers;


use Illuminate\Support\Facades\Http;
class AiHelper
{
    public static function make($message)
    {
        $message = "جاوب فقط بالعربية الفصحى:\n" . $message;
        try {
            $response = Http::timeout(60)
                ->connectTimeout(10)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post('https://apifreellm.com/api/chat', [
                    'message' => $message
                ]);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            return [
                'status' => 'error',
                'message' => 'فشل الاتصال: ' . $e->getMessage(),
            ];
        }

        $json = $response->json();

        if ($json['status'] === 'success') {
            return response()->json([
                'status' => 'success',
                'response' => $json['response'],
            ]);
        }

        if ($json['status'] === 'rate_limited') {
            return response()->json([
                'status' => 'rate_limited',
                'response' => $json['response'] ?? '',
                'error' => $json['error'] ?? 'تم تجاوز الحد المسموح به',
                'retry_after' => $json['retry_after'] ?? 5,
            ], 429);
        }

        $cleanResponse = preg_replace('/[^\p{Arabic}\p{L}\p{N}\s\.\,\-\_\!\?]/u', '', $json['response']);

        return response()->json([
            'status' => $json['status'] ?? 'error',
            'response' => $cleanResponse ?? '',
            'error' => $json['error'] ?? 'خطأ غير معروف',
        ], 400);
    }
}