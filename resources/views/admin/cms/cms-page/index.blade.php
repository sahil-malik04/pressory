@extends('layouts.admin')
<link href="{{ asset('assets/aggrid-css/ag-grid.css') }}" rel="stylesheet">
<link href="{{ asset('assets/aggrid-css/ag-theme-alpine.css') }}" rel="stylesheet">
<script src="{{ asset('assets/js/ag-grid/ag-grid.js') }}"></script>
@section('content')
<div class="right_col" role="main">
    <div class="conatiner">
       
        <!-- <a href="{{route('cmspage.add')}}" class="btn btn-primary">Add Pages</a> -->
        <div class="row">
            <div class="col-md-10">
                <h2 class="text-left font-weight-bold label label-default">Page</h2>
            </div>
          </div>

          <div id="myGrid" class="ag-theme-alpine" style="height:auto"></div>

    </div>
</div>
<script type="text/javascript" charset="utf-8">
agGrid.LicenseManager.setLicenseKey('CompanyName=Pressory,LicensedApplication=Pressory,LicenseType=SingleApplication,LicensedConcurrentDeveloperCount=1,LicensedProductionInstancesCount=0,AssetReference=AG-026074,ExpiryDate=6_March_2023_[v2]_MTY3ODA2MDgwMDAwMA==35313d3bc79f875d0220cfce40b29f1c');
// specify the columns
var hashValueGetter = function (params) {
  return params.node ? params.node.rowIndex + 1 : null;
};
const columnDefs = [
    { field: "#", valueGetter:hashValueGetter, sortable: true, filter: false,resizable:true,floatingFilter: true,suppressMenu: true },
    { field: "title", headerName:'Title', sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true},
    { field: "meta_content", headerName:'Meta Content', sortable: true, filter: true,resizable:true,floatingFilter: true,suppressMenu: true},
        
    { field: '', cellRenderer: 'btnCellRenderer', cellRendererParams: {
                    clicked: function() {
                    window.location.href="/admin/cms-page/edit/"+this.data.id;
                }
            },
        },
        { field: '', cellRenderer: 'delBtnRenderer', cellRendererParams: {
          clicked: function() {
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this data!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
              if (willDelete) {
                window.location.href="/admin/cms-page/delete/"+this.data.id;
                swal("Poof! Your data  has been deleted!", {
                  icon: "success",
                });
              } else {
                swal("Your data is safe!", {
                  icon: "error"
                });
              }
            });
                      
          }
        },
        // alert(this.data.id);
      },
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
        components: {
            btnCellRenderer: BtnCellRenderer,
            delBtnRenderer: delBtnRenderer,
        }
    };
        
        
    // function onPageSizeChanged() {
    //     var value = document.getElementById('page-size').value;
    //     gridOptions.api.paginationSetPageSize(Number(value));
    // }
        // lookup the container we want the Grid to use
  const eGridDiv = document.querySelector('#myGrid');
    
  // create the grid passing in the div to use together with the columns & data we want to use
  new agGrid.Grid(eGridDiv, gridOptions);
  
  // fetch the row data to use and one ready provide it to the Grid via the Grid API
  fetch("/admin/cms-page/list")
  .then(response => response.json())
  .then(data => {
          gridOptions.api.setRowData(data);
        });
        


function BtnCellRenderer() {}

BtnCellRenderer.prototype.init = function(params) {
    this.params = params;
    
    this.eGui = document.createElement('div');
    this.eGui.innerHTML = '<i class="fa fa-pencil"></i>';
    
    this.btnClickedHandler = this.btnClickedHandler.bind(this);
    this.eGui.addEventListener('click', this.btnClickedHandler);
    
}

BtnCellRenderer.prototype.getGui = function() {
  return this.eGui;
}

BtnCellRenderer.prototype.destroy = function() {
  this.eGui.removeEventListener('click', this.btnClickedHandler);
}

BtnCellRenderer.prototype.btnClickedHandler = function(event) {
  this.params.clicked(this.params.value);
}
// Delete Button
function delBtnRenderer() {}

delBtnRenderer.prototype.init = function(params) {
    this.params = params;
    
    this.eGui = document.createElement('div');
    this.eGui.innerHTML = '<i class="fa fa-close"></i>';
    
    this.btnClickedHandler = this.btnClickedHandler.bind(this);
    this.eGui.addEventListener('click', this.btnClickedHandler);
    
}

delBtnRenderer.prototype.getGui = function() {
  return this.eGui;
}

delBtnRenderer.prototype.destroy = function() {
  this.eGui.removeEventListener('click', this.btnClickedHandler);
}

delBtnRenderer.prototype.btnClickedHandler = function(event) {
  this.params.clicked(this.params.value);
}

</script>
@endsection