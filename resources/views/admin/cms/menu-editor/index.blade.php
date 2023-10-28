@extends('layouts.admin')

@section('content')
<div class="right_col" role="main">
    <div class="container">
         <div class="row">
            <div class="col-md-10">
                <h2 class="text-left font-weight-bold label label-default">Menu</h2>
            </div>
          </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="text-center">Menu</h5>
                    </div>
                    <div class="card-body">
                        <ul id="myEditor" class="sortableLists list-group">
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <!-- <button id="btnOut" type="button" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> Output</button>
                </div>
                <div class="form-group"><textarea id="out" class="form-control" cols="50" rows="10"></textarea> -->
                    <button type="button" class="btn btn-outline-info save"><i class="glyphicon glyphicon-ok"></i> Save</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">Add Menu</div>
                    <div class="card-body">
                        <form id="frmEdit" class="form-horizontal">
                            <div class="form-group">
                                <label for="text">Title</label>
                                <div class="input-group">
                                    <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
                                    
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="target">Target</label>
                                <select name="target" id="target" class="form-control item-menu">
                                <option value="_self">Self</option>
                                <option value="_blank">Blank</option>
                                <option value="_top">Top</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="href">URL</label>
                                <input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL">
                            </div>
                            <div class="text-center">(or)</div>
                            <div class="form-group">
                                <label for="target">Page</label>
                                <select name="page" id="page" class="form-control item-menu">
                                    @foreach($list as $lists)    
                                    <option value="{{$lists->slug}}">{{$lists->title}}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="button" id="btnUpdate" class="btn btn-outline-primary" disabled><i class="fas fa-sync-alt"></i> Update</button>
                        <button type="button" id="btnAdd" class="btn btn-outline-success"><i class="fas fa-plus"></i> Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    jQuery(document).ready(function () {
        var arrayjson = {!! $menu !!};

        // icon picker options
        var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
        // sortable list options
        var sortableListOptions = {
            placeholderCss: {'background-color': "#cccccc"}
        };

        var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
        editor.setForm($('#frmEdit'));
        editor.setUpdateButton($('#btnUpdate'));
        $(function () {
            // console.log(arrayjson);
            editor.setData(arrayjson);
        });

        $('#btnOutput').on('click', function () {
            var str = editor.getString();
            $("#out").text(str);
        });

        $("#btnUpdate").click(function(){
            editor.update();
        });

        $('#btnAdd').click(function(){
            editor.add();
        });
        /* ====================================== */
        $(document).on('click','.save',function(){

            var data = editor.getString();
            $.ajax({
                type:"POST",
                url: '/admin/menu',
                data: { data:data },
                dataType:'json',
            success: function(data) {
                console.log(data);
            }
            });
        });
        
    });
</script>

@endsection
