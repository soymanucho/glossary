<?php

namespace glossary;

use Illuminate\Database\Eloquent\Model;
use glossary\Glossary;

class Term extends Model
{
  public function glossaries()
  {
     return $this->belongsToMany(Glossary::class)->withTimestamps();
  }
  public function translations()
  {
     return $this->hasMany(Translation::class)->withTimestamps();
  }
}
