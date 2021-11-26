<?php

namespace App\Http\Controllers;

use App\Models\WebConfig;
use Illuminate\Support\Str;
use App\Http\Requests\StoreWebConfigRequest;
use App\Http\Requests\UpdateWebConfigRequest;

class WebConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webConfigs = WebConfig::paginate();

        return view('webConfigs.index', compact('webConfigs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('webConfigs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWebConfigRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWebConfigRequest $request)
    {
        $webConfig = new WebConfig();
        $webConfig->name = $request->name;
        $webConfig->key = Str::random(10);
        $webConfig->secret = Str::random(32);
        $webConfig->enable_client_messages = $request->enable_client_message;
        $webConfig->enable_statistics = $request->enable_statistics;
        $webConfig->save();


        return redirect()->route('webConfigs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebConfig  $webConfig
     * @return \Illuminate\Http\Response
     */
    public function show(WebConfig $webConfig)
    {
        return view('webConfigs.show', compact('webConfig'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebConfig  $webConfig
     * @return \Illuminate\Http\Response
     */
    public function edit(WebConfig $webConfig)
    {
        return view('webConfigs.edit', compact('webConfig'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWebConfigRequest  $request
     * @param  \App\Models\WebConfig  $webConfig
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWebConfigRequest $request, WebConfig $webConfig)
    {
        $webConfig->update($request->all());

        return redirect()->route('webConfigs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebConfig  $webConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebConfig $webConfig)
    {
        $webConfig->delete();

        return redirect()->route('webConfigs.index');
    }
}
