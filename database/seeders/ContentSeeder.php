<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Client;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run()
    {
        // Settings
        $settings = [
            ['key' => 'hero_title', 'value' => 'الريادة في خدمات'],
            ['key' => 'hero_subtitle', 'value' => 'الإعاشة والتغذية الصحية والتموين'],
            ['key' => 'hero_description', 'value' => 'نقدم حلولاً متكاملة في التموين الغذائي، تنظيم الفعاليات، والخدمات اللوجستية بمعايير عالمية وجودة لا تضاهى.'],
            ['key' => 'about_title', 'value' => 'شريكك الاستراتيجي للنجاح والتميز'],
            ['key' => 'about_description_1', 'value' => 'كانت انطلاقة سواعد الرياض في عام 1992م وقد وضعت الشركة على يد مؤسسها الشيخ احمد بن صالح بن عبد الرحمن بانافع رئيس مجلس الادارة هدفاً لتكون من الشركات الرائدة في تقديم وتأمين الأعاشة والتغذية الصحية والتموين الغذائي والأسواق المركزية والخدمات اللوجستية المساندة والتبريد والتجميد وخدمات قطاع الانشاءات والبناء والتطوير العقاري والخدمات التقنية و تجهيز وتنظيم الحفلات والمؤتمرات لجميع القطاعات الحكومية والعسكرية والصحية والخاصة عبر رؤية خاصة وابتكارات وفنون تميزت بها الشركة و التوريد للعديد من الجهات متمسكة بمبادئها التي قامت عليها منذ يومها الأول فقدمت الشركة كل الامكانيات للوصول لأهدافها وتحقيق المصداقية والوفاء والالتزام بالشروط والمواصفات عبر توفير كوادر مؤهلة ومدربة في مجالات تخصصها لذا انشئت الشركة معهد خاص لتدريب جميع كوادرها بكل المجالات .'],
            ['key' => 'about_description_2', 'value' => 'مما جعلنا اليوم بفضل الله ننال الثقة لتنفيذ العديد من المشاريع عبر منظومة متكاملة من مختلف الإدارات لمراقبة سير المشاريع بالشروط والمواصفات المتفق عليها وضمان توفير خدمات مراقبة وبأعلى مستويات الجودة بما مكننا من الحصول على العديد من الشهادات المعتمدة محلياً وعالمياً لسلامة وجودة الغذاء منها شهادة (ISO9001) لإدارة سلامة الأغذية و ((HACCPلضمان سلامة الأغذية وشهادة سلامة الغذاء العالمية (BRC)'],
            ['key' => 'about_image', 'value' => '/images/about-image.jpg'],
            ['key' => 'contact_email', 'value' => 'info@sawaedalriyadh.com'],
            ['key' => 'contact_address', 'value' => 'الرياض, الملز , شارع الفرزدق'],
            ['key' => 'contact_phone', 'value' => '0112131221'],
            ['key' => 'contact_linkedin', 'value' => 'Sawaed-Alriyadh-ltd-co'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // Services
        $services = [
            [
                'title' => 'تشغيل المطابخ والمطاعم الحكومية',
                'description' => '',
                'image'=> '/images/services/1.jpg',
                'color' => 'primary',
                'icon' => '<svg viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--twemoji" preserveAspectRatio="xMidYMid meet" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#292F33" d="M13.037 34.816C.794 33.013 1 20.719 1 17h34c0 1.914.087 15.77-13.125 17.918c-2.042.332-6.458.249-8.838-.102z"></path><path fill="#66757F" d="M33.388 13.247c2.467-5.574-8.331-5.254-11.035-4.382A37.649 37.649 0 0 0 18 8.611c-9.389 0-17 3.228-17 8.444c0 1.009.291 1.979.818 2.891c-4.327 5.712 4.246 6.786 9.184 5.71c2.136.537 4.5.844 6.998.844c9.389 0 17-4.229 17-9.444c0-1.43-.589-2.704-1.612-3.809z"></path><ellipse fill="#FFCC4D" cx="18" cy="18" rx="15" ry="7"></ellipse><path fill="#77B255" d="M4 16c-.542-2.169 2-6 7-5c1-1 2.838-2 6-2c2 0 5.612 1.775 4 5c-1 2-5 5-10 3c-1 1-6 3-7-1z"></path><path fill="#5C913B" d="M12 17c-.249.036-.471.073-.678.111C16.17 18.857 20.022 15.956 21 14c1.078-2.156-.181-3.66-1.731-4.423c.394 1.822-1.128 6.546-7.269 7.423z"></path><path fill="#D99E82" d="M5 16c.525-1.313 5-3 10 3c1 1 4.586 1.586 6 3c1 1 0 2-4 2S3 21 5 16z"></path><path fill="#B27962" d="M6.041 20.018C8.589 22.561 14.231 24 17 24c4 0 5-1 4-2c-.326-.326-.77-.607-1.268-.86c-3.204 1.733-11.68-.144-13.691-1.122z"></path><path fill="#FFE8B6" d="M27 19.001c-.209 0-.423-.034-.633-.104l-3-1a2 2 0 0 1 1.265-3.795l3 1A2 2 0 0 1 27 19.001zM26 22h-2a1 1 0 1 1 0-2h2a1 1 0 1 1 0 2z"></path></g></svg>'
            ],
            [
                'title' => 'تقديم خدمات الاعاشة المطهية',
                'description' => '',
                'image'=> '/images/services/2.jpg',
                'color' => 'secondary',
                'icon' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="flat"> <path d="M56,44H8V29.778A7.778,7.778,0,0,1,15.778,22h16a7.777,7.777,0,0,1,5.5,2.278l5.444,5.444A7.777,7.777,0,0,0,48.222,32h0A7.778,7.778,0,0,1,56,39.778Z" style="fill:#fd9a30"></path> <path d="M54,16a2,2,0,1,0-3.82.82L45,22l3,3,5.18-5.18A2,2,0,1,0,54,16Z" style="fill:#e3e3e1"></path> <path d="M48,25l-3-3-9.229,4.114a7,7,0,1,0,8.115,8.115Z" style="fill:#fdb62f"></path> <path d="M18,33V32a5,5,0,0,0-5-5h0V37a2,2,0,0,0,2,2h8a3,3,0,0,0,3-3h0a3,3,0,0,0-3-3Z" style="fill:#fdb62f"></path> <circle cx="9" cy="43" r="4" style="fill:#dd4a43"></circle> <circle cx="56" cy="43" r="4" style="fill:#7ea82d"></circle> <circle cx="50" cy="43" r="4" style="fill:#dd4a43"></circle> <path d="M3,44H61a0,0,0,0,1,0,0v0a6,6,0,0,1-6,6H9a6,6,0,0,1-6-6v0A0,0,0,0,1,3,44Z" style="fill:#e3e3e1"></path> <path d="M54,44a6,6,0,0,1-6,6h7a6,6,0,0,0,6-6Z" style="fill:#dbdbd9"></path> </g> </g></svg>'
            ],
            [
                'title' => 'خدمات الطعام في المرافق الرياضية',
                'description' => '',
                'image'=> '/images/services/3.jpg',
                'color' => 'primary',
                'icon' => '<svg viewBox="0 0 24 24" enable-background="new 0 0 24 24" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Food_Drink25"></g> <g id="Food_Drink24"></g> <g id="Food_Drink23"></g> <g id="Food_Drink22"></g> <g id="Food_Drink21"></g> <g id="Food_Drink20"></g> <g id="Food_Drink19"></g> <g id="Food_Drink18"></g> <g id="Food_Drink17"></g> <g id="Food_Drink16"></g> <g id="Food_Drink15"></g> <g id="Food_Drink14"></g> <g id="Food_Drink13"></g> <g id="Food_Drink12"></g> <g id="Food_Drink11"></g> <g id="Food_Drink10"></g> <g id="Food_Drink09"></g> <g id="Food_Drink08"> <g> <g> <path d="M7,12c-0.5522,0-1-0.4478-1-1V3c0-0.5522,0.4478-1,1-1s1,0.4478,1,1v8C8,11.5522,7.5522,12,7,12z" fill="#FFB132"></path> </g> </g> <g> <g> <path d="M10,12c-0.5522,0-1-0.4478-1-1V3c0-0.5522,0.4478-1,1-1s1,0.4478,1,1v8C11,11.5522,10.5522,12,10,12z" fill="#FFB132"></path> </g> </g> <g> <g> <path d="M21,4H5C4.4478,4,4,3.5522,4,3s0.4478-1,1-1h16c0.5527,0,1,0.4478,1,1S21.5527,4,21,4z" fill="#D5704C"></path> </g> </g> <g> <g> <path d="M19.02,11c0,0.55-0.45,1-1,1c-0.01,0-0.01,0-0.02,0h-6c-0.55,0-1-0.45-1-1c0-2.21,1.79-4,4-4 c2.13,0,3.87,1.67,3.99,3.77C19.01,10.84,19.02,10.92,19.02,11z" fill="#85C756"></path> </g> </g> <g> <g> <path d="M17,18v3c0,0.55-0.45,1-1,1H8c-0.55,0-1-0.45-1-1v-3c0-0.55,0.45-1,1-1h8C16.55,17,17,17.45,17,18z" fill="#1688C5"></path> </g> </g> <g> <g> <path d="M20,11v4c0,2.21-1.79,4-4,4H8c-2.21,0-4-1.79-4-4v-4c0-0.55,0.45-1,1-1h14C19.55,10,20,10.45,20,11z" fill="#3C6D9D"></path> </g> </g> </g> <g id="Food_Drink07"></g> <g id="Food_Drink06"></g> <g id="Food_Drink05"></g> <g id="Food_Drink04"></g> <g id="Food_Drink03"></g> <g id="Food_Drink02"></g> <g id="Food_Drink01"></g> </g></svg>'
            ],
            [
                'title' => 'توريد المواد الغذائية الجافة',
                'description' => '',
                'image'=> '/images/services/4.jpg',
                'color' => 'secondary',
                'icon' => '<svg viewBox="0 0 32 32" enable-background="new 0 0 32 32" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Packaging_Delivery31"></g> <g id="Packaging_Delivery30"></g> <g id="Packaging_Delivery29"></g> <g id="Packaging_Delivery28"></g> <g id="Packaging_Delivery27"></g> <g id="Packaging_Delivery26"></g> <g id="Packaging_Delivery25"></g> <g id="Packaging_Delivery24"></g> <g id="Packaging_Delivery23"></g> <g id="Packaging_Delivery22"> <g> <g> <path d="M31,17v7c0,0.55-0.45,1-1,1H20c-0.55,0-1-0.45-1-1V12c0-0.55,0.45-1,1-1h6c0.3,0,0.59,0.14,0.78,0.38 l4,4.99c0.05,0.07,0.1,0.15,0.14,0.23c0,0.01,0,0.01,0,0.01s0,0,0,0.01C30.98,16.74,31,16.87,31,17z" fill="#48B1DD"></path> </g> </g> <g> <path d="M21,6v19H8c-0.55,0-1-0.45-1-1V6c0-0.55,0.45-1,1-1h12C20.55,5,21,5.45,21,6z" fill="#96CEE5"></path> </g> <g> <path d="M31,17v0.01L25,17v-6h1c0.3,0,0.59,0.14,0.78,0.38l4,4.99c0.05,0.07,0.1,0.15,0.14,0.23 c0,0.01,0,0.01,0,0.01s0,0,0,0.01C30.98,16.74,31,16.87,31,17z" fill="#96CEE5"></path> </g> <g> <path d="M28,24c0,1.65-1.35,3-3,3s-3-1.35-3-3c0-1.65,1.35-3,3-3S28,22.35,28,24z" fill="#4391B2"></path> </g> <g> <path d="M17,24c0,1.65-1.35,3-3,3s-3-1.35-3-3c0-1.65,1.35-3,3-3S17,22.35,17,24z" fill="#4391B2"></path> </g> <g> <path d="M13,11H2c-0.5522,0-1-0.4473-1-1s0.4478-1,1-1h11c0.5522,0,1,0.4473,1,1S13.5522,11,13,11z" fill="#4391B2"></path> </g> <g> <path d="M14,18H5c-0.5522,0-1-0.4473-1-1s0.4478-1,1-1h9c0.5522,0,1,0.4473,1,1S14.5522,18,14,18z" fill="#4391B2"></path> </g> </g> <g id="Packaging_Delivery21"></g> <g id="Packaging_Delivery20"></g> <g id="Packaging_Delivery19"></g> <g id="Packaging_Delivery18"></g> <g id="Packaging_Delivery17"></g> <g id="Packaging_Delivery16"></g> <g id="Packaging_Delivery15"></g> <g id="Packaging_Delivery14"></g> <g id="Packaging_Delivery13"></g> <g id="Packaging_Delivery12"></g> <g id="Packaging_Delivery11"></g> <g id="Packaging_Delivery10"></g> <g id="Packaging_Delivery09"></g> <g id="Packaging_Delivery08"></g> <g id="Packaging_Delivery07"></g> <g id="Packaging_Delivery06"></g> <g id="Packaging_Delivery05"></g> <g id="Packaging_Delivery04"></g> <g id="Packaging_Delivery03"></g> <g id="Packaging_Delivery02"></g> <g id="Packaging_Delivery01"></g> </g></svg>'
            ],
            [
                'title' => 'تغذية المراكز الطبية',
                'description' => '',
                'image'=> '/images/services/5.jpg',
                'color' => 'primary',
                'icon' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12.052 1.25H11.948C11.0495 1.24997 10.3003 1.24995 9.70552 1.32991C9.07773 1.41432 8.51093 1.59999 8.05546 2.05546C7.59999 2.51093 7.41432 3.07773 7.32991 3.70552C7.24995 4.3003 7.24997 5.0495 7.25 5.94797L7.25 6.02572C7.70703 6.01076 8.20535 6.00451 8.75 6.00189V6C8.75 5.03599 8.7516 4.38843 8.81654 3.9054C8.87858 3.44393 8.9858 3.24644 9.11612 3.11612C9.24644 2.9858 9.44393 2.87858 9.9054 2.81654C10.3884 2.7516 11.036 2.75 12 2.75C12.964 2.75 13.6116 2.7516 14.0946 2.81654C14.5561 2.87858 14.7536 2.9858 14.8839 3.11612C15.0142 3.24644 15.1214 3.44393 15.1835 3.9054C15.2484 4.38843 15.25 5.03599 15.25 6V6.00189C15.7947 6.00451 16.293 6.01076 16.75 6.02572V5.94801C16.75 5.04954 16.7501 4.3003 16.6701 3.70552C16.5857 3.07773 16.4 2.51093 15.9445 2.05546C15.4891 1.59999 14.9223 1.41432 14.2945 1.32991C13.6997 1.24995 12.9505 1.24997 12.052 1.25Z" fill="#1C274C"></path> <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M2 14C2 10.2288 2 8.34315 3.17157 7.17157C4.34315 6 6.22876 6 10 6H14C17.7712 6 19.6569 6 20.8284 7.17157C22 8.34315 22 10.2288 22 14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H9.99998C6.22876 22 4.34314 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14ZM12.75 12.5C12.75 12.0858 12.4142 11.75 12 11.75C11.5858 11.75 11.25 12.0858 11.25 12.5V13.25H10.5C10.0858 13.25 9.75 13.5858 9.75 14C9.75 14.4142 10.0858 14.75 10.5 14.75H11.25V15.5C11.25 15.9142 11.5858 16.25 12 16.25C12.4142 16.25 12.75 15.9142 12.75 15.5V14.75H13.5C13.9142 14.75 14.25 14.4142 14.25 14C14.25 13.5858 13.9142 13.25 13.5 13.25H12.75V12.5Z" fill="#1C274C"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 18C14.2091 18 16 16.2091 16 14C16 11.7909 14.2091 10 12 10C9.79086 10 8 11.7909 8 14C8 16.2091 9.79086 18 12 18ZM12.75 12.5C12.75 12.0858 12.4142 11.75 12 11.75C11.5858 11.75 11.25 12.0858 11.25 12.5V13.25H10.5C10.0858 13.25 9.75 13.5858 9.75 14C9.75 14.4142 10.0858 14.75 10.5 14.75H11.25V15.5C11.25 15.9142 11.5858 16.25 12 16.25C12.4142 16.25 12.75 15.9142 12.75 15.5V14.75H13.5C13.9142 14.75 14.25 14.4142 14.25 14C14.25 13.5858 13.9142 13.25 13.5 13.25H12.75V12.5Z" fill="#1C274C"></path> </g></svg>'
            ],
            [
                'title' => 'تقديم خدمات تنظيم الحفلات والمناسبات الحكومية والخاصة',
                'description' => '',
                'image'=> '/images/services/6.jpg',
                'color' => 'secondary',
                'icon' => '<svg height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#D7EBFF;" d="M0,178.087v283.826C0,489.532,22.468,512,50.087,512h411.826C489.532,512,512,489.532,512,461.913 V178.087H0z"></path> <path style="fill:#C4E2FF;" d="M256,512h205.913C489.532,512,512,489.532,512,461.913V178.087H256V512z"></path> <path style="fill:#F26D76;" d="M461.913,44.522H50.087C22.468,44.522,0,66.99,0,94.609v94.609h512V94.609 C512,66.99,489.532,44.522,461.913,44.522z"></path> <path style="fill:#E65C64;" d="M461.913,44.522H256v144.696h256V94.609C512,66.99,489.532,44.522,461.913,44.522z"></path> <path style="fill:#BDDEFF;" d="M384,133.565c-9.223,0-16.696-7.473-16.696-16.696V16.696C367.304,7.473,374.777,0,384,0 c9.223,0,16.696,7.473,16.696,16.696V116.87C400.696,126.092,393.223,133.565,384,133.565z"></path> <path style="fill:#D7EBFF;" d="M128,133.565c-9.223,0-16.696-7.473-16.696-16.696V16.696C111.304,7.473,118.777,0,128,0 s16.696,7.473,16.696,16.696V116.87C144.696,126.092,137.223,133.565,128,133.565z"></path> <path style="fill:#FFEFD9;" d="M256,350.609c-9.217,0-16.696-7.473-16.696-16.696v-33.391c0-9.223,7.479-16.696,16.696-16.696 s16.696,7.473,16.696,16.696v33.391C272.696,343.136,265.217,350.609,256,350.609z"></path> <path style="fill:#FFD9B3;" d="M272.696,333.913v-33.391c0-9.223-7.479-16.696-16.696-16.696v66.783 C265.217,350.609,272.696,343.136,272.696,333.913z"></path> <path style="fill:#F26D76;" d="M333.913,445.217H178.087c-9.217,0-16.696-7.473-16.696-16.696v-83.478 c0-15.342,12.478-27.826,27.826-27.826h133.565c15.348,0,27.826,12.484,27.826,27.826v83.478 C350.609,437.744,343.13,445.217,333.913,445.217z"></path> <path style="fill:#E65C64;" d="M322.783,317.217H256v128h77.913c9.217,0,16.696-7.473,16.696-16.696v-83.478 C350.609,329.701,338.13,317.217,322.783,317.217z"></path> <path style="fill:#36D9D9;" d="M367.304,445.217H144.696c-9.217,0-16.696-7.473-16.696-16.696s7.479-16.696,16.696-16.696h222.609 c9.217,0,16.696,7.473,16.696,16.696S376.521,445.217,367.304,445.217z"></path> <path style="fill:#43BFBF;" d="M367.304,411.826H256v33.391h111.304c9.217,0,16.696-7.473,16.696-16.696 S376.521,411.826,367.304,411.826z"></path> <path style="fill:#FFC033;" d="M256,222.609c0,0,16.696,18.606,16.696,27.826S265.22,267.13,256,267.13s-16.696-7.475-16.696-16.696 S256,222.609,256,222.609"></path> <path style="fill:#F9A926;" d="M272.696,250.435c0-9.22-16.696-27.826-16.696-27.826v44.522 C265.22,267.13,272.696,259.655,272.696,250.435z"></path> </g></svg>'
            ],
            [
                'title' => 'تشغيل الكفتريات في المصانع والمستشفيات والمدارس الحكومية والخاصة',
                'description' => '',
                'image'=> '/images/services/7.jpg',
                'color' => 'primary',
                'icon' => '<svg height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 508 508" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <circle style="fill:#324A5E;" cx="254" cy="254" r="254"></circle> <path style="fill:#CED5E0;" d="M184.4,348.4l3.6,18.8l66,14.4l65.6-14.4l3.6-18.8C323.6,348.4,252.8,318.4,184.4,348.4z"></path> <path style="fill:#F9B54C;" d="M328.8,398.4c-22-35.2-34-101.6-34-101.6h-81.6c0,0-12,66.8-34,101.6H328.8z"></path> <path style="fill:#F1543F;" d="M242.8,392c4.4,0,8.4,0,10.4,0C248.8,392,245.6,392,242.8,392z"></path> <path style="fill:#E6E9EE;" d="M254,508c67.2,0,128.4-26.4,174-68.8c-12.4-72.4-105.6-68.8-105.6-68.8c-9.2,12.4-36,21.6-67.6,21.6 h-0.4H254c-31.6,0-58.8-9.2-67.6-21.6c0,0-93.2-3.2-105.6,68.8C125.6,481.6,186.8,508,254,508z"></path> <g> <path style="fill:#2B3B4E;" d="M265.6,391.6c-0.4,0-1.2,0-1.6,0l0,0C264.4,391.6,265.2,391.6,265.6,391.6z"></path> <path style="fill:#2B3B4E;" d="M265.6,391.6c0.8,0,1.6,0,2.4,0C267.2,391.6,266.4,391.6,265.6,391.6z"></path> <path style="fill:#2B3B4E;" d="M264,391.6L264,391.6h-0.4C263.6,391.6,263.6,391.6,264,391.6z"></path> <path style="fill:#2B3B4E;" d="M261.2,391.6c-1.6,0-3.6,0-5.6,0c-0.4,0-0.4,0-0.8,0h-0.4c0,0,3.6,0,9.6-0.4h-0.4 C262.8,391.6,262,391.6,261.2,391.6z"></path> <path style="fill:#2B3B4E;" d="M255.6,392c2,0,4,0,5.6,0C258.8,391.6,256.8,392,255.6,392z"></path> <path style="fill:#2B3B4E;" d="M254.4,392C254.8,392,254.8,392,254.4,392C254.8,392,254.4,392,254.4,392z"></path> </g> <path style="fill:#FFD05B;" d="M354,219.6c-3.6-2-8.4-0.8-13.2,2.4c0-2,0-4,0-6c0-60-39.2-81.6-87.6-81.6c-48,0.4-87.2,22-87.2,82 c0,2,0,4,0,6c-4.4-3.6-9.2-4.4-13.2-2.4c-7.6,4-8.4,18.8-2.4,32.8c6,14,17.2,22,24.8,18.4c14.8,42.8,44,80.4,78.4,80.4 c34,0,63.6-37.6,78-80.8c7.6,4,18.4-4.4,24.8-18.4C362.4,238.4,361.2,224,354,219.6z"></path> <path style="fill:#FFFFFF;" d="M322.4,370.4c-9.2,12.4-36,21.6-67.6,21.6H254v2l-51.2,51.2v57.6c16.4,3.2,33.6,5.2,51.2,5.2 c67.2,0,128.4-26.4,174-68.8c-4.4-25.2-18.4-41.2-34.8-51.2C362,368.8,322.4,370.4,322.4,370.4z"></path> <path style="fill:#CED5E0;" d="M323.2,348c0,0-7.6,20.8-69.2,20.4h-15.2c-17.2-0.8-44.4-4.8-54.4-20l-4,22.4c0,0,16.8,24.8,74,23.2 c0,0,0,0,0.4,0s0.4,0,0.8,0c1.2,0,3.6,0,6,0c0.8,0,1.6,0,2.4,0c0,0,0.4,0,0.8,0c16.8-0.8,49.6-5.2,62.8-23.2L323.2,348z"></path> <g> <path style="fill:#E6E9EE;" d="M323.2,348c0,0-7.6,20.8-69.2,20.4l0,0V394c0.4,0,0.4,0,0.8,0c0,0,0,0,0.4,0s0.4,0,0.8,0 c1.2,0,3.6,0,6,0c0.8,0,1.6,0,2.4,0c0,0,0.4,0,0.8,0c16.8-0.8,49.6-5.2,62.8-23.2L323.2,348z"></path> <circle style="fill:#E6E9EE;" cx="229.6" cy="451.2" r="10"></circle> <circle style="fill:#E6E9EE;" cx="264.4" cy="451.2" r="10"></circle> <circle style="fill:#E6E9EE;" cx="229.6" cy="484.4" r="10"></circle> <circle style="fill:#E6E9EE;" cx="264.4" cy="484.4" r="10"></circle> </g> <path style="fill:#CED5E0;" d="M341.6,214.8c-58-17.6-118-17.6-176,0c4.8-41.6,9.6-82,14.8-120.8c48.8,0,97.6,0,146.4,0 C331.6,132.8,336.8,173.2,341.6,214.8z"></path> <g> <circle style="fill:#E6E9EE;" cx="253.6" cy="96.4" r="55.6"></circle> <circle style="fill:#E6E9EE;" cx="323.2" cy="96.4" r="39.6"></circle> <circle style="fill:#E6E9EE;" cx="183.6" cy="96.4" r="39.6"></circle> </g> </g></svg>'
            ],
            
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        //clients
        $clients = [
            [
                'name' => 'القوات الخاصة',
                'logo' => '/images/clients/1.png',
            ],
            [
                'name' => 'الامن العام',
                'logo' => '/images/clients/2.png',
            ],
            [
                'name' => 'المديرية العامة للسجون',
                'logo' => '/images/clients/3.jpg',
            ],
            [
                'name' => 'جامعة الامام محمد بن سعود',
                'logo' => '/images/clients/4.jpg',
            ],
            [
                'name' => 'جامعة الملك خالد',
                'logo' => '/images/clients/5.png',
            ],
            [
                'name' => 'وزارة الداخلية',
                'logo' => '/images/clients/6.png',
            ],
            [
                'name' => 'الدفاع الجوي',
                'logo' => '/images/clients/7.png',
            ],
            [
                'name' => 'قوات الأمن الخاصة',
                'logo' => '/images/clients/8.png',
            ],
             [
                'name' => 'وزارة الصحة',
                'logo' => '/images/clients/9.png',
            ],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }

        // Projects
        // $projects = [
        //     [
        //         'title' => 'مشروع إعاشة موقوفي الجوازات',
        //         'description' => 'في جميع مناطق المملكة لمدة ستة أعوام متتالية، وتأمين ما يقارب 1,200,000 وجبة سنوياً.',
        //         'color' => 'primary'
        //     ],
        //     [
        //         'title' => 'رئاسة الاستخبارات العامة',
        //         'description' => 'مشروع تأمين الإعاشة المطهية لمنسوبي الرئاسة.',
        //         'color' => 'secondary'
        //     ],
        //     [
        //         'title' => 'قوات أمن المنشآت',
        //         'description' => 'مشروع تأمين الإعاشة لمنسوبي القوات.',
        //         'color' => 'primary'
        //     ],
        //     [
        //         'title' => 'الدفاع المدني',
        //         'description' => 'مشروع توريد وتأمين الإعاشة لمنسوبي الدفاع المدني.',
        //         'color' => 'secondary'
        //     ],
        //     [
        //         'title' => 'قوات الطوارئ',
        //         'description' => 'مشروع توريد وطهي وتقديم الإعاشة لقوات الطوارئ بالمملكة.',
        //         'color' => 'primary'
        //     ],
        //     [
        //         'title' => 'قوات الدفاع الجوي',
        //         'description' => 'مشروع توريد وإعاشة منسوبي قوات الدفاع الجوي.',
        //         'color' => 'secondary'
        //     ],
        //     [
        //         'title' => 'أمن الحج والعمرة',
        //         'description' => 'مشروع إعاشة القوات الخاصة لأمن الحج والعمرة.',
        //         'color' => 'primary'
        //     ],
        //     [
        //         'title' => 'المستشفيات الحكومية والخاصة',
        //         'description' => 'مشروع تغذية المستشفيات وفق أعلى المعايير الصحية.',
        //         'color' => 'secondary'
        //     ],
        // ];

        // foreach ($projects as $project) {
        //     Project::create($project);
        // }
    }
}
