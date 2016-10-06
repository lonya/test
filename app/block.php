<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Esensi\Model\Model;
class block extends Model
{
    protected $primaryKey='id';
		protected $table='blocks';
		protected $fillable=array('topicid','title','content','imagePath','updated_at');
		protected $rules=['title'=>['required','max:100'],
											'topicid'=>['required'],
											'content'=>['required']];
}
