# 🚀 مزايا لوحة التحكم

* ⚡ **تهيئة ذكية للسيو** مع مولد تلقائي لملفات **Robots** و **SiteMap**
* 🔔 **إشعارات متقدمة** (صور، لحظية، لطيفة) مع دعم **السحب والإفلات**
* 🖼️ **عرض صور احترافي** + مكتبة أيقونات مدفوعة مجانًا + أجمل الخطوط العربية
* 📱 **متجاوبة بالكامل** مع جميع الأجهزة وقابلة للتحويل لتطبيق موبايل
* 📄 **صفحات جاهزة** (الأساسية، 404 مخصصة، صفحات مرنة، قوالب مُعدة مسبقًا)
* 🧭 **نظام قوائم ديناميكي** (إنشاء – ترتيب – تحديد أماكن)
* 📝 **مدونة متطورة** (أقسام، مقالات، محرر حديث مع رفع صور) + إنشاء محتوى غير محدود بالذكاء الاصطناعي
* 💰 **نظام إعلانات** + **تحويل روابط** + **تتبع شامل** + حماية عبر حدود الزيارات
* 🛡️ **راصد أخطاء ذكي** + إشعارات فورية + نظام متابعة مباشر
* 👤 **إدارة مستخدمين متقدمة** (صور شخصية، أذونات وصلاحيات، إعدادات شاملة)
* 📊 **إحصائيات قوية ولوحة تحكم شاملة** + نظام تذاكر للتواصل مع العملاء
* ☁️ تكامل مع **Cloudflare** + دعم **الإضافات (Plugins)** للتوسعة
* 🖥️ مبنية بأحدث إصدارات **Laravel & Bootstrap** + تصميم متجاوب وأنيق

---

## 📸 Screenshots

<!-- ضع هنا صور من الواجهة الأمامية والخلفية لإبراز قوة التصميم -->

---

## ⚙️ كيفية الإعداد

```bash
# تثبيت المتطلبات
sudo apt-get install php-imagick
composer install

# إنشاء ملف البيئة
cp .env.example .env

# توليد مفتاح الأمان + ربط ملفات التخزين
php artisan key:generate
php artisan storage:link

# إعداد قاعدة البيانات
php artisan migrate:fresh
php artisan db:seed

# تشغيل الطوابير والجدولة في الخلفية
php artisan queue:work && php artisan schedule:run
```

---

## 🔑 بيانات تسجيل الدخول الافتراضية

```
رابط الدخول : http://127.0.0.1:8000/login
البريد : admin@admin.com
كلمة المرور : password
```

---

## 🎯 مناطق الـ Yields الأساسية

```blade
@yield('styles')
@yield('content')
@yield('after-body')
@yield('scripts')
```

---

## 🔔 نظام الإشعارات

### إشعارات في الاستجابة (Backend)

```php
notify()->info('المحتوى','العنوان');
notify()->success('تمت العملية بنجاح','العنوان');
notify()->error('حدث خطأ غير متوقع','العنوان');
```

### إشعارات في الواجهة (Frontend - Toastr)

```javascript
toastr.warning('هذه رسالة تحذير');

toastr.success('تمت العملية بنجاح', 'نجاح');

toastr.error('حدث خطأ ما', 'خطأ');

toastr.remove();

toastr.clear();

toastr.success('تمت العملية بنجاح', 'نجاح', {timeOut: 5000});
```

---

## 📬 إشعارات المستخدمين (Dashboard & Email)

```php
(new \MainHelper)->notify_user([
      'user_id' => 2,
      'message' => 'محتوى الإشعار',
      'url' => 'http://example.com',
      'methods' => ['database','mail']
]);
```

---

## 📝 محرر النصوص مع / بدون مستكشف الملفات

```html
<textarea name="description" required minlength="3" maxlength="10000" class="form-control editor with-file-explorer"></textarea>
<textarea name="description" required minlength="3" maxlength="10000" class="form-control editor"></textarea>
```

---

## 🖼️ Fancybox للصور

```html
<img src="" data-fancybox />

<div class="fancybox">
  <img src="" />
</div>
```