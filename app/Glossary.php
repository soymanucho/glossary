<?php

namespace glossary;

use Illuminate\Database\Eloquent\Model;
use glossary\Subject;

class Glossary extends Model
{
  public function subjects()
  {
     return $this->belongsToMany(Subject::class)->withTimestamps();
  }
  public function terms()
  {
     return $this->belongsToMany(Term::class)->withTimestamps();
  }
}
