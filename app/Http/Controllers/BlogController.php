<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  // 1. عرض جميع المدونات
  public function index()
  {
      $blogs = DB::table('blogs')
                  ->join('blog_sections', 'blogs.blog_section_id', '=', 'blog_sections.id')
                  ->select('blogs.*', 'blog_sections.section_name')
                  ->get();

      return view('blogs.index', compact('blogs'));
  }
    /**
     * Show the form for creating a new resource.
     */

       // 2. عرض صفحة إنشاء مدونة جديدة
       public function create()
       {
           $sections = DB::table('blog_sections')->get();
           return view('Blog.admin.blog.create', compact('sections'));
       }
    /**
     * Store a newly created resource in storage.
     */
    // 3. تخزين مدونة جديدة في قاعدة البيانات
    public function store(Request $request)
    {
        DB::table('blogs')->insert([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'blog_section_id' => $request->input('blog_section_id')
        ]);

        return redirect()->route('blogs.index')->with('success', 'تم إضافة المدونة بنجاح');
    }

    /**
     * Display the specified resource.
     */

     public function show($id)
     {
         // Retrieve the specific blog post by id, including its section name
         $blog = DB::table('blogs')
                     ->join('blog_sections', 'blogs.blog_section_id', '=', 'blog_sections.id')
                     ->select('blogs.*', 'blog_sections.section_name')
                     ->where('blogs.id', $id)
                     ->first();

         // Check if the blog post exists
         if (!$blog) {
             return redirect()->route('blogs.index')->with('error', 'Blog not found');
         }

         // Return the view for showing the specific blog
         return view('blogs.show', compact('blog'));
     }

    /**
     * Show the form for editing the specified resource.
     */
    // 4. عرض مدونة محددة للتعديل
    public function edit($id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();
        $sections = DB::table('blog_sections')->get();
        return view('blogs.edit', compact('blog', 'sections'));
    }



    /**
     * Update the specified resource in storage.
     */
// 5. تحديث بيانات مدونة محددة
public function update(Request $request, $id)
{
    DB::table('blogs')
        ->where('id', $id)
        ->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'blog_section_id' => $request->input('blog_section_id')
        ]);

    return redirect()->route('blogs.index')->with('success', 'تم تحديث المدونة بنجاح');
}
    /**
     * Remove the specified resource from storage.
     */
     // 6. حذف مدونة محددة
     public function destroy($id)
     {
         DB::table('blogs')->where('id', $id)->delete();
         return redirect()->route('blogs.index')->with('success', 'تم حذف المدونة بنجاح');
     }
}
