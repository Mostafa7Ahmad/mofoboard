# مزايا لوحة التحكم


⚡ تهيئة ذكية للسيو مع مولد تلقائي لملفات Robots وSiteMap.
🔔 إشعارات متقدمة (صور، لحظية، لطيفة) مع دعم السحب والإفلات.
🖼️ عرض صور باحترافية + مكتبة أيقونات مدفوعة مجانًا + أجمل الخطوط العربية.
📱 توافق كامل مع الهواتف وقابلية التحويل لتطبيق موبايل.
📄 جميع الصفحات الأساسية + صفحات 404 مخصصة + صفحات مرنة + قوالب جاهزة.
🧭 نظام قوائم متكامل (إنشاء – ترتيب – تحديد أماكن).
📝 مدونة متطورة (أقسام، مقالات، محرر حديث مع رفع صور) + إنشاء محتوى غير محدود بالذكاء الاصطناعي.
💰 نظام إعلانات + تحويل روابط + تتبع شامل + حماية بحدود الزيارات.
🛡️ راصد أخطاء ذكي + إشعارات فورية + نظام متابعة مباشر.
👤 نظام مستخدمين متكامل مع صور شخصية + صلاحيات متقدمة + إعدادات شاملة.
📊 إحصائيات ولوحة تحكم قوية + نظام تذاكر للتواصل مع العملاء.
☁️ جاهزة للدمج مع Cloudflare + دعم الإضافات (Plugins) للتوسعة.
🖥️ مبنية على أحدث إصدارات Laravel & Bootstrap + تصميم متجاوب بالكامل.


### Screenshots


<!-- ![screenshots/17.jpg](https://raw.githubusercontent.com/peter-tharwat/dashboard/master/public/images/screenshots/17.jpg) -->

### How to setup

```bash
#dont forget to install 
sudo apt-get install php-imagick
composer install
# copy .env.example to .env
cp .env.example .env
# generate security key , link storage file
php artisan key:generate
php artisan storage:link
# after connect your database via .env file
php artisan migrate:fresh
php artisan db:seed

# dont forget to start queuing and run schedule on the background 
php artisan queue:work && php artisan schedule:run 
```

### Credentials

```
login page : <http://127.0.0.1:8000/login>
email : admin@admin.com
password : password

```

### Main Yield Sections

```jsx
@yield('styles')
@yield('content')
@yield('after-body')
@yield('scripts')
```

### Notifications On Response

```jsx
// docs : https://github.com/mckenziearts/laravel-notify

notify()->info('content','title');

notify()->success('content','title');

notify()->error('content','title');
```

### Notifications On Frontend

```jsx
// docs : https://github.com/CodeSeven/toastr
*****
You have To put alert in scripts section
// @yield('scripts')
*****
// Display a warning toast, with no title
toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!')

// Display a success toast, with a title
toastr.success('Have fun storming the castle!', 'Miracle Max Says')

// Display an error toast, with a title
toastr.error('I do not think that word means what you think it means.', 'Inconceivable!')

// Immediately remove current toasts without using animation
toastr.remove()

// Remove current toasts using animation
toastr.clear()

// Override global options
toastr.success('We do have the Kapua suite available.', 'Turtle Bay Resort', {timeOut: 5000})
```

### Notification to [ 'dashboard' , 'email' ]

```jsx
(new \MainHelper)->notify_user([
      'user_id'=>2,
      'message'=>"محتوى الإشعار" ,
      'url'=>"http://example.com",
			'methods'=>['database','mail']
]);
```

### Editor with and without file-explorer

```jsx
<textarea type="text" name="description" required minlength="3" maxlength="10000" class="form-control editor with-file-explorer" ></textarea>
<textarea type="text" name="description" required minlength="3" maxlength="10000" class="form-control editor"  ></textarea>
```

### Fancybox

```jsx
/* Just Add this Tag To image */
<img src="" data-fancybox />

/* Every image inside this class "data-fancybox" will be converted to fancy */
<div class="fancybox">
		<img src="" />
</div>
```