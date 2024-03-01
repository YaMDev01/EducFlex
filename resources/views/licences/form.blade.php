@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="">
            <h5 class="card-title fw-semibold mb-4" style="color: #161f22;">Edit licence</h5>
        </div>
        <div class="card">
          <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="licence" class="form-label">{{ __('Code licenec :') }}</label>
                    <input type="text" class="form-control" id="licence" aria-describedby="emailHelp" checked>
                </div>
                <div class="mb-3">
                    <label for="date_aspiration" class="form-label">{{ ('Date d\'aspiration :') }}</label>
                    <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('script')
<script type="text/javascript">
    $(function(){
        $('#datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d',
            language: "fr"
        });
    });
</script>
@endsection