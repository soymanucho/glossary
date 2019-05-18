<?php

namespace glossary;

use Illuminate\Database\Eloquent\Model;
use glossary\Glossary;

class Subject extends Model
{
  public function glossaries()
  {
     return $this->belongsToMany(Glossary::class)->withTimestamps();
  }
}
