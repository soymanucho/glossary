<?php

namespace glossary;

use Illuminate\Database\Eloquent\Model;
use glossary\Term;
use glossary\User;

class Translation extends Model
{
  protected $fillable = ['dest_term_id','user_id'];

  public function origTerm()
  {
      return $this->belongsTo(Term::class,'term_id');
  }
  public function destTerm()
  {
      return $this->belongsTo(Term::class,'dest_term_id');
  }
  public function user()
  {
      return $this->belongsTo(User::class,'user_id');
  }

}
