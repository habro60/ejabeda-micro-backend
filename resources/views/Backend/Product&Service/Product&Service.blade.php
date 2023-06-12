@extends('layouts.Backend.app')

@section('content')
<section>
  <div class="container">
      <div class="card text-center">
          <div class="card-header">
              <h6>Product And Service Define</h6>
          </div>

      </div>
  </div>
</section>

<section>
  <div class="container">
      <div class="card text-right">
          
<a href="#" class="btn btn-danger"> Insert</a>
<a href="#" class="btn btn-success"> View</a>
<a href="#" class="btn btn-info"> Report</a>
         

      </div>
  </div>
</section>

<div class="main-content">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-center">Product Id</th>
                <th scope="col" class="text-center">Product Code</th>
                <th scope="col" class="text-center">Product Name</th>
                <th scope="col" class="text-center">Category</th>
                <th scope="col" class="text-center"> Add Sub product</th>
                <th scope="col" class="text-center"> Add Rule Setup</th>
              </tr>
        </thead>
        <tbody>
          <tr>
           
            <td class="text-center">1</td>
            <td class="text-center">101000000</td>
            <td class="text-center">Payble Account</td>
            <td class="text-center">Liabiites</td>
            <td class="text-center"> <i class="material-icons">add_box</i></i>SubACC</td>
            <td class="text-center"><i class="material-icons">add_box</i>SubACC</td>
            
          </tr>
          <tr>
           
           <td class="text-center">1</td>
            <td class="text-center">101000000</td>
            <td class="text-center">Payble Account</td>
            <td class="text-center">Liabiites</td>
            <td class="text-center"> <i class="material-icons">add_box</i></i>SubACC</td>
            <td class="text-center"><i class="material-icons">add_box</i>SubACC</td>
           
          </tr>
          <tr>
           
           <td class="text-center">1</td>
            <td class="text-center">101000000</td>
            <td class="text-center">Payble Account</td>
            <td class="text-center">Liabiites</td>
            <td class="text-center"> <i class="material-icons">add_box</i></i>SubACC</td>
            <td class="text-center"><i class="material-icons">add_box</i>SubACC</td>

          </tr>
          <tr>
           
           <td class="text-center">1</td>
            <td class="text-center">101000000</td>
            <td class="text-center">Payble Account</td>
            <td class="text-center">Liabiites</td>
            <td class="text-center"> <i class="material-icons">add_box</i></i>SubACC</td>
            <td class="text-center"><i class="material-icons">add_box</i>SubACC</td>
            
          </tr>
          <tr>
           
           <td class="text-center">1</td>
            <td class="text-center">101000000</td>
            <td class="text-center">Payble Account</td>
            <td class="text-center">Liabiites</td>
            <td class="text-center"> <i class="material-icons">add_box</i></i>SubACC</td>
            <td class="text-center"><i class="material-icons">add_box</i>SubACC</td>
           
          </tr>
          <tr>
           
           <td class="text-center">1</td>
            <td class="text-center">101000000</td>
            <td class="text-center">Payble Account</td>
            <td class="text-center">Liabiites</td>
            <td class="text-center"> <i class="material-icons">add_box</i></i>SubACC</td>
            <td class="text-center"><i class="material-icons">add_box</i>SubACC</td>
           
          </tr>
         
        </tbody>
      </table>

</div>
@endsection