<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course\Course;
use App\Models\Course\Module;
use App\Models\Course\Content;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com.br',
                'password' => bcrypt('admin'),
                'status' => 'active',
                'role' => 'admin'
            ],
            [
                'name' => 'Student',
                'email' => 'student@mail.com.br',
                'password' => bcrypt('student'),
                'status' => 'active',
                'role' => 'student'
            ],
            [
                'name' => 'Teacher',
                'email' => 'teacher@mail.com.br',
                'password' => bcrypt('teacher'),
                'status' => 'active',
                'role' => 'teacher'
            ],
            [
                'name' => 'Guest',
                'email' => 'guest@mail.com.br',
                'password' => bcrypt('guest'),
                'status' => 'active',
                'role' => 'student'
            ],
            [
                'name' => 'foo',
                'email' => 'foo@mail.com.br',
                'password' => bcrypt('foo'),
                'status' => 'active',
                'role' => 'student'
            ]            
        ];

        foreach($users as $user)
        {
            $newUser = new User;
            $newUser->name = $user['name'];
            $newUser->email = $user['email'];
            $newUser->password = $user['password'];
            $newUser->status = $user['status'];
            $newUser->role = $user['role'];
            $newUser->save();
        }

        $courses = [
            [
                'reference' => 'LRV-001',
                'title' => 'Laravel',
                'description' => 'Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern.',
                'modules' => [
                    [
                        'title' => 'Introduction',
                        'description' => 'Introduction to the Laravel framework',
                        'contents' => [
                            [
                                'title' => 'Configuring the Laravel Environment',
                                'description' => 'Configuring the Laravel environment'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the Laravel framework',
                        'contents' => [
                            [
                                'title' => 'Installing Laravel',
                                'description' => 'Installing Laravel'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Routing',
                        'description' => 'Routing of the Laravel framework',
                        'contents' => [
                            [
                                'title' => 'Routing',
                                'description' => 'Routing'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Controllers',
                        'description' => 'Controllers of the Laravel framework',
                        'contents' => []
                    ],
                    [
                        'title' => 'Models',
                        'description' => 'Models of the Laravel framework',
                        'contents' => []
                    ]
                ]
            ],
            [
                'reference' => 'C01',
                'title' => 'C#',
                'description' => 'C# is a general-purpose, object-oriented programming language. It was developed by Microsoft within its .NET initiative and later approved as a standard by Ecma (ECMA-334) and ISO (ISO/IEC 23270:2006).',
                'modules' => [
                    [
                        'title' => 'Introduction',
                        'description' => 'Introduction to the C# framework',
                        'contents' => [
                            [
                                'title' => 'Configuring the C# Environment',
                                'description' => 'Configuring the C# environment'
                            ],
                            [
                                'title' => 'Installing C#',
                                'description' => 'Installing C#'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the C# framework',
                        'contents' => [
                            [
                                'title' => 'Installing C#',
                                'description' => 'Installing C#'
                            ],
                            [
                                'title' => 'Routing',
                                'description' => 'Routing'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Routing',
                        'description' => 'Routing of the C# framework',
                        'contents' => [
                            [
                                'title' => 'Routing',
                                'description' => 'Routing'
                            ]
                        ]
                    ]
                ]
            ],
            [
                'reference' => 'JV-001',
                'title' => 'Java',
                'description' => 'Java is a general-purpose computer programming language that is concurrent, class-based, object-oriented, and specifically designed to have as few implementation dependencies as possible.',
                'modules' => [
                    [
                        'title' => 'Introduction',
                        'description' => 'Introduction to the Java framework',
                        'contents' => [
                            [
                                'title' => 'Configuring the Java Environment',
                                'description' => 'Configuring the Java environment'
                            ],
                            [
                                'title' => 'Installing Java',
                                'description' => 'Installing Java'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the Java framework',
                        'contents' => [
                            [
                                'title' => 'Installing Java',
                                'description' => 'Installing Java'
                            ],
                            [
                                'title' => 'Routing',
                                'description' => 'Routing'
                            ]
                        ]
                    ]
                ]

                            ],
            [
                'reference' => 'PHP-001',
                'title' => 'PHP',
                'description' => 'PHP is a popular general-purpose scripting language that is especially suited to web development.',
                'modules' => [
                    [
                        'title' => 'Introduction',
                        'description' => 'Introduction to the PHP framework',
                        'contents' => [
                            [
                                'title' => 'Configuring the PHP Environment',
                                'description' => 'Configuring the PHP environment'
                            ],
                            [
                                'title' => 'Installing PHP',
                                'description' => 'Installing PHP'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the PHP framework',
                        'contents' => [
                            [
                                'title' => 'Installing PHP',
                                'description' => 'Installing PHP'
                            ],
                            [
                                'title' => 'Routing',
                                'description' => 'Routing'
                            ]
                        ]
                    ]
                ]
                            ],
            [
                'reference' => 'JS-001',
                'title' => 'JavaScript',
                'description' => 'JavaScript is a high-level, dynamic, untyped, and interpreted programming language.',
                'modules' => [
                    [
                        'title' => 'Introduction',
                        'description' => 'Introduction to the JavaScript framework',
                        'contents' => [
                            [
                                'title' => 'Configuring the JavaScript Environment',
                                'description' => 'Configuring the JavaScript environment'
                            ],
                            [
                                'title' => 'Installing JavaScript',
                                'description' => 'Installing JavaScript'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the JavaScript framework',
                        'contents' => [
                            [
                                'title' => 'Installing JavaScript',
                                'description' => 'Installing JavaScript'
                            ],
                            [
                                'title' => 'Routing',
                                'description' => 'Routing'
                            ]
                        ]
                    ]
                ]
                            ],
            [
                'reference' => 'VB-001',
                'title' => 'Visual Basic',
                'description' => 'Visual Basic is a general-purpose, object-oriented programming language. It was developed by Microsoft within its .NET initiative and later approved as a standard by Ecma (ECMA-334) and ISO (ISO/IEC 23270:2006).',
                'modules' => [
                    [
                        'title' => 'Introduction',
                        'description' => 'Introduction to the Visual Basic framework',
                        'contents' => [
                            [
                                'title' => 'Configuring the Visual Basic Environment',
                                'description' => 'Configuring the Visual Basic environment'
                            ],
                            [
                                'title' => 'Installing Visual Basic',
                                'description' => 'Installing Visual Basic'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the Visual Basic framework',
                        'contents' => [
                            [
                                'title' => 'Installing Visual Basic',
                                'description' => 'Installing Visual Basic'
                            ],
                            [
                                'title' => 'Routing',
                                'description' => 'Routing'
                            ]
                        ]
                    ]
                ]
                            ],
            [
                'reference' => 'VB-002',
                'title' => 'Visual Basic',
                'description' => 'Visual Basic is a general-purpose, object-oriented programming language. It was developed by Microsoft within its .NET initiative and later approved as a standard by Ecma (ECMA-334) and ISO (ISO/IEC 23270:2006).',
                'modules' => [
                    [
                        'title' => 'Introduction',
                        'description' => 'Introduction to the Visual Basic framework',
                        'contents' => [
                            [
                                'title' => 'Configuring the Visual Basic Environment',
                                'description' => 'Configuring the Visual Basic environment'
                            ],
                            [
                                'title' => 'Installing Visual Basic',
                                'description' => 'Installing Visual Basic'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the Visual Basic framework',
                        'contents' => [
                            [
                                'title' => 'Installing Visual Basic',
                                'description' => 'Installing Visual Basic'
                            ],
                            [
                                'title' => 'Routing',
                                'description' => 'Routing'
                            ]
                        ]
                    ]
                ]
                            ],
            [
                'reference' => 'VB-003',
                'title' => 'Visual Basic',
                'description' => 'Visual Basic is a general-purpose, object-oriented programming language. It was developed by Microsoft within its .NET initiative and later approved as a standard by Ecma (ECMA-334) and ISO (ISO/IEC 23270:2006).',
                'modules' => [
                    [
                        'title' => 'Introduction',
                        'description' => 'Introduction to the Visual Basic framework',
                        'contents' => [
                            [
                                'title' => 'Configuring the Visual Basic Environment',
                                'description' => 'Configuring the Visual Basic environment'
                            ],
                            [
                                'title' => 'Installing Visual Basic',
                                'description' => 'Installing Visual
                                Basic'
                            ]
                        ]
                    ]
                ]
                            ]

        ]; 
        
        foreach($courses as $course)
        {
            $newCourse = new Course;
            $newCourse->reference = $course['reference'];
            $newCourse->title = $course['title'];
            $newCourse->description = $course['description'];
            $newCourse->created_by = 1;

            $newCourse = $newCourse->save();
            $courseId = Course::where('reference', $course['reference'])->first()->id;            
            $modules = $course['modules'];
            
            foreach($modules as $module)
            {
                $newModule = new Module;
                $newModule->course_id = $courseId;            
                $newModule->title = $module['title'];
                $newModule->description = $module['description'];
                $newModule->created_by = 1;
                $newModule = $newModule->save();
                $moduleId = Module::where('title', $module['title'])->where('course_id', $courseId)->first()->id;
                $contents = $module['contents'];
                
                foreach($contents as $content)
                {
                    $newContent = new Content;
                    $newContent->module_id = $moduleId;                
                    $newContent->title = $content['title'];
                    $newContent->description = $content['description'];
                    $newContent->created_by = 1;
                    $newContent = $newContent->save();
                }
            }
        }                 
            
    }
}
