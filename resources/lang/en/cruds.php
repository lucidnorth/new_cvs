<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'name'                         => 'Name',
            'name_helper'                  => ' ',
            'email'                        => 'Email',
            'email_helper'                 => ' ',
            'email_verified_at'            => 'Email verified at',
            'email_verified_at_helper'     => ' ',
            'password'                     => 'Password',
            'password_helper'              => ' ',
            'roles'                        => 'Roles',
            'roles_helper'                 => ' ',
            'remember_token'               => 'Remember Token',
            'remember_token_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'approved'                     => 'Approved',
            'approved_helper'              => ' ',
            'two_factor'                   => 'Two-Factor Auth',
            'two_factor_helper'            => ' ',
            'two_factor_code'              => 'Two-factor code',
            'two_factor_code_helper'       => ' ',
            'two_factor_expires_at'        => 'Two-factor expires at',
            'two_factor_expires_at_helper' => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'contentManagement' => [
        'title'          => 'Content management',
        'title_singular' => 'Content management',
    ],
    'contentCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentPage' => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'category'              => 'Categories',
            'category_helper'       => ' ',
            'tag'                   => 'Tags',
            'tag_helper'            => ' ',
            'page_text'             => 'Full Text',
            'page_text_helper'      => ' ',
            'excerpt'               => 'Excerpt',
            'excerpt_helper'        => ' ',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated At',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted At',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'faqManagement' => [
        'title'          => 'FAQ Management',
        'title_singular' => 'FAQ Management',
    ],
    'faqCategory' => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'faqQuestion' => [
        'title'          => 'Questions',
        'title_singular' => 'Question',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'question'          => 'Question',
            'question_helper'   => ' ',
            'answer'            => 'Answer',
            'answer_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'Notifications',
        'title_singular' => 'Notification',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'institution' => [
        'title'          => 'Institutions',
        'title_singular' => 'Institution',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'logo'                => 'Logo',
            'logo_helper'         => ' ',
            'address'             => 'Address',
            'address_helper'      => ' ',
            'phone'               => 'Phone',
            'phone_helper'        => ' ',
            'email'               => 'Email',
            'email_helper'        => ' ',
            'password'            => 'Password',
            'password_helper'     => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'created_by'          => 'Created By',
            'created_by_helper'   => ' ',
            'institutions'        => 'Institutions',
            'institutions_helper' => ' ',
        ],
    ],
    'paper' => [
        'title'          => 'Papers',
        'title_singular' => 'Paper',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'papers'             => 'Papers',
            'papers_helper'      => ' ',
            'paper_title'        => 'Paper Title',
            'paper_title_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'file_upload'        => 'File Upload',
            'file_upload_helper' => ' ',
        ],
    ],
    'employer' => [
        'title'          => 'Employers',
        'title_singular' => 'Employer',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'address'           => 'Address',
            'address_helper'    => ' ',
            'phone'             => 'Phone',
            'phone_helper'      => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'password'          => 'Password',
            'password_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
        ],
    ],
    'upload' => [
        'title'          => 'Uploads',
        'title_singular' => 'Upload',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'uplaods'            => 'Uplaods',
            'uplaods_helper'     => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
        ],
    ],
    'complaint' => [
        'title'          => 'Complaints',
        'title_singular' => 'Complaint',
    ],
    'chat' => [
        'title'          => 'Chat',
        'title_singular' => 'Chat',
    ],
    'traction' => [
        'title'          => 'Traction',
        'title_singular' => 'Traction',
    ],
    'analytic' => [
        'title'          => 'Analytics',
        'title_singular' => 'Analytic',
    ],
    'search' => [
        'title'          => 'Search',
        'title_singular' => 'Search',
    ],
    'certificate' => [
        'title'          => 'Certificates',
        'title_singular' => 'Certificate',
        'fields'         => [
            'id'                            => 'ID',
            'id_helper'                     => ' ',
            'created_at'                    => 'Created at',
            'created_at_helper'             => ' ',
            'updated_at'                    => 'Updated at',
            'updated_at_helper'             => ' ',
            'deleted_at'                    => 'Deleted at',
            'deleted_at_helper'             => ' ',
            'created_by'                    => 'Created By',
            'created_by_helper'             => ' ',
            'gender'                        => 'Gender',
            'gender_helper'                 => ' ',
            'date_of_birth'                 => 'Date_Of_Birth',
            'date_of_birth_helper'          => ' ',
            'certificate_number'            => 'Certificate_Number',
            'certificate_number_helper'     => ' ',
            'qualification_type'            => 'Qualification_Type',
            'qualification_type_helper'     => ' ',
            'programme'                     => 'Programme',
            'programme_helper'              => ' ',
            'class'                         => 'Class',
            'class_helper'                  => ' ',
            'year_of_entry'                 => 'Year_Of_Entry',
            'year_of_entry_helper'          => ' ',
            'year_of_completion'            => 'Year_Of_Completion',
            'year_of_completion_helper'     => ' ',
            'photo'                         => 'Photo',
            'photo_helper'                  => ' ',
            'first_name'                    => 'First_Name',
            'first_name_helper'             => ' ',
            'middle_name'                   => 'Middle_Name',
            'middle_name_helper'            => ' ',
            'last_name'                     => 'Last_Name',
            'last_name_helper'              => ' ',
            'student_identification'        => 'Student_Identification',
            'student_identification_helper' => ' ',
            'institution'                   => 'Institution',
            'institution_helper'            => ' ',
        ],
    ],

];
