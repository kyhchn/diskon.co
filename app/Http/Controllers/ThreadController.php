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
        return view('thread.all', [
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
    public function edit(Thread $thread)
    {
        return view('thread.edit', [
            'thread' => $thread
        ]);
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
        // $id->destroy();
        if ($id = Thread::where('id', $id)->delete()) {
            return redirect('/thread')->with('message', 'Thread berhasil dihapus');
        } else {
        }
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $threads = Thread::latest()->filter($request->only('search'))->where('judul', 'LIKE', '%' . $request->query('search') . '%')
                ->orWhere('isi', 'LIKE', '%' . $request->query('search') . '%')->orWhere('lokasi', 'LIKE', '%' . $request->query('search') . '%')->get();
            if ($threads->isEmpty()) {
                return view('thread.all');
            }
            return view('thread.all', ['threads' => $threads]);
        } else {
            return view('thread.all');
        }
    }
}
