<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 20,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 21,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 22,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 23,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 24,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 25,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 26,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 27,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 28,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 29,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 30,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 31,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 32,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 33,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 34,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 35,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 36,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 37,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 38,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 39,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 40,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 41,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 42,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 43,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 44,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 45,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 46,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 47,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 48,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 49,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 50,
                'title' => 'institution_create',
            ],
            [
                'id'    => 51,
                'title' => 'institution_edit',
            ],
            [
                'id'    => 52,
                'title' => 'institution_show',
            ],
            [
                'id'    => 53,
                'title' => 'institution_delete',
            ],
            [
                'id'    => 54,
                'title' => 'institution_access',
            ],
            [
                'id'    => 55,
                'title' => 'paper_create',
            ],
            [
                'id'    => 56,
                'title' => 'paper_edit',
            ],
            [
                'id'    => 57,
                'title' => 'paper_show',
            ],
            [
                'id'    => 58,
                'title' => 'paper_delete',
            ],
            [
                'id'    => 59,
                'title' => 'paper_access',
            ],
            [
                'id'    => 60,
                'title' => 'employer_create',
            ],
            [
                'id'    => 61,
                'title' => 'employer_edit',
            ],
            [
                'id'    => 62,
                'title' => 'employer_show',
            ],
            [
                'id'    => 63,
                'title' => 'employer_delete',
            ],
            [
                'id'    => 64,
                'title' => 'employer_access',
            ],
            [
                'id'    => 65,
                'title' => 'upload_create',
            ],
            [
                'id'    => 66,
                'title' => 'upload_edit',
            ],
            [
                'id'    => 67,
                'title' => 'upload_show',
            ],
            [
                'id'    => 68,
                'title' => 'upload_delete',
            ],
            [
                'id'    => 69,
                'title' => 'upload_access',
            ],
            [
                'id'    => 70,
                'title' => 'complaint_create',
            ],
            [
                'id'    => 71,
                'title' => 'complaint_edit',
            ],
            [
                'id'    => 72,
                'title' => 'complaint_show',
            ],
            [
                'id'    => 73,
                'title' => 'complaint_delete',
            ],
            [
                'id'    => 74,
                'title' => 'complaint_access',
            ],
            [
                'id'    => 75,
                'title' => 'chat_create',
            ],
            [
                'id'    => 76,
                'title' => 'chat_edit',
            ],
            [
                'id'    => 77,
                'title' => 'chat_show',
            ],
            [
                'id'    => 78,
                'title' => 'chat_delete',
            ],
            [
                'id'    => 79,
                'title' => 'chat_access',
            ],
            [
                'id'    => 80,
                'title' => 'traction_create',
            ],
            [
                'id'    => 81,
                'title' => 'traction_edit',
            ],
            [
                'id'    => 82,
                'title' => 'traction_show',
            ],
            [
                'id'    => 83,
                'title' => 'traction_delete',
            ],
            [
                'id'    => 84,
                'title' => 'traction_access',
            ],
            [
                'id'    => 85,
                'title' => 'analytic_create',
            ],
            [
                'id'    => 86,
                'title' => 'analytic_edit',
            ],
            [
                'id'    => 87,
                'title' => 'analytic_show',
            ],
            [
                'id'    => 88,
                'title' => 'analytic_delete',
            ],
            [
                'id'    => 89,
                'title' => 'analytic_access',
            ],
            [
                'id'    => 90,
                'title' => 'search_create',
            ],
            [
                'id'    => 91,
                'title' => 'search_edit',
            ],
            [
                'id'    => 92,
                'title' => 'search_show',
            ],
            [
                'id'    => 93,
                'title' => 'search_delete',
            ],
            [
                'id'    => 94,
                'title' => 'search_access',
            ],
            [
                'id'    => 95,
                'title' => 'certificate_create',
            ],
            [
                'id'    => 96,
                'title' => 'certificate_edit',
            ],
            [
                'id'    => 97,
                'title' => 'certificate_show',
            ],
            [
                'id'    => 98,
                'title' => 'certificate_delete',
            ],
            [
                'id'    => 99,
                'title' => 'certificate_access',
            ],
            [
                'id'    => 100,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
