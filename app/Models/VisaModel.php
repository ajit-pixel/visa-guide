<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class VisaModel extends Model
{
    protected $table = "visaguide";
   

    protected $fillable = [
        'short_description',
        'country_id',
        'purpose_id',
        'detailed_description',
        'success_rate',
        'can_apply_online',
        'apply_online_link_id',
        'instructions',
        'active',
        'order',
        'is_evisa',
        'created_at',
        'updated_at',
    ];

    public static function visa_model(  )
    {
        $url="https://api.visa.guide/v1/open/visas?country_id=233";

        $data = Cache::get($url);

        if( $data == null )
        {
            $ch = curl_init();
            curl_setopt($ch,CURLOPT_URL,$url);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            $output = curl_exec($ch);
            $data = json_decode($output);
            $expiresAt = now()->addHour(24);
            Cache::put($url, $data,$expiresAt );
            curl_close($ch);    
        }


        foreach( $data->visas as $visa_data )
        {
            $visa = new VisaModel([
                'id' =>$visa_data->id,
                'short_description' =>$visa_data->short_description,
                'country_id' =>$visa_data->country_id ,
                'purpose_id' =>$visa_data->purpose_id,
                'detailed_description'=>$visa_data->detailed_description ,
                'success_rate' =>$visa_data->success_rate,
                'can_apply_online'=>$visa_data->can_apply_online,
                'apply_online_link_id'=>$visa_data->apply_online_link_id,
                'instructions'=>$visa_data->instructions,
                'active'=>$visa_data->active,
                'order'=>$visa_data->order,
                'is_evisa'=>$visa_data->is_evisa,
            ]);
            $visa->save();
        }
    }
}
