<?php

namespace Teek\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Teek\Notify;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        'user_id', 'action', 'message', 'read', 'for'
        Notify::create([
            'user_id' => Auth::id(),
            'action'     => $request->action,
            'message'     => $request->message,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Teek\Notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function show(Notify $notify)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Teek\Notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function edit(Notify $notify)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Teek\Notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Notify::find($request->id)->update([
            'read' => 'true'
        ]);

        echo true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Teek\Notify  $notify
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notify $notify)
    {
        //
    }
}
