<section class="content" style="width:800px; ">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Creating new {{$term->name}} translation</h5>
    </div>
    <div class="modal-body">
      <form id="newTranslationForm" method="POST" name='createGlossary' action="{!! route('store-translation',compact('term')) !!}">
        {{ method_field('post') }}
        {{ csrf_field() }}
        <div class="form-group">
          <label for="lenguage_id">Wich lenguage do you want to translate to</label>
          <select class="form-control select2" name="lenguage_id" data-placeholder="Select a lenguage"
                  style="width: 100%;">
                  @foreach ($lenguages as $lenguage)
                    <option value="{{$lenguage->id}}">{{$lenguage->name}}</option>
                  @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="name">Translated name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter name translation">
        </div>
        <div class="form-group">
          <label for="definition">Translated definition</label>
          <input type="text" class="form-control" id="definition" name="definition" placeholder="Enter definition translation">
        </div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="modal-footer">

      <p class="small"></p>
    </div>
  </div>
</div>
</section>
