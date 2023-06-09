<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('thread.index', ['threads' => Thread::all()]);
        return view('thread.index', [
            'threads' => Thread::latest()->filter(request(['judul', 'search']))->paginate(6)
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('thread.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'isi' => 'required|string',
            'lokasi' => 'required|string'
        ]);

        $thread = new Thread;
        $thread->judul = $request->judul;
        $thread->isi = $request->isi;
        $thread->lokasi = $request->lokasi;
        $thread->likes = 0;
        $thread->user_id = auth()->user()->id;
        $thread->save();

        return Redirect::to('/thread');
    }

    /**
     * Display the specified resource.
     * param can be users username or thread id
     */
    public function show($param)
    {
        if (is_numeric($param)) {
            return view('thread.detail', ['thread' => Thread::where('id', $param)->first()]);
        } else {
            try {
                return view('thread.index', ['threads' => User::where('username', $param)->first()->threads()->get()]);
            } catch (\Throwable $th) {
                return view('thread.index', ['threads' => null]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function edit(Thread $thread)
    {
        if (auth()->user()->id == $thread->user_id) {
            return view('thread.edit', [
                'thread' => $thread
            ]);
        }
        return redirect()->back()->with('error', 'You\'r not authorized');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thread $thread)
    {
        $request->validate([
            'judul' => ['required'],
            'isi' => ['required'],
            'lokasi' => ['required']
        ]);


        $thread->judul = $request->judul;
        $thread->lokasi = $request->lokasi;
        $thread->isi = $request->isi;
        $thread->update();

        return Redirect::to('/thread');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $thread = Thread::where('id', $id)->first();

        if ($thread->user_id == auth()->user()->id) {
            $thread->delete();
            return redirect('/thread')->with('message', 'Thread berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'You\'r not authorized');
        }
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $threads = Thread::latest()->filter($request->only('search'))->where('judul', 'LIKE', '%' . $request->query('search') . '%')
                ->orWhere('isi', 'LIKE', '%' . $request->query('search') . '%')->get();
            if ($threads->isEmpty()) {
                return view('thread.index');
            }
            return view('thread.index', ['threads' => $threads]);
        } else {
            return view('thread.index');
        }
    }
}
