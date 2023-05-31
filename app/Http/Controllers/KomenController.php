<?php

namespace App\Http\Controllers;

use App\Models\Komen;
use Illuminate\Http\Request;

class KomenController extends Controller
{
    public function create($thread_id)
    {
        return view('komen.create')->with('thread_id', $thread_id);
    }

    public function edit(Komen $komen)
    {
        if (auth()->user()->id != $komen->user_id) {
            return redirect()->back()->with('error', 'You\'r not authorized');
        }
        if ($komen) {
            return view('komen.edit')->with('komen', $komen);
        }
    }

    public function update(Request $request, Komen $komen)
    {
        if (auth()->user()->id != $komen->user_id) {
            return redirect()->back()->with('error', 'You\'r not authorized');
        }
        $validated = $request->validate([
            'isi' => 'required|string',
        ]);
        $komen->isi = $validated['isi'];
        $komen->update();
        return redirect('/thread');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'isi' => 'required|string',
            'thread_id' => 'required|integer'
        ]);
        $komen = new Komen;
        $komen->thread_id = $validated['thread_id'];
        $komen->user_id = auth()->user()->id;
        $komen->isi = $validated['isi'];
        $komen->like = 0;
        $komen->save();

        return redirect('/thread');
    }
    public function destroy(string $id)
    {
        $komen = Komen::where('id', $id)->first();
        if (auth()->user()->id != $komen->user_id) {
            return redirect()->back()->with('error', 'You\'r not authorized');
        }
        if (Komen::where('id', $id)->delete()) {
            return redirect('/thread');
        }
        return redirect('/dashboard');
    }
}
