<!DOCTYPE html>
<html>

<head>
    <office_name>Laravel office Treeview Example</office_name>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="/css/treeview.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">Manage office TreeView</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3>office List</h3>
                        <ul id="tree1">
                            @foreach ($offices as $office)
                                <li>
                                    {{ $office->office_name }}
                                    @if (count($office->childs))
                                        @include('Backend.officeSetup.manageChild', [
                                            'childs' => $office->childs,
                                        ])
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h3>Add New office</h3>


                        {!! Form::open(['route' => 'addOffice']) !!}


                        <div class="form-group {{ $errors->has('office_name') ? 'has-error' : '' }}">
                            {!! Form::label('office_name:') !!}
                            {!! Form::text('office_name', old('office_name'), [
                                'class' => 'form-control',
                                'placeholder' => 'Enter office_name',
                            ]) !!}
                            <span class="text-danger">{{ $errors->first('office_name') }}</span>
                        </div>

                        <div class="form-group {{ $errors->has('id') ? 'has-error' : '' }}">
                            {!! Form::label('Office Type:') !!}
                            {!! Form::select('id', $OfficeType, old('id'), [
                                'class' => 'form-control',
                                'id' => 'office_type',
                                'placeholder' => 'Select Office Type',
                            ]) !!}
                            <span class="text-danger">{{ $errors->first('id') }}</span>
                        </div>


                        <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                            {!! Form::label('office:') !!}
                            {!! Form::select('parent_id', $allOffices, old('parent_id'), [
                                'class' => 'form-control',
                                'placeholder' => 'Select Office',
                            ]) !!}
                            <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                        </div>


                        
                        {{-- <div class="form-group {{ $errors->has('org_number') ? 'has-error' : '' }}">
                          {!! Form::label('org_number:') !!}
                          {!! Form::number('org_number', old('org_number'), [
                              'class' => 'form-control',
                              'placeholder' => 'Enter org_number',
                          ]) !!}
                          <span class="text-danger">{{ $errors->first('org_number') }}</span>
                      </div>
                        <div class="form-group {{ $errors->has('office_number') ? 'has-error' : '' }}">
                          {!! Form::label('office_number:') !!}
                          {!! Form::number('office_number', old('office_number'), [
                              'class' => 'form-control',
                              'placeholder' => 'Enter office_number',
                          ]) !!}
                          <span class="text-danger">{{ $errors->first('office_number') }}</span>
                      </div> --}}
                        <div class="form-group {{ $errors->has('contact_no') ? 'has-error' : '' }}">
                          {!! Form::label('contact_no:') !!}
                          {!! Form::number('contact_no', old('contact_no'), [
                              'class' => 'form-control',
                              'placeholder' => 'Enter contact_no',
                          ]) !!}
                          <span class="text-danger">{{ $errors->first('contact_no') }}</span>
                      </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                          {!! Form::label('email:') !!}
                          {!! Form::email('email', old('email'), [
                              'class' => 'form-control',
                              'placeholder' => 'Enter email',
                          ]) !!}
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                      </div>
                        <div class="form-group {{ $errors->has('status_date') ? 'has-error' : '' }}">
                          {!! Form::label('status_date:') !!}
                          {!! Form::date('status_date', old('status_date'), [
                              'class' => 'form-control',
                              'placeholder' => 'Enter status_date',
                          ]) !!}
                          <span class="text-danger">{{ $errors->first('status_date') }}</span>
                      </div>
                        <div class="form-group {{ $errors->has('expiry_date') ? 'has-error' : '' }}">
                          {!! Form::label('expiry_date:') !!}
                          {!! Form::date('expiry_date', old('expiry_date'), [
                              'class' => 'form-control',
                              'placeholder' => 'Enter expiry_date',
                          ]) !!}
                          <span class="text-danger">{{ $errors->first('expiry_date') }}</span>
                      </div>


                       

                        <div class="form-group">
                            <button class="btn btn-success">Add New</button>
                        </div>


                        {!! Form::close() !!}


                    </div>
                </div>


            </div>
        </div>
    </div>
    <script src="/js/treeview.js"></script>

    <script>
        $('#office_type').change(function() {
            // alert($(this).val());
    var data = "";
    $.ajax({
        type:"GET",
        url : "controllerapping",
        data : "selectbox1_selectedvalue="+$(this).val(),
        async: false,
        success : function(response) {
            data = response;
            return response;
        },
        error: function() {
            alert('Error occured');
        }
    });
    var string = data.message.split(",");
    var array = string.filter(function(e){return e;});
    var select = $('selectbox2');
    select.empty();
    $.each(array, function(index, value) {          
        select.append(
                $('<option></option>').val(value).html(value)
            );
    });
        $('#selectbox2').show();
});

    </script>
</body>

</html>
