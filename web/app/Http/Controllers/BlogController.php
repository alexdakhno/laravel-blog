<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    protected array $formFields;

    public function __construct()
    {
        $this->authorizeResource(Blog::class, 'blog');

        $this->formFields = (new Blog())->getFillable();
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blog = new Blog();
        $posts = $blog->with('user')
            ->orderByDesc('created_at')
            ->paginate(9);

        $posts->map(function ($post){
            $post->preview_text = $post->body;
            return $post;
        });

        return view('blog.index', ['posts' => $posts]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.add');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $post = new Blog($request->only($this->formFields));
        $post->user_id = auth()->id();

        $post->save();

        return redirect()->route('blog.show', $post);
    }

    /**
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.detail', [
            'post' => $blog
        ]);
    }

    /**
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', [
            'post' => $blog
        ]);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $blog->update($request->only($this->formFields));

        return back()->with(['status' => 'ok', 'post' => $blog]);
    }

    /**
     * @param  Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blog.index');
    }

    /**
     * @return string[]
     */
    protected function resourceAbilityMap()
    {
        return [
            'create' => 'create',
            'store' => 'create',
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
        ];
    }
}
