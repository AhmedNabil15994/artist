<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model{

    use \TraitsFunc;

    protected $table = 'order_details';
    protected $primaryKey = 'id';
    public $timestamps = false;


    static function getPhotoPath($id, $photo) {
        return \ImagesHelper::GetImagePath('orders', $id, $photo,false);
    }

    public function Order(){
        return $this->hasOne('App\Models\Order','id','order_id');
    }

    static function getOne($id) {
        return self::NotDeleted()
            ->find($id);
    }

    static function dataList() {        
        $input = \Request::all();
        $source = self::NotDeleted()->orderBy('id','DESC');
        return self::getObj($source);
    }

    static function getObj($source) {
        $sourceArr = $source->get();

        $list = [];
        foreach ($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value);
        }

        $data['data'] = $list;
        return $data;
    }

    static function getData($source) {
        $dataObj = new \stdClass();
        $dataObj->id = $source->id;
        $dataObj->facebook = $source->facebook;
        $dataObj->twitter = $source->twitter;
        $dataObj->youtube = $source->youtube;
        $dataObj->snapchat = $source->snapchat;
        $dataObj->instagram = $source->instagram;
        $dataObj->order_id = $source->order_id;
        $dataObj->identity_no = $source->identity_no;
        $dataObj->identity_end_date = $source->identity_end_date;
        $dataObj->image = self::getPhotoPath($source->id, $source->image);
        $dataObj->identity_image = self::getPhotoPath($source->id, $source->identity_image);
        $dataObj->transfer_image = self::getPhotoPath($source->id, $source->transfer_image);
        $dataObj->created_at = \Helper::formatDate($source->created_at,'Y-m-d H:i:s');

        return $dataObj;
    }

    static function getStatus($status){
        $text = '';
        if($status == 1){
            $text = 'طلب جديد';
        }elseif($status == 2){
            $text = 'تم الموافقة';
        }elseif($status == 3){
            $text = 'تم الرفض';
        }elseif($status == 4){
            $text = 'جاري الدفع';
        }elseif($status == 5){
            $text = 'تم الدفع';
        }
        return $text;
    }

    static function newSortIndex(){
        return self::count() + 1;
    }

}
