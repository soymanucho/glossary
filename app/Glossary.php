<?php

namespace glossary;

use Illuminate\Database\Eloquent\Model;
use glossary\Subject;
use glossary\User;
use glossary\Term;

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
  public function user()
  {
     return $this->belongsTo(User::class);
  }

  public function lenguage()
  {
    return $this->belongsTo(Lenguage::class,'lenguage_id');
  }

}
