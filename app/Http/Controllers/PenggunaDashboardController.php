<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Auth;
use App\Desa;
class PenggunaDashboardController extends Controller
{
    public function index(){
        return view('dashboard_pengguna.index');
    }
    public function profile(){
        $user = User::join('detail_desa', 'detail_desa.id_user', '=', 'users.id')
                    ->where('id', '=', Auth::user()->id)->firstOrFail();

        $data = [
            'title' => 'Edit Profile Desa',
            'item' => $user
        ];

        return view('dashboard_pengguna.profile', $data);
    }
    public function profileUpdate(){
        DB::beginTransaction();
        try {
            $user = User::where('id','=', Auth::user()->id)->firstOrFail();

            $input = $this->validate(request(),[
                'nama_desa'           => 'max:150|string|required',
                'nama_kepala_desa'           => 'max:150|string|required',
                'no_telp'        => 'min:5|max:15|string|required',
                'email'          => 'max:150|string|required|email',
                'password'       => 'nullable|max:150|string|confirmed|min:6'
            ]);
            $dataForUpdateDetailUser = [
                'nama_desa'             => $input['nama_desa'],
                'nama_kepala_desa'             => $input['nama_kepala_desa']
                
            ];
            $dataForUpdateUser = [];

            if(!empty($input['password'])){
                $dataForUpdateUser['password'] = Hash::make($input['password']);
            }

            //cek kalo email tidak sama dengan di database
            if($user->email != $input['email']){
                //cek kalo email yang baru tidak ada yang punya
                if(User::where('email', '=', $input['email'])->count() ==  0){
                    $dataForUpdateUser['email'] = $input['email'];
                }else{
                    return back()->withInput()->with('status', msg('Email '.$input['email'].' sudah ada dalam database', 'danger'));
                }
            }

            $user->update($dataForUpdateUser);
            Desa::findOrFail(Auth::user()->id)->update($dataForUpdateDetailUser);

            DB::commit();
            return redirect()->route('pengguna.dashboard.profile')->with('status', msg('Data berhasil dirubah', 'success'));
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->route('pengguna.dashboard.profile')->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
        }
    }
    public function laporan(){
        return view('dashboard_pengguna.laporan');
    }
}
