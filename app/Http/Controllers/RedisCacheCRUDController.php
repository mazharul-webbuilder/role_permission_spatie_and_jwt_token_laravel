
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RedisCacheCRUDController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('posts', now()->addMinutes(10), function () {
            return Post::all();
        });

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::create($request->all());

        Cache::forget('posts');

        return redirect()->route('posts.index');
    }

   public function edit($id)
    {
        $post = Cache::remember("post_{$id}", now()->addMinutes(10), function () use ($id) {
            return Post::findOrFail($id);
        });

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        Cache::forget("post_{$id}");
        Cache::forget('posts');

        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        Cache::forget("post_{$id}");
        Cache::forget('posts');

        return redirect()->route('posts.index');
    }
}
