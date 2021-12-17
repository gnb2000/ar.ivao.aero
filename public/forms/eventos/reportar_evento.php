<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="type">Tipo</label>
  <div class="col-md-4">
    <select id="type" name="type" class="form-control">
      <option value="atc">ATC</option>
      <option value="piltolo">Piloto</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="event">Evento</label>
  <div class="col-md-4">
    <select id="event" name="event" class="form-control">
      <option value="1">Option one</option>
      <option value="2">Option two</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="AtcICAO">ATC Station</label>  
  <div class="col-md-4">
  <input id="AtcICAO" name="AtcICAO" placeholder="SAXX_XXX" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="CallSign">Callsign</label>  
  <div class="col-md-4">
  <input id="CallSign" name="CallSign" placeholder="IVAOARG" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="depICAO">Departure ICAO</label>  
  <div class="col-md-4">
  <input id="depICAO" name="depICAO" placeholder="SAXX" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="arrICAO">Arrival ICAO</label>  
  <div class="col-md-4">
  <input id="arrICAO" name="arrICAO" placeholder="SAXX" class="form-control input-md" type="text">
    
  </div>
</div>

</fieldset>
</form>