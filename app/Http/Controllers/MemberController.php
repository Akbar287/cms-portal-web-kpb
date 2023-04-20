<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Ktp;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('member/index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberRequest $memberRequest)
    {
        $memberRequest->validate([
            'nik' => ['required', 'string', 'max:16', 'min:16', 'unique:ktp'],
            'nama' => ['required', 'string', 'min:4', 'max:128'],
            'jenis_kelamin' => ['required', 'string'],
            'tanggal_lahir' => ['required'],
            'tempat_lahir' => ['required', 'string', 'min:2', 'max:128'],
        ]);

        $foto = 'default.png';
        if($memberRequest->hasFile('icon')) {
            $filenameWithExt = $memberRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $memberRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $memberRequest->file('icon')->storeAs('public/profile_img', $foto);
        }

        $ktp = Ktp::create($this->ktpData());
        $member = $ktp->member()->create($this->memberData($foto));
        $userlogin = $member->userlogin()->create($this->userloginData());

        return redirect('/member/' . $member->member_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Member sudah ditambah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('member/show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('member/edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MemberRequest $memberRequest, Member $member)
    {
        $foto = $member->avatar;
        if($memberRequest->hasFile('icon')) {
            if($member->avatar != 'default.png') {
                Storage::delete("public/profile_img/". $member->avatar);
            }
            
            $filenameWithExt = $memberRequest->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $memberRequest->file('icon')->getClientOriginalExtension();
            $foto = $filename.'_'.time(). '.'.$extension;
            $memberRequest->file('icon')->storeAs('public/profile_img', $foto);
        }
        $member->ktp()->update($this->ktpData());
        $member->update($this->memberData($foto));
        $member->userlogin()->update($this->userloginData());

        return redirect('/member/' . $member->member_id)->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Member sudah diubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect('/member')->with('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Sukses!</strong> Data Member sudah dihapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
    }

    public function ktpData () {
        return [
            'nik' => request('nik'),
            'nama' => request('nama'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'tempat_lahir' => request('tempat_lahir'),
            'tanggal_lahir' => request('tanggal_lahir'),
            'verified' => request('verified')
        ];
    }
    
    public function memberData ($foto = null) {
        return [
            'email' => request('email'),
            'no_hp' => request('no_hp'),
            'no_wa' => request('no_wa'),
            'avatar' => $foto != null ? $foto : request('icon'),
        ];
    }
    
    public function userloginData () {
        return [
            'username' => request('username'),
            'password' => Hash::make(request('username')),
            'is_aktif' => request('is_aktif'),
            'access_token' => null,
            'access' => null,
            'last_login' => date('Y-m-d'),
            'created_at' => date('Y-m-d'),
        ];
    }
}
