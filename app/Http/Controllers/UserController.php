<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Follow;
use App\User;
use App\Entry;
use App\Comment;


class UserController extends Controller
{
	function index() {
		$followingCount = Auth::user()->following()->count();
		$followedCount = Auth::user()->followers()->count();
		$sugg = Follow::select('user_id', DB::raw('COUNT(follow_id) as count'))
		->orderBy('count', 'desc')
		->groupBy('user_id')
		->limit(3)
		->get();

		$following = Auth::user()->following;
		$followingEntry = collect([]);
		foreach($following as $follow) {
			foreach ($follow->entry as $entry) {
				$followingEntry->push($entry);
			}
		}
		foreach(Auth::user()->entry as $en) {
			$followingEntry->push($en);
		}
		$followingEntry = $followingEntry->sortByDesc('created_at')->take(10);


		// $followingEntry = DB::table('follow')->join('entry', 'follow.follow_id', '=', 'entry.user_id')
		// 	->join('user', 'follow.follow_id', '=', 'user.id')
		// 	->where([
		// 		['follow.user_id', '=', Auth::user()->id]
		// 	])
		// 	->get();


			// dd($followingEntry);
		$suggest = collect([]);
		foreach($sugg as $sug) {
			$suggest->push(User::find($sug->user_id));
		}

		return view('index', [
			'followingCount' => $followingCount,
			'followedCount' => $followedCount,
			'suggest' => $suggest,
			'followingEntry' => $followingEntry
		]);
	}

	function getMyProfile() {
		$followingCount = Auth::user()->following()->count();
		$followedCount = Auth::user()->followers()->count();
		$entries = Entry::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
		return view('myProfile', [
			'followingCount' => $followingCount,
			'followedCount' => $followedCount,
			'entries' => $entries
		]);
	}

	function getUserProfile(Request $req) {
		$user = User::find($req->id);
		$followingCount = $user->following()->count();
		$followedCount = $user->followers()->count();
		$isFollow = $user->isFollowedBy(Auth::user());
		$entries = $user->entry()->orderBy('created_at', 'desc')->paginate(5);
		return view('userProfile', [
			'user' => $user,
			'followingCount' => $followingCount,
			'followedCount' => $followedCount,
			'isFollow' => $isFollow,
			'entries' => $entries
		]);
	}

	function postFollow(Request $req) {
		$follow = new Follow();
		$follow->user_id = Auth::user()->id;
		$follow->follow_id = $req->id;
		if($follow->save()) {
			return 'true';
		} else {
			return 'false';
		}
	}

	function postUnFollow(Request $req) {
		$follow = Auth::user()->follow()->where('follow_id' ,$req->get('id'))->first();
		if(!empty($follow) && $follow->delete()) {
			return 'true';
		} else {
			return 'false';
		}
	}

	function getAccountSetting() {
		return view('account-setting');
	}

	function ajaxSearchUser(Request $req) {
		$user = User::where('name', 'like', '%' . $req->get('name') . '%')->get();
		return response()->json($user);
	}

	function postEntry(Request $req) {
		$entry = new Entry();
		$entry->user_id = Auth::user()->id;
		$entry->title = $req->title;
		$entry->content = $req->content;
		$entry->save();
		return redirect()->back();
	}

	function getMessage(Request $req) {
		$user = User::find($req->id);
		return view('message', [
			'user' => $user
		]);
	}

	function getFollowing() {
		$following = Auth::user()->following()->paginate(12);
		return view('following', [
			'following' => $following
		]);
	}

	function getFollower() {
		$followers = Auth::user()->followers()->paginate(12);
		return view('follower', [
			'followers' => $followers
		]);
	}

	function changePassword(Request $req) {

	}

	function forgotPassword(Request $req) {

	}

	function getSearch(Request $req) {
		$users = User::where('name', 'like', '%' . $req->get('name') . '%')->paginate(10);
		// dd($users);
		return view('search', [
			'users' => $users
		]);
	}

	function postComment(Request $req) {
		$comm = new Comment();
		$comm->user_id = Auth::user()->id;
		$comm->entry_id = $req->get('entry_id');
		$comm->content = $req->get('content');
		if($comm->save()) {
			return 'true';
		} else {
			return 'false';
		}
	}

	function like(Request $req) {

	}

	function replyComment(Request $req) {
		$reply = new Comment();
		$reply->user_id = Auth::user()->id;
		$reply->entry_id = $req->entryId;
		$reply->replyTo = $req->commentId;
		$reply->content = $req->content;
		if($reply->save()) {
			return 'true';
		} else {
			return 'false';
		}
	}
}


