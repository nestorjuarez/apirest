@extends('layouts.labase')


@section('content')



<table class="table" id='myTables'>
    <thead>
      <tr>
        <th>#Id</th>
        <th>FirstName</th>
        <th>LastName</th>
      </tr>
    </thead>
   
  </table>
@endsection

<script>
  jQuery(function(){
      $('#myTables').DataTable();
  });
</script>