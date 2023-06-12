@extends('layouts.Backend.app')

@section('content')
<section>
  <div class="container">
      <div class="card text-center">
          <div class="card-header">
              <h6>Menu Setup</h6>
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
         
        </thead>
        <tbody>
          <tr>
           
            <td>Organization Id</td>
            <td class="text-left">101</td>
            
          </tr>
          <tr>
           
            <td>Product Code</td>
            <td>10</td>
           
          </tr>
          <tr>
           
            <td>Product Name</td>
            <td>Monthly Deposit</td>
          
          </tr>
          <tr>
           
            <td>Product Category</td>
            <td>Deposit</td>
            
          </tr>
          <tr>
           
            <td>Product type</td>
            <td>Reciring Deposit</td>
           
          </tr>
          <tr>
           
            <td>Cheque Instrument Facility</td>
            <td>No</td>
          
          </tr>
        </tbody>
      </table>

</div>
@endsection