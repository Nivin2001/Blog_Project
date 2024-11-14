<?php

namespace App\Http\Controllers;

use App\Models\BlogSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // 1. عرض جميع الأقسام
    public function index()
    {
        $sections = DB::table('blog_sections')->get();
        return view('Blog.admin.blog_section.index', compact('sections'));
    }
    /**
     * Show the form for creating a new resource.
     */
    // 2. عرض صفحة إنشاء قسم جديد
    public function create()
    {
        return view('Blog.admin.blog_section.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    // 3. تخزين قسم جديد في قاعدة البيانات
    public function store(Request $request)
    {
        DB::table('blog_sections')->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return redirect()->route('blog_sections.index')
        ->with('success', 'تم إضافة القسم بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Retrieve the specific blog section by id
        $section = DB::table('blog_sections')->where('id', $id)->first();

        // Check if the section exists
        if (!$section) {
            return redirect()->route('blog_sections.index')
            ->with('error', 'Blog section not found');
        }

        // Retrieve all blogs associated with this section
        $blogs = DB::table('blogs')
        ->where('blog_section_id', $id)->get();

        // Return the view for showing the specific blog section and its blogs
        return view('blog_sections.show', compact('section', 'blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // 4. عرض قسم محدد للتعديل
    public function edit($id)
    {
        $section = DB::table('blog_sections')->where('id', $id)->first();
        return view('Blog.admin.blog_section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */

    // 5. تحديث بيانات قسم محدد
    public function update(Request $request, $id)
    {
        DB::table('blog_sections')
            ->where('id', $id)
            ->update([
                'section_name' => $request->input('section_name'),
                'description' => $request->input('description')
            ]);

        return redirect()->route('blog_sections.index')->with('success', 'تم تحديث القسم بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     */
 // 6. حذف قسم محدد
 public function destroy($id)
 {
     DB::table('blog_sections')->where('id', $id)->delete();
     return redirect()->route('blog_sections.index')->with('success', 'تم حذف القسم بنجاح');
 }
    }

