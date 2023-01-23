@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-center mb-4">
            <h2>Manage Leave Settings
            </h2>
        </div>
    </div>
  <form method="POST" id="settingsForm" action="/dashboard/settings/{{$leaveSettings->id}}">
    @csrf
    @method('put')
      <!-- 2 column grid layout with text inputs for the first and last names -->
      <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
              <label class="form-label" for="daysLimit">Disable Calender Days After * :</label>
              <input type="number" id="daysLimit" name="daysLimit" class="form-control"  value="{{$leaveSettings->days_limit}}"  />
            @if ($errors->has('days_limit'))
            <span class="text-danger">{{ $errors->first('days_limit') }}</span>
            @endif
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <label class="form-label" for="daysGap">Apply Leave Before * :</label>
            <input type="number" id="daysGap" name="daysGap" value="{{$leaveSettings->days_gap}}" class="form-control" />
            @if ($errors->has('days_gap'))
            <span class="text-danger">{{ $errors->first('days_gap') }}</span>
           @endif
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-6">
          <!-- Text input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="casual">Permitted Earned Leaves / Month * </label>
            <input type="number" id="casual" name="casual" class="form-control" value="{{$leaveSettings->casual_per_month}}" />
            @if ($errors->has('casual_per_month'))
            <span class="text-danger">{{ $errors->first('casual_per_month') }}</span>
           @endif
          </div>
        </div>
        <div class="col-6">
          <!-- Text input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="sickLeaves">Permitted Sick Leaves / Month * </label>
            <input type="number" id="sickLeaves" name="sickLeaves" value="{{$leaveSettings->sick_per_month}}" class="form-control" />
            @if ($errors->has('sick_per_month'))
            <span class="text-danger">{{ $errors->first('sick_per_month') }}</span>
           @endif
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-6">
          <!-- carry input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="carryPerYear">Carry Forward Leaves / Year* </label>
            <input type="number" id="carryPerYear" name="carryPerYear" value="{{$leaveSettings->carry_forward_per_year}}" class="form-control" />
          </div>
          @if ($errors->has('carry_forward_per_year'))
          <span class="text-danger">{{ $errors->first('carry_forward_per_year') }}</span>
         @endif
        </div>
        <div class="col-6">
          <!-- Number input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="maternity">Total Maternity Leave Days *</label>
            <input type="number" id="maternity" name="maternity" value="{{$leaveSettings->max_maternity}}" class="form-control" />
            @if ($errors->has('max_maternity'))
            <span class="text-danger">{{ $errors->first('max_maternity') }}</span>
           @endif
          </div>
        </div>
        <div class="col-6">
          <!-- Number input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="paternity">Total Paternity Leave Days *</label>
            <input type="number" id="paternity" name="paternity" value="{{$leaveSettings->max_paternity}}" class="form-control" />
            @if ($errors->has('max_paternity'))
            <span class="text-danger">{{ $errors->first('max_paternity') }}</span>
           @endif
          </div>
        </div>
        <div class="col-6">
          <!-- Number input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="breaverment">Total Bereavement Leave Days *</label>
            <input type="number" id="breaverment" name="breaverment" value="{{$leaveSettings->max_bereavement}}" class="form-control" />
            @if ($errors->has('max_bereavement'))
            <span class="text-danger">{{ $errors->first('max_bereavement') }}</span>
           @endif
          </div>
        </div>
      </div>



      <!-- Number input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="otherLeave">Total Other Leave Days * </label>
        <input type="number" id="otherLeave" name="otherLeave" class="form-control" value="{{$leaveSettings->max_other_leave}}" />
        @if ($errors->has('max_other_leave'))
        <span class="text-danger">{{ $errors->first('max_other_leave') }}</span>
       @endif
      </div>


      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
  </form>
</div>
@endsection
@section('footer-script')
<script>

    $( "#settingsForm" ).validate({
      rules: {
        daysLimit: {
          required: true,
          number:true
        },
        daysGap: {
          required: true,
          number:true
        },
        casual: {
          required: true,
          number:true
        },
        sickLeaves: {
          required: true,
          number:true
        },
        carryPerYear: {
          required: true,
          number:true
        },
        maternity: {
          required: true,
          number:true
        },
        paternity: {
          required: true,
          number:true
        },
        breaverment: {
          required: true,
          number:true
        },
        otherLeave: {
          required: true,
          number:true
        },
      }
    });
</script>
@endsection
