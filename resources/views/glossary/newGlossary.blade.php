<section class="content" style="width:800px; ">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Creating new glossary</h5>
    </div>
    <div class="modal-body">
      <form id="newGlossaryForm" method="POST" name='createGlossary' action="{!! route('store-glossary') !!}">
        {{ method_field('post') }}
        {{ csrf_field() }}

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Description">
        </div>
        <div class="form-group">
          <label for="lenguage_id">Lenguage</label>
          <select class="form-control select2" name="lenguage_id" data-placeholder="Select a lenguage"
                  style="width: 100%;">
                  @foreach ($lenguages as $lenguage)
                    <option value="{{$lenguage->id}}">{{$lenguage->name}}</option>
                  @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="add">Terms</label><br>
          <input type="button"  value="Add a term" class="add btn btn-success" id="add" />
        </div>


      </form>
    </div>
    <div class="modal-footer">
      <button type="submit" id="submit" class="btn btn-primary">Submit</button>
      <p class="small">*after you create new glossary you can add terms to it</p>
    </div>
  </div>
</div>
</section>
<script type="text/javascript">
$(document).ready(function() {
  $("#submit").click(function() {
    var lastField = $("#newGlossaryForm div:last");
    var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
    if (intId<3) {
      alert("You must define at least 3 terms.");
      // e.preventDefault(e);
    }else {
      $('form#newGlossaryForm').submit();
    }
  });
  $("#add").click(function() {
      var lastField = $("#newGlossaryForm div:last");
      var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
      if (intId>5) {
        return;
      }
      var fieldWrapper = $("<div class=\"form-group\" id=\"term_" + intId + "\"/>");
      fieldWrapper.data("idx", intId);
      var fName = $("<label for=\"term_name_"+intId+"\">Name #"+intId+"</label> <input name=\"term_name_"+intId+"\" id=\"term_name_"+intId+"\" type=\"text\" placeholder=\"Name\" class=\"form-control\" />");
      var fDef= $("<label for=\"term_def_"+intId+"\">Definition #"+intId+"</label><input name=\"term_def_"+intId+"\" id=\"term_def_"+intId+"\" type=\"text\" placeholder=\"Definition\" class=\"form-control\" />");
      // var fType = $("<select class=\"fieldtype\"><option value=\"checkbox\">Checked</option><option value=\"textbox\">Text</option><option value=\"textarea\">Paragraph</option></select>");
      var removeButton = $("<input type=\"button\" class=\"remove btn btn-danger mt-1\" value=\"remove\" />");
      removeButton.click(function() {
          $(this).parent().remove();
      });
      fieldWrapper.append(fName);
      fieldWrapper.append(fDef);
      // fieldWrapper.append(fType);
      fieldWrapper.append(removeButton);
      $("#newGlossaryForm").append(fieldWrapper);
  });
});
</script>
