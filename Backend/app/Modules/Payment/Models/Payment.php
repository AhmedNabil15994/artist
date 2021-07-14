<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model{

    use \TraitsFunc;

    protected $table = 'account_details';
    protected $primaryKey = 'id';
    public $timestamps = false;

    

    // static function dataList($status=null) {        
    //     $input = \Request::all();
    //     $source = self::NotDeleted()->where(function ($query) use ($input) {
    //             if (isset($input['name']) && !empty($input['name'])) {
    //                 $query->where('name', 'LIKE', '%' . $input['name'] . '%');
    //             }
    //             if (isset($input['id']) && !empty($input['id'])) {
    //                 $query->where('id', $input['id']);
    //             }
    //             if (isset($input['status']) && !empty($input['status'])) {
    //                 $query->where('status', $input['status']);
    //             }
    //             if (isset($input['created_at']) && !empty($input['created_at'])) {
    //                 $query->where('created_at','>=', $input['created_at'].' 00:00:00')->where('created_at','<=',$input['created_at']. ' 23:59:59');
    //             }
    //         });
    //     if($status != null){
    //         $source->where('status',$status);
    //     }
    //     if(!IS_ADMIN){
    //         $source->where('city_id',User::getOne(USER_ID)->city_id);
    //     }
    //     $source->orderBy('id','DESC');
    //     return self::getObj($source);
    // }



}
