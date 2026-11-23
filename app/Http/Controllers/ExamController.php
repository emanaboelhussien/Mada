<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    /**
     * بنية الأسئلة (20 سؤالاً لكل فئة: تطوير ويب وذكاء اصطناعي)
     */
    public static function getQuestionsBank(): array
    {
        $webQuestions = [
            ['id' => 1, 'q' => 'ما هو الوسم المسؤول عن إنشاء فقرة نصية في HTML؟', 'options' => ['a' => '<p>', 'b' => '<h1>', 'c' => '<div>', 'd' => '<span>'], 'answer' => 'a'],
            ['id' => 2, 'q' => 'أي خاصية CSS تُستخدم لتغيير لون النص؟', 'options' => ['a' => 'background-color', 'b' => 'color', 'c' => 'font-size', 'd' => 'border'], 'answer' => 'b'],
            ['id' => 3, 'q' => 'أي خاصية في Flexbox تجعل العناصر تتوزع أفقياً؟', 'options' => ['a' => 'flex-direction: column', 'b' => 'display: flex', 'c' => 'float: left', 'd' => 'text-align: center'], 'answer' => 'b'],
            ['id' => 4, 'q' => 'ما هي وحدة القياس النسبية المعتمدة على حجم خط الجذر في CSS؟', 'options' => ['a' => 'px', 'b' => 'rem', 'c' => 'cm', 'd' => 'pt'], 'answer' => 'b'],
            ['id' => 5, 'q' => 'أي سمة في HTML تُستخدم لتحديد اتجاه الصفحة من اليمين لليسار؟', 'options' => ['a' => 'lang="ar"', 'b' => 'dir="rtl"', 'c' => 'align="right"', 'd' => 'mode="rtl"'], 'answer' => 'b'],
            ['id' => 6, 'q' => 'في JavaScript، أي كلمة مفتاحية تُعرّف متغيراً قابلاً لإعادة التعيين؟', 'options' => ['a' => 'const', 'b' => 'let', 'c' => 'static', 'd' => 'define'], 'answer' => 'b'],
            ['id' => 7, 'q' => 'ما وظيفة دالة querySelector في DOM؟', 'options' => ['a' => 'حذف عنصر من الصفحة', 'b' => 'اختيار أول عنصر يطابق المحدد CSS', 'c' => 'إرسال طلب HTTP', 'd' => 'إضافة خط خارجي'], 'answer' => 'b'],
            ['id' => 8, 'q' => 'أي نوع طلب HTTP يُستخدم عادةً لإرسال بيانات نموذج جديد؟', 'options' => ['a' => 'GET', 'b' => 'POST', 'c' => 'HEAD', 'd' => 'OPTIONS'], 'answer' => 'b'],
            ['id' => 9, 'q' => 'ما معنى اختصار REST في واجهات البرمجة؟', 'options' => ['a' => 'Representational State Transfer', 'b' => 'Remote Execution System Tool', 'c' => 'Relational Event Storage Type', 'd' => 'Rapid Engineering Syntax Tree'], 'answer' => 'a'],
            ['id' => 10, 'q' => 'في Laravel، أين تُعرّف مسارات الويب الأساسية؟', 'options' => ['a' => 'routes/web.php', 'b' => 'config/app.php', 'c' => 'resources/js/app.js', 'd' => 'public/index.php'], 'answer' => 'a'],
            ['id' => 11, 'q' => 'ما وظيفة Blade في Laravel؟', 'options' => ['a' => 'إدارة قواعد البيانات فقط', 'b' => 'محرك قوالب لكتابة واجهات HTML ديناميكية', 'c' => 'ضغط الصور تلقائياً', 'd' => 'إعداد الخادم'], 'answer' => 'b'],
            ['id' => 12, 'q' => 'أي توجيه في Blade يُستخدم لطباعة متغير مع حماية من XSS؟', 'options' => ['a' => '{!! $var !!}', 'b' => '{{ $var }}', 'c' => '@php($var)', 'd' => '[[ $var ]]'], 'answer' => 'b'],
            ['id' => 13, 'q' => 'ما فائدة الـ Middleware في Laravel؟', 'options' => ['a' => 'تنسيق ملفات CSS', 'b' => 'فحص وتصفية الطلبات مثل التحقق من تسجيل الدخول', 'c' => 'إنشاء ملفات Migration', 'd' => 'تصدير ملفات Excel'], 'answer' => 'b'],
            ['id' => 14, 'q' => 'في قواعد البيانات العلائقية، ما هو المفتاح الأساسي Primary Key؟', 'options' => ['a' => 'عمود يميّز كل سجل بشكل فريد ولا يتكرر', 'b' => 'عمود لحفظ الصور فقط', 'c' => 'فهرس لحذف الجداول', 'd' => 'نوع بيانات نصي طويل'], 'answer' => 'a'],
            ['id' => 15, 'q' => 'ما أمر SQL المستخدم لاسترجاع البيانات من جدول؟', 'options' => ['a' => 'INSERT', 'b' => 'UPDATE', 'c' => 'SELECT', 'd' => 'DELETE'], 'answer' => 'c'],
            ['id' => 16, 'q' => 'في Git، ما الأمر الذي ينشئ فرعاً جديداً أو ينتقل إليه؟', 'options' => ['a' => 'git clone', 'b' => 'git checkout -b', 'c' => 'git status', 'd' => 'git pull'], 'answer' => 'b'],
            ['id' => 17, 'q' => 'ما فائدة CSRF Token في نماذج الويب؟', 'options' => ['a' => 'تسريع تحميل الخطوط', 'b' => 'حماية النماذج من هجمات تزوير الطلبات عبر المواقع', 'c' => 'تغيير لغة المتصفح', 'd' => 'تحويل الصور إلى WebP'], 'answer' => 'b'],
            ['id' => 18, 'q' => 'ما هي خاصية CSS Grid التي تحدد الأعمدة؟', 'options' => ['a' => 'grid-template-columns', 'b' => 'justify-content', 'c' => 'z-index', 'd' => 'box-sizing'], 'answer' => 'a'],
            ['id' => 19, 'q' => 'في JavaScript، ماذا يُستخدم للتعامل مع العمليات غير المتزامنة مثل Fetch؟', 'options' => ['a' => 'Promises / async-await', 'b' => 'switch-case', 'c' => 'alert()', 'd' => 'innerHTML'], 'answer' => 'a'],
            ['id' => 20, 'q' => 'ما الهدف الرئيسي من Responsive Design؟', 'options' => ['a' => 'إخفاء المحتوى في الجوال', 'b' => 'تكيّف الواجهة مع مختلف أحجام الشاشات والأجهزة', 'c' => 'تعطيل الجافاسكربت', 'd' => 'زيادة حجم الخط فقط'], 'answer' => 'b'],
        ];

        $aiQuestions = [
            ['id' => 1, 'q' => 'ما هو الذكاء الاصطناعي (Artificial Intelligence) بشكل عام؟', 'options' => ['a' => 'بناء أنظمة قادرة على محاكاة مهام تتطلب ذكاءً بشرياً', 'b' => 'تصميم صفحات HTML فقط', 'c' => 'تخزين الملفات السحابية', 'd' => 'إدارة كابلات الشبكة'], 'answer' => 'a'],
            ['id' => 2, 'q' => 'ما الفرق الأساسي بين التعلم الآلي (ML) والبرمجة التقليدية؟', 'options' => ['a' => 'ML يتعلم الأنماط من البيانات بدلاً من كتابة كل قاعدة يدوياً', 'b' => 'ML لا يحتاج إلى بيانات', 'c' => 'البرمجة التقليدية تستخدم الشبكات العصبية دائماً', 'd' => 'لا يوجد أي فرق'], 'answer' => 'a'],
            ['id' => 3, 'q' => 'أي مما يلي يُعد مثالاً على التعلم الموجّه (Supervised Learning)؟', 'options' => ['a' => 'تصنيف رسائل البريد إلى مزعجة أو غير مزعجة ببيانات موسومة', 'b' => 'تجميع عملاء دون تصنيفات مسبقة', 'c' => 'تعلم روبوت عبر المكافآت والعقوبات فقط', 'd' => 'ضغط ملف ZIP'], 'answer' => 'a'],
            ['id' => 4, 'q' => 'ما معنى التجميع (Clustering) في التعلم غير الموجّه؟', 'options' => ['a' => 'تقسيم البيانات إلى مجموعات متشابهة بناءً على خصائصها', 'b' => 'التنبؤ بقيمة رقمية مستمرة', 'c' => 'حذف القيم المفقودة', 'd' => 'تدريب نموذج على صور فقط'], 'answer' => 'a'],
            ['id' => 5, 'q' => 'ما هو الانحدار (Regression)؟', 'options' => ['a' => 'التنبؤ بقيمة رقمية مستمرة مثل سعر منزل', 'b' => 'قص الصور', 'c' => 'ترجمة النصوص', 'd' => 'تشفير كلمات المرور'], 'answer' => 'a'],
            ['id' => 6, 'q' => 'ما هي مشكلة فرط التكيّف (Overfitting)؟', 'options' => ['a' => 'حفظ النموذج لبيانات التدريب بدقة عالية وضعف تعميمه على بيانات جديدة', 'b' => 'نقص مساحة القرص الصلب', 'c' => 'بطء الإنترنت', 'd' => 'قلة عدد الأسطر البرمجية'], 'answer' => 'a'],
            ['id' => 7, 'q' => 'لماذا نقسّم البيانات عادةً إلى مجموعة تدريب (Train) واختبار (Test)؟', 'options' => ['a' => 'لتقييم أداء النموذج على بيانات لم يرها أثناء التدريب', 'b' => 'لتقليل حجم ملف Python', 'c' => 'لتغيير لون الرسوم البيانية', 'd' => 'لحذف البيانات المتكررة'], 'answer' => 'a'],
            ['id' => 8, 'q' => 'أي مكتبة في Python تُستخدم بكثرة للتعامل مع المصفوفات والعمليات العددية؟', 'options' => ['a' => 'NumPy', 'b' => 'Bootstrap', 'c' => 'Laravel', 'd' => 'JQuery'], 'answer' => 'a'],
            ['id' => 9, 'q' => 'أي مكتبة في Python تُستخدم لتحليل البيانات والجداول (DataFrames)؟', 'options' => ['a' => 'Pandas', 'b' => 'Three.js', 'c' => 'Sass', 'd' => 'Nginx'], 'answer' => 'a'],
            ['id' => 10, 'q' => 'ما وظيفة دالة التفعيل (Activation Function) في الشبكات العصبية؟', 'options' => ['a' => 'إضافة غير خطية تساعد الشبكة على تعلم علاقات معقدة', 'b' => 'حفظ الملف على GitHub', 'c' => 'تنظيف الذاكرة', 'd' => 'تغيير اسم العمود'], 'answer' => 'a'],
            ['id' => 11, 'q' => 'أي نوع من الشبكات العصبية يُستخدم غالباً في معالجة الصور؟', 'options' => ['a' => 'CNN (Convolutional Neural Networks)', 'b' => 'SQL Tables', 'c' => 'DNS Servers', 'd' => 'Cron Jobs'], 'answer' => 'a'],
            ['id' => 12, 'q' => 'ما هو مقياس الدقة (Accuracy)؟', 'options' => ['a' => 'نسبة التنبؤات الصحيحة من إجمالي التنبؤات', 'b' => 'عدد طبقات النموذج', 'c' => 'حجم مجموعة التدريب بالغيغابايت', 'd' => 'سرعة المعالج'], 'answer' => 'a'],
            ['id' => 13, 'q' => 'متى يكون مقياس F1-Score أو Precision/Recall أهم من Accuracy؟', 'options' => ['a' => 'عندما تكون الفئات غير متوازنة (Imbalanced Data)', 'b' => 'عندما لا يوجد بيانات', 'c' => 'عند رسم مخطط دائري فقط', 'd' => 'عند تثبيت Python'], 'answer' => 'a'],
            ['id' => 14, 'q' => 'ما هو التطبيع (Normalization / Scaling) للبيانات؟', 'options' => ['a' => 'تحويل القيم العددية إلى مقياس متقارب لتحسين التدريب', 'b' => 'ترجمة النصوص إلى الإنجليزية', 'c' => 'حذف الأعمدة النصية', 'd' => 'تشغيل الخادم'], 'answer' => 'a'],
            ['id' => 15, 'q' => 'ما المقصود بـ NLP (Natural Language Processing)؟', 'options' => ['a' => 'معالجة اللغات الطبيعية وفهم وتوليد النصوص', 'b' => 'بروتوكول شبكة محلية', 'c' => 'لغة برمجة قواعد بيانات', 'd' => 'أداة تصميم واجهات'], 'answer' => 'a'],
            ['id' => 16, 'q' => 'ما هي معمارية Transformer؟', 'options' => ['a' => 'معمارية تعتمد على آلية الانتباه (Attention) وتُستخدم في النماذج اللغوية الحديثة', 'b' => 'أداة لتحويل ملفات MP4', 'c' => 'قاعدة بيانات محلية', 'd' => 'إضافة متصفح'], 'answer' => 'a'],
            ['id' => 17, 'q' => 'ما هو التعلم بالتحزيز (Reinforcement Learning)؟', 'options' => ['a' => 'تعلم وكيل (Agent) اتخاذ قرارات عبر التفاعل مع بيئة وتلقي مكافآت', 'b' => 'تنظيم ملفات CSS', 'c' => 'إنشاء جداول HTML', 'd' => 'نسخ احتياطي لقاعدة البيانات'], 'answer' => 'a'],
            ['id' => 18, 'q' => 'ما فائدة نقل التعلّم (Transfer Learning)؟', 'options' => ['a' => 'الاستفادة من نموذج مدرّب مسبقاً وتكييفه لمهمة جديدة ببيانات أقل', 'b' => 'نقل المشروع إلى مجلد آخر', 'c' => 'تغيير لغة لوحة المفاتيح', 'd' => 'حذف أوزان النموذج'], 'answer' => 'a'],
            ['id' => 19, 'q' => 'ما هو الـ Prompt في النماذج التوليدية؟', 'options' => ['a' => 'النص أو التعليمات المدخلة للنموذج لتوجيه إجابته', 'b' => 'اسم جدول في MySQL', 'c' => 'خطأ في بناء الجملة', 'd' => 'ملف إعدادات الخادم'], 'answer' => 'a'],
            ['id' => 20, 'q' => 'ما أهمية أخلاقيات الذكاء الاصطناعي والتحيّز (Bias) في البيانات؟', 'options' => ['a' => 'تجنب النتائج الظالمة أو المتحيزة وضمان عدالة وموثوقية النظام', 'b' => 'زيادة استهلاك البطارية', 'c' => 'إلغاء مرحلة الاختبار', 'd' => 'تقليل وضوح الصور'], 'answer' => 'a'],
        ];

        return [
            'web' => [
                'title' => 'تطوير الويب',
                'questions' => $webQuestions,
            ],
            'ai' => [
                'title' => 'الذكاء الاصطناعي',
                'questions' => $aiQuestions,
            ],
        ];
    }

    public function show(Request $request)
{
    $bank = self::getQuestionsBank();
    $selectedTrack = $request->query('track');

    if ($selectedTrack && !array_key_exists($selectedTrack, $bank)) {
        $selectedTrack = null;
    }

    return view('student-exam', [
        'bank' => $bank,
        'selectedTrack' => $selectedTrack,
        'user' => Auth::user(),
    ]);
}
    public function submit(Request $request)
    {
        $request->validate([
            'track' => 'required|in:web,ai',
            'answers' => 'required|array',
        ]);

        $bank = self::getQuestionsBank();
        $track = $request->input('track');
        $questions = $bank[$track]['questions'];
        $submittedAnswers = $request->input('answers', []);

        $score = 0;
        foreach ($questions as $question) {
            $qId = (string) $question['id'];
            if (isset($submittedAnswers[$qId]) && $submittedAnswers[$qId] === $question['answer']) {
                $score++;
            }
        }

        // تحديد المستوى بناءً على الدرجة من 20
        if ($score >= 15) {
            $level = 'متقدم';
        } elseif ($score >= 9) {
            $level = 'متوسط';
        } else {
            $level = 'مبتدئ';
        }

        $user = Auth::user();
        $user->update([
            'exam_completed' => true,
            'exam_track' => $track,
            'exam_score' => $score,
            'exam_level' => $level,
            'exam_completed_at' => now(),
        ]);

        return redirect()->route('student.dashboard')
            ->with('success', "تم إنهاء اختبار تحديد المستوى في {$bank[$track]['title']}! درجتك: {$score} من 20 — المستوى: {$level}.");
    }
}