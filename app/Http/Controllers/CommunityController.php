<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\User;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $communities = Community::get();
        return view('content.community', [
            'communities' => $communities
        ]);
    }

    public function show(Community $community)
    {
        return view('content.communityProfile', [
            'community' => $community
        ]);
    }

    public function join(Request $request)
    {
        $this->validate($request, [
            'community_id' => 'required|max:255'
        ]);

        User::where('id', $request->user()->id)->update([
            'community_id' => $request->community_id
        ]);
        return back();
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'community_name' => 'required|max:255',
            'community_description' => 'required'
        ]);
        Community::create([
            'community_name' => $request->community_name,
            'community_description' => $request->community_description,
            'user_id' => $request->user()->id
        ]);
        $lastcommunity = Community::query()->where('user_id', $request->user()->id)->latest()->limit(1)->get('id');
        // add the user to the created group

        User::where('id', $request->user()->id)->update([
            'community_id' => $lastcommunity->pluck('id')->shift()
        ]);
        return back();
    }
}
