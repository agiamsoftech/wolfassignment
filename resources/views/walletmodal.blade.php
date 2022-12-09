<form action="{{route('addbal')}}" method="post">
    @csrf
<div class="form-group row">
    <label for="example-text-input" class="col-sm-3 col-form-label">Add Balance</label>
    <div class="col-sm-6">
        <input class="form-control" type="text" name="bal" min="1" maxlength="4" required>
        <input class="form-control" type="hidden" name="user_id" value="{{ $user_id; }}">
    </div>
    <button type="submit" class="btn btn-base md-close">Save</button>
</div> 
</form>
