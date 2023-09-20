<?php

namespace App\Models;

use App\Models\Scopes\UserFileScope;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class File extends Model
{
    use HasFactory;
    protected $fillable=["title",'message','link','path',"user_id"];

public static function booted(){
    static ::addGlobalScope(new UserFileScope());

}

public function user () :BelongsTo {
    return $this->belongsTo(User::class);
}

public function logs():HasMany{
        return $this->hasMany(FileLog::class);
}

}
