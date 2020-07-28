<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bidang;
use DB;
class BidangController extends Controller
{
    private $dir = 'bidang.';

    public function index(){
        $data = [
            'title' => 'Bidang'
        ];
        return view($this->dir.'index',$data);
    }
    public function showdata(Request $request){
        
        try {
            $data = Bidang::all();
            $no =1;
            foreach ($data as $key => $item) {
    			$data[$key]['num'] = $no;
    			$data[$key]['action'] = '
    				<div class="btn-group" role="group">
                        <button id="btnGroupDrop" type="button" class="btn btn-dark btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop">
                            <a class="dropdown-item text-warning" href="'.route('bidang.edit', [$data[$key]['id']]).'"><i class="ti-check-box"></i> Edit</a>
                            <button type="button" class="btn-link dropdown-item text-danger btn-delete" data-id="'.$data[$key]['id'].'"><i class="ti-trash"></i> Hapus</button>
                            <form method="POST" id="form-delete-'.$data[$key]['id'].'" style="display: inline" action="'.route('bidang.destroy',[$data[$key]['id']]).'">
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
            'title' => 'Tambah Bidang Desa'
        ];

        return view($this->dir.'create',$data);
    }
    public function store(){
        DB::beginTransaction();
        try {
            $input = $this->validate(request(),[
                'nama_bidang'          => 'max:150|string|required',
            ]);

            $dataForCreateBidang = [
                'nama_bidang'             => $input['nama_bidang'],
            ];
            Bidang::create($dataForCreateBidang);
            DB::commit();
            return redirect()->route('bidang.index')->with('status', msg('Data berhasil disimpan', 'success'));
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return redirect()->route('bidang.create')->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
        }
    }
    public function edit($id){
        $item = Bidang::findOrFail($id);
        $data = [
            'title' => 'Edit Bidang',
            'item' => $item
        ];
        return view($this->dir.'edit',$data);
        
    }
    public function update($id){
        DB::beginTransaction();
            try {
                $bidang = Bidang::findOrFail($id);

                $input = $this->validate(request(),[
                    'nama_bidang'          => 'max:150|string|required',
                ]);
                $dataForUpdate = [
                    'nama_bidang'      => $input['nama_bidang'],
                ];
                $bidang->update($dataForUpdate);

                DB::commit();
                return redirect()->route('bidang.index')->with('status', msg('Data berhasil dirubah', 'success'));

            } catch (\Illuminate\Database\QueryException $e) {
                DB::rollback();
                return redirect()->route('bidang.edit', [$id])->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
            }
		}

		public function destroy($id){
			DB::beginTransaction();
			try {
				$bidang = Bidang::findOrFail($id);
				$bidang->delete();
				DB::commit();
				return redirect()->route('bidang.index')->with('status', msg('Data berhasil dihapus', 'success'));
			} catch (\Illuminate\Database\QueryException $e) {
				DB::rollback();
				return redirect()->route('bidang.index')->with('status', msg('Kesalahan : '.$e->errorInfo[2], 'danger'));
			}
        }
}
