<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Section;
use App\Models\Content;

class AdminController extends Controller
{
    public function getData()
    {
        $pages = Page::with('sections.contents')->get();
        return response()->json($pages);
    }
    public function getLogo()
    {
        $setting = Setting::first();
        return response()->json($setting);
    }

    public function updateLogo(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');

        Setting::updateOrCreate(['id' => 1], ['logo' => $logoPath]);

        return response()->json(['message' => 'Logo updated successfully', 'image' => $logoPath]);
    }

    public function updateContent(Request $request)
    {
        $request->validate([
            'section_id' => 'required',
            'key' => 'required',
            'value' => 'required',
        ]);

        Content::updateOrCreate(
            ['section_id' => $request->section_id, 'key' => $request->key],
            ['value' => $request->value]
        );

        return response()->json(['message' => 'Content updated successfully']);
    }
}
