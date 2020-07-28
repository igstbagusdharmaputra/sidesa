<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dana;
use DB;
class SumberDanaController extends Controller
{
    private $dir = 'dana.';

    public function index(){
        $data = [
            'title' => 'Sumber Dana'
        ];
        return view($this->dir.'index',$data);
    }
    public function showdata(Request $request){
        
        try {
            $data = Dana::all();
            $no =1;
            foreach ($data as $key => $item) {
    			$data[$key]['num'] = $no;
    			$data[$key]['action'] = '
    				<div class="btn-group" role="group">
                        <button id="btnGroupDrop" type="button" class="btn btn-dark btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop">
                            <a class="dropdown-item text-warning" href="'.route('dana.edit', [$data[$key]['id']]).'"><i class="ti-check-box"></i> Edit</a>
                            <button type="button" class="btn-link dropdown-item text-danger btn-delete" data-id="'.$data[$key]['id'].'"><i class="ti-trash"></i> Hapus</button>
                            <form method="POST" id="form-delete-'.$data[$key]['id'].'" style="display: inline" action="'.route('dana.destroy',[$data[$key]['id']]).'">
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
            'title' => 'Tambah Sumber Dana'
        ];

        return view($this->dir.'create',$data);
    }
    public function store(){
        DB::beginTransaction();
        try {
            $input = $this->validate(request(),[
                'nama_dana'          => 'max:150|string|required',
                'prefix'    => 'min:3|max:3|string|required|unique:sumber_dana,prefix'
            ]);

            $dataForCreatedana = [
                'nama_dana'             => $input['nama_dana'],
                'prefix'    => $input['prefix'],
            ];
            Dana::create($dataForCreatedana);
            DB::commit();
            return redirect()->route('dana.index')->with('status', msg('Data berhasil disimpan', 'success'));
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->route('dana.create')->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
        }
    }
    public function edit($id){
        $item = Dana::findOrFail($id);
        $data = [
            'title' => 'Edit Sumber Dana',
            'item' => $item
        ];
        return view($this->dir.'edit',$data);
        
    }
    public function update($id){
        DB::beginTransaction();
            try {
                $dana = Dana::findOrFail($id);
                $input = $this->validate(request(),[
                    'nama_dana'          => 'max:150|string|required',
                    'prefix'    => 'min:3|max:3|string|required',
                ]);
                $dataForUpdate = [
                    'nama_dana'      => $input['nama_dana'],
                    'prefix'        => $input['prefix']
                ];
                $dana->update($dataForUpdate);

                DB::commit();
                return redirect()->route('dana.index')->with('status', msg('Data berhasil dirubah', 'success'));

            } catch (\Illuminate\Database\QueryException $e) {
                DB::rollback();
                return redirect()->route('dana.edit', [$id])->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
            }
		}

		public function destroy($id){
			DB::beginTransaction();
			try {
				$dana = Dana::findOrFail($id);
				$dana->delete();
				DB::commit();
				return redirect()->route('dana.index')->with('status', msg('Data berhasil dihapus', 'success'));
			} catch (\Illuminate\Database\QueryException $e) {
				DB::rollback();
				return redirect()->route('dana.index')->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
			}
        }
}
