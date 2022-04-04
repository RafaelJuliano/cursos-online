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
                                'content' => 'Configuring the Laravel environment'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the Laravel framework',
                        'contents' => [
                            [
                                'title' => 'Installing Laravel',
                                'content' => 'Installing Laravel'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Routing',
                        'description' => 'Routing of the Laravel framework',
                        'contents' => [
                            [
                                'title' => 'Routing',
                                'content' => 'Routing'
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
                                'content' => 'Configuring the C# environment'
                            ],
                            [
                                'title' => 'Installing C#',
                                'content' => 'Installing C#'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the C# framework',
                        'contents' => [
                            [
                                'title' => 'Installing C#',
                                'content' => 'Installing C#'
                            ],
                            [
                                'title' => 'Routing',
                                'content' => 'Routing'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Routing',
                        'description' => 'Routing of the C# framework',
                        'contents' => [
                            [
                                'title' => 'Routing',
                                'content' => 'Routing'
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
                                'content' => 'Configuring the Java environment'
                            ],
                            [
                                'title' => 'Installing Java',
                                'content' => 'Installing Java'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the Java framework',
                        'contents' => [
                            [
                                'title' => 'Installing Java',
                                'content' => 'Installing Java'
                            ],
                            [
                                'title' => 'Routing',
                                'content' => 'Routing'
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
                                'content' => 'Configuring the PHP environment'
                            ],
                            [
                                'title' => 'Installing PHP',
                                'content' => 'Installing PHP'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the PHP framework',
                        'contents' => [
                            [
                                'title' => 'Installing PHP',
                                'content' => 'Installing PHP'
                            ],
                            [
                                'title' => 'Routing',
                                'content' => 'Routing'
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
                                'content' => 'Configuring the JavaScript environment'
                            ],
                            [
                                'title' => 'Installing JavaScript',
                                'content' => 'Installing JavaScript'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the JavaScript framework',
                        'contents' => [
                            [
                                'title' => 'Installing JavaScript',
                                'content' => 'Installing JavaScript'
                            ],
                            [
                                'title' => 'Routing',
                                'content' => 'Routing'
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
                                'content' => 'Configuring the Visual Basic environment'
                            ],
                            [
                                'title' => 'Installing Visual Basic',
                                'content' => 'Installing Visual Basic'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the Visual Basic framework',
                        'contents' => [
                            [
                                'title' => 'Installing Visual Basic',
                                'content' => 'Installing Visual Basic'
                            ],
                            [
                                'title' => 'Routing',
                                'content' => 'Routing'
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
                                'content' => 'Configuring the Visual Basic environment'
                            ],
                            [
                                'title' => 'Installing Visual Basic',
                                'content' => 'Installing Visual Basic'
                            ]
                        ]
                    ],
                    [
                        'title' => 'Installation',
                        'description' => 'Installation of the Visual Basic framework',
                        'contents' => [
                            [
                                'title' => 'Installing Visual Basic',
                                'content' => 'Installing Visual Basic'
                            ],
                            [
                                'title' => 'Routing',
                                'content' => 'Routing'
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
                                'content' => 'Configuring the Visual Basic environment'
                            ],
                            [
                                'title' => 'Installing Visual Basic',
                                'content' => 'Installing Visual
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
                    $newContent->content = $content['content'];
                    $newContent->created_by = 1;
                    $newContent = $newContent->save();
                }
            }
        }  
        
        $views = [
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            [4, 6, 8, 9, 5, 3, 11, 12, 15],
            [9, 15, 16, 17, 7, 12, 1, 3, 5],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            [4, 6, 8, 9, 5, 3, 11, 12, 15]
        ];

        foreach($views as $key => $view)
        {
            $user = User::find($key+1);
            $user->attendedClasses()->sync($view);
        }


        $this->command->info('seeded!');
            
    }
}
