<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Desa;
use DB;

class PenggunaController extends Controller
{
    private $dir = 'pengguna.';

    public function index(){
        $data = [
            'title' => 'Pengguna Desa'
        ];
        return view($this->dir.'index',$data);
    }
    public function showdata(Request $request){
        
        try {
            $data = Desa::join('users','users.id','=','detail_desa.id_user')
            ->where('users.roles','=','2')
            ->get();
            $no =1;
            foreach ($data as $key => $item) {
    			$data[$key]['num'] = $no;
    			$data[$key]['action'] = '
    				<div class="btn-group" role="group">
                        <button id="btnGroupDrop" type="button" class="btn btn-dark btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop">
                            <a class="dropdown-item text-warning" href="'.route('pengguna.edit', [$data[$key]['id']]).'"><i class="ti-check-box"></i> Edit</a>
                            <button type="button" class="btn-link dropdown-item text-danger btn-delete" data-id="'.$data[$key]['id'].'"><i class="ti-trash"></i> Hapus</button>
                            <form method="POST" id="form-delete-'.$data[$key]['id'].'" style="display: inline" action="'.route('pengguna.destroy',[$data[$key]['id']]).'">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                            </form>
                        </div>
                    </div>
    			';
                $no++;
    		}
    		return response()->json([
            	'error'   => false,
            	'data'    => $data
        	]);

           
        } catch (\Illuminate\Database\QueryException $e) {
            $data = [
                'error'   => $e->errorInfo[2],
                'data'    => [],
            ];

            return response()->json($data);
          
        }
    }

    public function create(){
        $data = [
            'title' => 'Tambah Pengguna Desa'
        ];

        return view($this->dir.'create',$data);
    }
    public function store(){
        DB::beginTransaction();
        try {
            $input = $this->validate(request(),[
                'nama_desa'          => 'max:150|string|required',
                'nama_kepala_desa' => 'string|required',
                'no_telp'       => 'min:5|max:15|string|required',
                'username'      => 'max:150|string|required|unique:users,username|without_spaces',
                'email'         => 'max:150|string|required|unique:users,email',
                'password'      => 'max:150|string|required|confirmed|min:6',
            ]);

            $dataForCreateDetailUser = [
                'nama_desa'             => $input['nama_desa'],
                'nama_kepala_desa'      => $input['nama_kepala_desa'],
                'no_telp'          => $input['no_telp'],
               
            ];

            $dataForCreateUser = [
                'username'         => $input['username'],
                'email'            => $input['email'],
                'password'         => Hash::make($input['password']),
                'roles'             => '2',          
            ];

            $user = User::create($dataForCreateUser);
            $dataForCreateDetailUser['id_user'] = $user->id;

            Desa::create($dataForCreateDetailUser);

            DB::commit();
            return redirect()->route('pengguna.index')->with('status', msg('Data berhasil disimpan', 'success'));
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->route('pengguna.create')->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
        }
    }
    public function edit($id){

        $item = User::join('detail_desa', 'detail_desa.id_user', '=', 'users.id')
                ->where('users.id', '=', $id)
                ->where('users.roles', '=', '2')
                ->firstOrFail();
            $data = [
                'title' => 'Edit Profile Pengguna Desa',
                'item' => $item
            ];
           
    
            return view($this->dir.'edit', $data);
    }
    public function update($id){
        DB::beginTransaction();
        try {
            $user = User::findorFail($id);
            $input = $this->validate(request(),[
                'nama_desa'           => 'max:150|string|required',
                'nama_kepala_desa'           => 'max:150|string|required',
                'no_telp'        => 'min:5|max:15|string|required',
                'username'       => 'max:150|string|required|without_spaces',
                'email'          => 'max:150|string|required|email',
                'password'       => 'nullable|max:150|string|confirmed|min:6'
            ]);
           

            $dataForUpdateDetailUser = [
                'nama_desa'             => $input['nama_desa'],
                'nama_kepala_desa'      => $input['nama_kepala_desa'],
                'no_telp'          => $input['no_telp'],
               
            ];
            $dataForUpdateUser = [
                'username'         => $input['username'],
            ];

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

            //cek kalo username tidak sama dengan di database
            if($user->username != $input['username']){
                //cek kalo username yang baru tidak ada yang punya
                if(User::where('username', '=', $input['username'])->count() ==  0){
                    $dataForUpdateUser['username'] = $input['username'];
                }else{
                    return back()->withInput()->with('status', msg('Username '.$input['username'].' sudah ada dalam database', 'danger'));
                }
            }

            $user->update($dataForUpdateUser);
            Desa::findorFail($id)->update($dataForUpdateDetailUser);

            DB::commit();
            return redirect()->route('pengguna.index')
                             ->with('status', msg('Data berhasil dirubah', 'success'));

        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->route('pengguna.edit', [$id])
                             ->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
        }
        
    }
    public function destroy($id){
        DB::beginTransaction();
        try {
            $data = User::findorFail($id);
            Desa::where('id_user','=',$id)->delete();
            $data->delete();
            DB::commit();
            return redirect()->route('pengguna.index')->with('status', msg('Data berhasil dihapus', 'success'));
            
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->route('pengguna.index')->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
        }
    }

    
}
