<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function mostActiveTeachers()
    {
        $querry = DB::select(DB::raw("
            SELECT
                users.name,
                COUNT(users.id) AS total
            FROM
                users
            INNER JOIN
                courses ON courses.created_by = users.id
            GROUP BY
                users.id
            ORDER BY
                total DESC
            LIMIT 10       
        "));

        return view('report.most_active_teachers', compact('querry'));
    }

    public function moreCompleteCourses()
    {
        $querry = DB::select(DB::raw("
            SELECT
                a.id,
                a.reference,
                (a.title) as course,               
                sum(c.contents) as contents
            FROM courses as a
            LEFT JOIN
            (SELECT
                id,
                course_id,
                title
            FROM modules) as b
            ON (a.id = b.course_id)
            LEFT JOIN
            (SELECT
                module_id,
                count(*) as contents
            FROM contents
            GROUP BY module_id) as c
            ON (b.id = c.module_id)
            GROUP BY a.id
            ORDER BY contents DESC
            LIMIT 10;
            "));

        return view('report.more_complete_courses', compact('querry'));
    }

    public function totalContent()
    {
       $querry = DB::select(DB::raw("
            SELECT
                a.id,
                a.reference,
                (a.title) as course,
                count(b.title) as modules,
                sum(c.contents) as contents
            FROM courses as a
            LEFT JOIN
            (SELECT
                id,
                course_id,
                title
            FROM modules) as b
            ON (a.id = b.course_id)
            LEFT JOIN
            (SELECT
                module_id,
                count(*) as contents
            FROM contents
            GROUP BY module_id) as c
            ON (b.id = c.module_id)
            GROUP BY a.id
            ORDER BY contents DESC;
            "));

        return view('report.total_content', compact('querry'));
    }

    public function allContent()
    {
        $querry = DB::select(DB::raw("
            SELECT
                (a.title) as course,
                (b.title) as module,
                (c.id) as id,                
                (c.title) as content, 
                (d.views) as views
            FROM courses as a
            RIGHT JOIN
            (SELECT
                id,
                course_id,
                title
            FROM modules) as b
            ON (a.id = b.course_id)
            RIGHT JOIN
            (SELECT
                id,
                module_id,
                title
            FROM contents) as c
            ON (b.id = c.module_id)
            LEFT JOIN
            (SELECT
                content_id,
                count(*) as views
            FROM attended_classes
            GROUP BY content_id) as d
            ON (c.id = d.content_id)
        "));

        return view('report.all_content', compact('querry'));
    }

    public function contentViews($id)
    {
        $querry = DB::select(DB::raw("
            SELECT
                users.name,
                contents.title,
                attended_classes.created_at
            FROM attended_classes
            INNER JOIN users
            ON user_id = users.id
            INNER JOIN contents
            ON content_id = contents.id
            WHERE content_id = $id;
        "));

        return view('report.content_views', compact('querry'));
    }
}
