<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    protected function linkUrl(): Attribute
    {
        return Attribute::make(
            get: function (){
                // initiate this from somewhere else
                $is_https_active = false;
                $localhost_active = true;

                if(!$this->domain){
                    return env('APP_URL') . '/' . $this->url;
                }

                if ($is_https_active) {
                    return 'https://' . $this->domain->domain . '/' . $this->url;
                }

                return 'http://' . $this->domain->domain . '/' . $this->url;

            }
        );
    }

}
