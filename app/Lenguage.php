<?php

namespace glossary;

use Illuminate\Database\Eloquent\Model;

class Lenguage extends Model
{
  public function term()
  {
     return $this->hasOne(Term::class);
  }
}
