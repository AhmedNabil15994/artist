<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model{

    use \TraitsFunc;

    protected $table = 'directors';
    protected $primaryKey = 'id';
    public $timestamps = false;

    static function getOne($id){
        return self::NotDeleted()
            ->where('id', $id)
            ->first();
    }

    public function photos(){
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    static function getPhotoPath($id, $photo) {
        return \ImagesHelper::GetImagePath('directors', $id, $photo,false);
    }

    static function dataList($status=null,$ids=null,$type=null,$sliderOn=null) {
        $input = \Request::all();

        $source = self::NotDeleted()->where(function ($query) use ($input,$status,$ids,$type,$sliderOn) {
                    if (isset($input['title']) && !empty($input['title'])) {
                        $query->where('title', 'LIKE', '%' . $input['title'] . '%');
                    } 
                    if (isset($input['id']) && !empty($input['id'])) {
                        $query->where('id',  $input['id']);
                    } 
                    if($status != null){
                        $query->where('status',$status);
                    }
                    if($type != null){
                        $query->where('type',$type);
                    }
                    if($ids != null){
                        $query->whereIn('id',$ids);
                    }
                    if($sliderOn != null){
                        $query->where('show_slider',$sliderOn);
                    }
                })->orderBy('sort','ASC');

        return self::generateObj($source);
    }

    static function generateObj($source){
        $sourceArr = $source->get();

        $list = [];
        foreach($sourceArr as $key => $value) {
            $list[$key] = new \stdClass();
            $list[$key] = self::getData($value);
        }

        // $data['pagination'] = \Helper::GeneratePagination($sourceArr);
        $data['data'] = $list;

        return $data;
    }

    static function getData($source) {
        $data = new  \stdClass();
        $data->id = $source->id;
        $data->title = $source->title;
        $data->show_slider = $source->show_slider;
        $data->description = $source->description != null ? $source->description : '';
        $data->type = $source->type;
        $data->sort = $source->sort;
        $data->status = $source->status;
        $data->statusText = $source->status == 0 ? 'مسودة' : 'مفعلة';
        $data->photo = self::getPhotoPath($source->id, $source->image);
        $data->photo_name = $source->image;
        $data->photo_size = $data->photo != '' ? self::getPhotoSize($data->photo) : '';
        $data->created_at = \Helper::formatDateForDisplay($source->created_at,true);
        return $data;
    }

    static function getPhotoSize($url){
        if($url == "" || !is_file($url)){
            return '';
        }
        $image = get_headers($url, 1);
        $bytes = $image["Content-Length"];
        $mb = $bytes/(1024 * 1024);
        return number_format($mb,2) . " MB ";
    }

    static function newSortIndex(){
        return self::count() + 1;
    }

}
