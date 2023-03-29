<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UsersController extends Controller
{
    public function users()
    {
        $title = 'MUN | User';
        return view('pages.users.users', compact('title'));
    }

    public function updateusers(Request $request, $id)
    {
        // dd($request);
        $updateuser = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'foto' => 'image|file',
            'ttd' => 'image|file',
        ]);

        if ($request->file('foto')) {
            $updateuser['foto'] = $request->file('foto')->store('users-foto');
        }
        if ($request->file('ttd')) {
            $updateuser['ttd'] = $request->file('ttd')->store('users-ttd');
        }

        User::where('id', $request->id)->update($updateuser);

        return redirect('/users');
    }

    public function allusers(Request $request)
    {
        $title = 'MUN | All User';
        $pagination = 10;
        $allusers = DB::table('users')->paginate($pagination);

        return view('pages.users.allusers', ['allusers' => $allusers], compact('title'))->with('i', ($request->input('page', 1) - 1) *  $pagination);
    }

    public function editallusers($id)
    {

        $users = DB::table('users')->where('id', $id)->get();

        return view('pages.users.allusers', ['users' => $users]);
    }

    public function updateallusers(Request $request, $id)
    {

        $title = 'MUN | All User';

        $allusers = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'jabatan' => 'required',
            'foto' => 'image|file',
        ]);

        if ($request->file('foto')) {
            $allusers['foto'] = $request->file('foto')->store('users-foto');
        }

        User::where('id', $request->id)->update($allusers);

        // return view('pages.users.allusers', ['allusers' => $allusers], compact('title'));

        return redirect('/allusers');
    }

    public function addallusers(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:3',
            'jabatan' => 'required',
            'foto' => 'image|file',

        ]);

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('users-foto');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);


        // dd($request);
        User::create($validatedData);
        return redirect('/allusers');
    }

    public function deleteallusers($id)
    {
        DB::table('users')->where('id', $id)->delete();

        Alert::success('Success', 'Data User Telah berhasil dihapus');
        return redirect('/allusers');
    }
}
