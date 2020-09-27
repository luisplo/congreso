@extends('layouts.admin')
@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

@component('components.datatable')
@slot('titleDT')
<h1>Titulo del Datatable</h1>
@endslot
@slot('theadDT')
<tr>
    <th>Name</th>
</tr>
@endslot
@slot('tfootDT')
<tr>
    <th>Name</th>
</tr>
@endslot
@slot('tbodyDT')
<tr>
    <td>Pepe</td>
</tr>
@endslot
@endcomponent

@endsection