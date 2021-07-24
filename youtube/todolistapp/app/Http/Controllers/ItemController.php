<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function store(ItemRequest $request ){
        DB::beginTransaction();
        try {
            $data = Item::create($request->all());
            if(!$data)
            {
                DB::rollback();
                return $this->fail('There is something wrong. data store not success');
            }
            DB::commit();
            return $this->success([
                'message' => 'Product Attribute  Created successfully'
            ]);
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail($exception->getMessage());
        }

    }

    public function index(){
        try{
            $data = Item::all();
            return $this->success(ItemResource::collection($data));
        }
        catch (Exception $exception){
            DB::rollback();
            return $this->fail($exception->getMessage());
        }

    }

    public function update(ItemRequest $request, $id){
        DB::beginTransaction();
        try {
            $Item= Item::find($id);
            if (!$Item)
            {
                return $this->fail("Item not found", 404);
            }
            $Item= $Item->update($request->all());
            if(!$Item)
            {
                DB::rollback();
                return $this->fail("There is something wrong");
            }
            DB::commit();
            return $this->success([
                "message" => "Item '.$id.'updated"
            ]);
        }catch (Exception $exception){
            DB::rollback();
            return $this->fail($exception->getMessage());
        }
    }


    public function destroy($id)
    {

        try {
            $Item = Item::find($id);
            if(!$Item)
            {
                return $this->fail("Item not exist.");
            }
            $Item = $Item->delete();
            if(!$Item)
            {
                return $this->fail("Something went wrong");
            }
            return $this->success([
                'message' => 'Item'.$id.'deleted'
            ]);
        }catch (Exception $exception){
            return $this->fail($exception->getMessage());
        }
    }

}
