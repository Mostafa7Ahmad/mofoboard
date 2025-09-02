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

        if (!is_array($json)) {
            return [
                'status' => 'error',
                'message' => 'استجابة غير صالحة من الخادم',
            ];
        }

        if ($json['status'] === 'success') {
            return [
                'status' => 'success',
                'response' => self::cleanText($json['response'] ?? ''),
            ];
        }

        if ($json['status'] === 'rate_limited') {
            return [
                'status' => 'rate_limited',
                'response' => self::cleanText($json['response'] ?? ''),
                'error' => $json['error'] ?? 'تم تجاوز الحد المسموح به',
                'retry_after' => $json['retry_after'] ?? 5,
            ];
        }

        return [
            'status' => $json['status'] ?? 'error',
            'response' => self::cleanText($json['response'] ?? ''),
            'error' => $json['error'] ?? 'خطأ غير معروف',
        ];
    }

    /**
     * تنظيف الاستجابة من أي رموز أو نصوص غريبة
     */
    private static function cleanText(string $text): string
    {
        // يسمح فقط بالعربية + اللاتينية + أرقام + مسافات + بعض الرموز البسيطة
        $clean = preg_replace('/[^\p{Arabic}a-zA-Z0-9\s\.\,\-\_\!\?\(\)]/u', '', $text);

        // إزالة أي مسافات مكررة
        $clean = preg_replace('/\s+/', ' ', $clean);

        return trim($clean);
    }
}
