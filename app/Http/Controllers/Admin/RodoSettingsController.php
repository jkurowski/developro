<?php

namespace App\Http\Controllers\Admin;

use App\Floor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\RodoSettings;

class RodoSettingsController extends Controller
{

    public function index()
    {
        return view('admin.rodo_settings.index', ['entry' => RodoSettings::first()]);
    }

    public function update(Request $request, $id)
    {
        $settings = RodoSettings::find($id);
        $settings->update($request->only(['obligation']));
        return redirect()->route('admin.rodo.settings.index')->with('success', 'Ustawienia zapisane');
    }
}
