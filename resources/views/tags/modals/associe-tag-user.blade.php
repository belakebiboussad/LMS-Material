  <x-modal id ="associe-tag-farm" name="associe-tag-farm" focusable>
    <x-slot name="header">
      Attribuer des Tags RFID
    </x-slot>
    <p>This is the main content of the modal body.</p>

    <div class="row">
      <div class="mb-3 col-md-12">
        <label class="form-label">{{ __('tag.owner_id') }}</label>
        <select id="owner_id" class="form-control border border-2 p-2 {{ $errors->has('owner_id') ? ' is-invalid' : '' }}" required>
          <option value="">{{ __('Select owner') }}</option>
          @foreach($owners as $owner)
          <option value="{{ $owner->id }}" {{ old('owner_id') == $owner->id ? 'selected' : '' }}>{{ $owner->name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <x-slot name="footer">
      <button type="button" class="btn btn-warning" data-dismiss="modal">{{ __('Cancel') }}</button>
      <button type="submit" class="btn bg-gradient-primary" onclick="fct();">
        <i class="material-icons">save</i>
      Save 
      </button>
    </x-slot>
  </x-modal>