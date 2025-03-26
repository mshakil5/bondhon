<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SectionStatus;

class SectionController extends Controller
{
  public function sectionStatus()
  {
      $status = SectionStatus::firstOrCreate();
      return view('admin.section.section_status', compact('status'));
  }

  public function updateSectionStatus(Request $request)
  {
      $status = SectionStatus::firstOrCreate([]);

      $request->validate([
          'slider' => 'required|in:0,1',
          'donation' => 'required|in:0,1',
          'our_activities' => 'required|in:0,1',
          'about_us' => 'required|in:0,1',
          'blog' => 'required|in:0,1',
          'partners' => 'required|in:0,1'
      ]);

      $status->slider = $request->input('slider');
      $status->donation = $request->input('donation');
      $status->our_activities = $request->input('our_activities');
      $status->about_us = $request->input('about_us');
      $status->blog = $request->input('blog');
      $status->partners = $request->input('partners');
      $status->save();

      return redirect()->back()->with('success', 'Section statuses updated successfully');
  }
}
