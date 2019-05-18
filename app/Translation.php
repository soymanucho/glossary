<?php

namespace glossary;

use Illuminate\Database\Eloquent\Model;
use glossary\Term;

class Translation extends Model
{
  public function origTerm()
  {
      return $this->belongsTo(Term::class,'orig_term_id');
  }
  public function destTerm()
  {
      return $this->belongsTo(Term::class,'dest_term_id');
  }

}
