<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function index(): View
    {
        $this->authorizeRole(['admin']);

        $setting = Schema::hasTable('site_settings')
            ? SiteSetting::firstOrCreate([], SiteSetting::defaults())
            : SiteSetting::make(SiteSetting::defaults());

        return view('admin.site-settings', compact('setting'));
    }

    public function update(Request $request): RedirectResponse
    {
        $this->authorizeRole(['admin']);

        $validated = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'hero_badge' => ['nullable', 'string', 'max:255'],
            'hero_title' => ['required', 'string', 'max:255'],
            'hero_subtitle' => ['required', 'string'],
            'cta_primary_label' => ['nullable', 'string', 'max:255'],
            'cta_primary_link' => ['nullable', 'string', 'max:255'],
            'cta_secondary_label' => ['nullable', 'string', 'max:255'],
            'cta_secondary_link' => ['nullable', 'string', 'max:255'],
            'principal_name' => ['required', 'string', 'max:255'],
            'principal_title' => ['nullable', 'string', 'max:255'],
            'principal_message' => ['required', 'string'],
            'about_title' => ['required', 'string', 'max:255'],
            'about_description' => ['required', 'string'],
            'hero_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'principal_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'school_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if (! Schema::hasTable('site_settings')) {
            return redirect()->route('admin.site-settings')->with('error', 'Tabel pengaturan beranda belum tersedia. Jalankan migrasi database terlebih dahulu.');
        }

        $setting = SiteSetting::firstOrCreate([], SiteSetting::defaults());

        $setting->fill([
            'site_name' => $validated['site_name'],
            'hero_badge' => $validated['hero_badge'] ?? SiteSetting::defaults()['hero_badge'],
            'hero_title' => $validated['hero_title'],
            'hero_subtitle' => $validated['hero_subtitle'],
            'cta_primary_label' => $validated['cta_primary_label'] ?? SiteSetting::defaults()['cta_primary_label'],
            'cta_primary_link' => $validated['cta_primary_link'] ?? SiteSetting::defaults()['cta_primary_link'],
            'cta_secondary_label' => $validated['cta_secondary_label'] ?? SiteSetting::defaults()['cta_secondary_label'],
            'cta_secondary_link' => $validated['cta_secondary_link'] ?? SiteSetting::defaults()['cta_secondary_link'],
            'principal_name' => $validated['principal_name'],
            'principal_title' => $validated['principal_title'] ?? SiteSetting::defaults()['principal_title'],
            'principal_message' => $validated['principal_message'],
            'about_title' => $validated['about_title'],
            'about_description' => $validated['about_description'],
        ]);

        if ($request->hasFile('hero_image')) {
            $setting->hero_image_path = $request->file('hero_image')->store('site', 'public');
        }

        if ($request->hasFile('principal_image')) {
            $setting->principal_image_path = $request->file('principal_image')->store('site', 'public');
        }

        if ($request->hasFile('school_image')) {
            $setting->school_image_path = $request->file('school_image')->store('site', 'public');
        }

        $setting->save();

        return redirect()->route('admin.site-settings')->with('success', 'Konten beranda berhasil diperbarui.');
    }

    protected function authorizeRole(array $roles): void
    {
        if (! Auth::check() || ! in_array(Auth::user()->role, $roles, true)) {
            abort(403);
        }
    }
}
