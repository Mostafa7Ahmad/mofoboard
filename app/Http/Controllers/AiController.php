<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helpers\AiHelper;
use Illuminate\Http\Request;

class AiController extends Controller
{
    protected $prompts = [
        'title' => "اقترح عنوان جذاب لمقال عن: :content. 
                أجب فقط بالعنوان مباشرة بدون أي كلام إضافي.",

        'meta' => "لخص النص التالي في 150 حرف بالعربية الفصحى: :content. 
               أجب فقط بالنص الملخص بدون أي مقدمات أو شروح.",

        'tags' => "استخرج كلمات مفتاحية (وسوم) من النص التالي: :content. 
               أجب فقط بقائمة كلمات مفصولة بفواصل، بدون أي كلام آخر.",

        'seo' => "اقترح تحسينات SEO للنص التالي مع التركيز على الكلمات المفتاحية: :content. 
              أجب فقط بالتحسينات كنقاط واضحة بدون أي شروح إضافية.",

        'summary' => "قدّم ملخصاً واضحاً ومختصراً للنص التالي: :content. 
                  أجب فقط بالملخص مباشرة بدون أي إضافات.",

        'slug' => "اقترح رابط (slug) قصير مناسب للنص التالي: :content. 
               أجب فقط بالـ slug بصيغة صغيرة (lowercase) مفصولة بشرطات - 
               بدون أي كلام آخر.",

        'intro' => "اكتب مقدمة قصيرة وجذابة للمقال التالي: :content. 
                أجب فقط بالمقدمة بدون أي إضافات أخرى.",

        'description' => "اكتب وصفاً تفصيلياً ومناسباً للمقال التالي: :content. 
                      أجب فقط بالوصف المطلوب بدون أي شروح أو مقدمات.",
    ];

    public function generate(Request $request)
    {
        $type = $request->input('type');
        $content = trim($request->input('content', ''));

        if (!$type || !$content) {
            return response()->json([
                'status' => 'error',
                'message' => 'يجب تحديد النوع والمحتوى'
            ], 422);
        }

        if (!isset($this->prompts[$type])) {
            return response()->json([
                'status' => 'error',
                'message' => 'نوع الطلب غير مدعوم'
            ], 400);
        }

        $prompt = str_replace(':content', $content, $this->prompts[$type]);

        $result = AiHelper::make($prompt);

        if (isset($result['status']) && $result['status'] === 'success') {
            return response()->json([
                'status' => 'success',
                'type' => $type,
                'original_content' => $content,
                'response' => $result['response'] ?? ''
            ]);
        }

        return response()->json([
            'status' => $result['status'] ?? 'error',
            'message' => $result['message'] ?? 'فشل في معالجة الطلب',
            'details' => $result,
        ], 500);
    }
}
