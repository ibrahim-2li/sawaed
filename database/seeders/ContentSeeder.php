<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run()
    {
        // Settings
        $settings = [
            ['key' => 'hero_title', 'value' => 'الريادة في خدمات'],
            ['key' => 'hero_subtitle', 'value' => 'الإعاشة والخدمات اللوجستية'],
            ['key' => 'hero_description', 'value' => 'نقدم حلولاً متكاملة في التموين الغذائي، تنظيم الفعاليات، والخدمات اللوجستية بمعايير عالمية وجودة لا تضاهى.'],
            ['key' => 'about_title', 'value' => 'شريكك الاستراتيجي للنجاح والتميز'],
            ['key' => 'about_description_1', 'value' => 'قامت شركة سواعد الرياض بتنفيذ العديد من المشاريع داخل المملكة في مجموعة متنوعة من القطاعات، بما في ذلك قطاع الإعاشة، وسلاسل الإمداد الغذائي والتمويني، وقطاع الإنشاءات والتطوير العقاري.'],
            ['key' => 'about_description_2', 'value' => 'نتميز بفريق استشاري وإداري وتنفيذي ذو خبرة احترافية عالية في تخطيط وتنظيم وإدارة الفعاليات والمؤتمرات. نلتزم بأعلى معايير الجودة والسلامة المهنية لضمان نجاح مشاريع عملائنا.'],
            ['key' => 'contact_email', 'value' => 'info@sawaedalriyadh.com'],
            ['key' => 'contact_address', 'value' => 'الرياض، المملكة العربية السعودية'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // Services
        $services = [
            [
                'title' => 'الإعاشة والتموين',
                'description' => 'تشغيل الكفتريات في المصانع والمستشفيات والمدارس الحكومية والخاصة بأعلى معايير النظافة والجودة.',
                'color' => 'primary',
                'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>'
            ],
            [
                'title' => 'تنظيم الفعاليات',
                'description' => 'تخطيط وتنظيم وإدارة الفعاليات والاجتماعات والمؤتمرات وورش العمل والمناسبات الحكومية والخاصة.',
                'color' => 'secondary',
                'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>'
            ],
            [
                'title' => 'الخدمات اللوجستية',
                'description' => 'خدمات لوجستية متكاملة تشمل التخزين والنقل عبر أسطول ضخم يضم أكثر من 400 مركبة لضمان سرعة الوصول.',
                'color' => 'primary',
                'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>'
            ],
            [
                'title' => 'الصيانة والتشغيل',
                'description' => 'فريق صيانة متكامل ومتخصص لصيانة أدوات تنفيذ الأعمال المختلفة لضمان استمرارية العمل بكفاءة.',
                'color' => 'secondary',
                'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>'
            ],
            [
                'title' => 'الأسواق المركزية',
                'description' => 'إدارة وتشغيل الأسواق المركزية وتوفير كافة الاحتياجات الغذائية والاستهلاكية.',
                'color' => 'primary',
                'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>'
            ],
            [
                'title' => 'قطاع التبريد',
                'description' => 'حلول متطورة في قطاع التبريد لضمان سلامة وجودة المنتجات الغذائية والطبية.',
                'color' => 'secondary',
                'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>'
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Projects
        $projects = [
            [
                'title' => 'مشروع إعاشة موقوفي الجوازات',
                'description' => 'في جميع مناطق المملكة لمدة ستة أعوام متتالية، وتأمين ما يقارب 1,200,000 وجبة سنوياً.',
                'color' => 'primary'
            ],
            [
                'title' => 'رئاسة الاستخبارات العامة',
                'description' => 'مشروع تأمين الإعاشة المطهية لمنسوبي الرئاسة.',
                'color' => 'secondary'
            ],
            [
                'title' => 'قوات أمن المنشآت',
                'description' => 'مشروع تأمين الإعاشة لمنسوبي القوات.',
                'color' => 'primary'
            ],
            [
                'title' => 'الدفاع المدني',
                'description' => 'مشروع توريد وتأمين الإعاشة لمنسوبي الدفاع المدني.',
                'color' => 'secondary'
            ],
            [
                'title' => 'قوات الطوارئ',
                'description' => 'مشروع توريد وطهي وتقديم الإعاشة لقوات الطوارئ بالمملكة.',
                'color' => 'primary'
            ],
            [
                'title' => 'قوات الدفاع الجوي',
                'description' => 'مشروع توريد وإعاشة منسوبي قوات الدفاع الجوي.',
                'color' => 'secondary'
            ],
            [
                'title' => 'أمن الحج والعمرة',
                'description' => 'مشروع إعاشة القوات الخاصة لأمن الحج والعمرة.',
                'color' => 'primary'
            ],
            [
                'title' => 'المستشفيات الحكومية والخاصة',
                'description' => 'مشروع تغذية المستشفيات وفق أعلى المعايير الصحية.',
                'color' => 'secondary'
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
