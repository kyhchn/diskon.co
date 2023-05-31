<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function create($komen_id)
    {
        return view('reply.create')->with('komen_id', $komen_id);
    }
    public function edit(Reply $reply)
    {
        if (auth()->user()->id != $reply->user_id) {
            return redirect()->back()->with('error', 'You\'r not authorized');
        }
        if ($reply) {
            return view('reply.edit')->with('reply', $reply);
        }
    }
    public function update(Request $request, Reply $reply)
    {
        if (auth()->user()->id != $reply->user_id) {
            return redirect()->back()->with('error', 'You\'r not authorized');
        }
        $validated = $request->validate([
            'isi' => 'required|string',
        ]);
        $reply->isi = $validated['isi'];
        $reply->update();
        return redirect('/thread');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'isi' => 'required|string',
            'komen_id' => 'required|string'
        ]);
        $reply = new Reply;
        $reply->isi = $validated['isi'];
        $reply->komen_id = $validated['komen_id'];
        $reply->user_id = auth()->user()->id;
        $reply->save();
        return redirect('/thread');
    }

    public function destroy(string $id)
    {
        $reply = Reply::where('id', $id)->first();
        if (auth()->user()->id == $reply->user_id) {
            if (Reply::where('id', $id)->delete()) {
                return redirect('/thread');
            }
        }
        return redirect()->back()->with('error', 'You\'r not authorized');
    }
}
