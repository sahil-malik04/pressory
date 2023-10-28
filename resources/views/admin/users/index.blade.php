@extends('layouts.admin')
<link href="{{ asset('assets/aggrid-css/ag-grid.css') }}" rel="stylesheet">
<link href="{{ asset('assets/aggrid-css/ag-theme-alpine.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/ag-grid/ag-grid.js') }}"></script>
@section('content')
<div class="right_col" role="main">
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h2 class="text-left font-weight-bold label label-default">Users</h2>
      </div>
    </div>
    <div id="myGrid-users" class="ag-theme-alpine" style="height:auto"></div>
  </div> 
</div>          
    

<script type="text/javascript" charset="utf-8">
var hashValueGetter = function (params) {
  return params.node ? params.node.rowIndex+1 : null;
};

var hasDateValueGetter =  function(params){
  return params.data ? moment(params.data.created_at).format('DD/MM/YYYY') : '';

  // return params.data ? moment(params.data.created_at).format(' MMMM D,  YYYY') : '';
}

// specify the columns
agGrid.LicenseManager.setLicenseKey('CompanyName=Pressory,LicensedApplication=Pressory,LicenseType=SingleApplication,LicensedConcurrentDeveloperCount=1,LicensedProductionInstancesCount=0,AssetReference=AG-026074,ExpiryDate=6_March_2023_[v2]_MTY3ODA2MDgwMDAwMA==35313d3bc79f875d0220cfce40b29f1c');
const columnDefs = [
    {
      headerName: '#',
      maxWidth: 100,
      valueGetter: hashValueGetter,
      sortable: true, filter: false,resizable:true
      ,floatingFilter: true,suppressMenu: true
    },
    { field: "first_name",headerName:'First Name', filter: true,resizable:true,floatingFilter: true,suppressMenu: true},
    { field: "last_name",headerName:'Last Name', sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true},
    { field: "email",headerName:'Email', sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true},
    { field: "created_at",headerName:'Create Date', valueGetter: hasDateValueGetter,sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true},

    
    
    ];

// let the grid know which columns to use
const gridOptions = {
    columnDefs: columnDefs,
    groupSelectsChildren: true,
    rowSelection: 'multiple',
    paginationAutoPageSize:true,
    pagination: true,
    paginationPageSize: 10, //pagesize
    defaultColDef: {
        flex: 1,
        minWidth: 100,
        // allow every column to be aggregated
        enableValue: true,
        // allow every column to be grouped
        enableRowGroup: true,
        // allow every column to be pivoted
        enablePivot: true,
        sortable: true,
        filter: true,
    },
        
    };
        
        
    // function onPageSizeChanged() {
    //     var value = document.getElementById('page-size').value;
    //     gridOptions.api.paginationSetPageSize(Number(value));
    // }
        // lookup the container we want the Grid to use
  const eGridDiv = document.querySelector('#myGrid-users');
    
  // create the grid passing in the div to use together with the columns & data we want to use
  new agGrid.Grid(eGridDiv, gridOptions);
  
  // fetch the row data to use and one ready provide it to the Grid via the Grid API
  fetch("/admin/users-list")
  .then(response => response.json())
  .then(data => {
    // console.log(data);
          gridOptions.api.setRowData(data);
        });
        

</script>


@endsection