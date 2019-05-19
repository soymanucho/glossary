<?php

namespace glossary;

use Illuminate\Database\Eloquent\Model;
use glossary\Glossary;
use glossary\Lenguage;
use glossary\Translation;

class Term extends Model
{
  protected $fillable = ['name','definition','lenguage_id'];

  public function glossaries()
  {
     return $this->belongsToMany(Glossary::class)->withTimestamps();
  }
  public function translations()
  {
     return $this->hasMany(Translation::class,'orig_term_id');
  }
  public function lenguage()
  {
     return $this->belongsTo(Lenguage::class,'lenguage_id');
  }
}
