$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function() {
    $('.js-switchs').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
        $.ajax({
            type:"GET",
            dataType: "json",
            url: '/fallacie/confirmation',
            data: {'status': status, 'id': id},
            success: function(data){
                console.log(data.message);
            //   console.log(data.success)
            },
            error:function(data)
            {
                console.log(data.responseText);
            }
        });
    })
});

// publication
$(function () {
    
    var table = $('.publication-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/publication",
        initComplete: function(data){
            console.log(data);
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'publication', name: 'publication'},
            {data: 'domain', name: 'domain'},
            {data: 'country', name: 'country'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });

// rss-table

  $(function () {
    var table = $('.rssfeed-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/rssfeed",
        initComplete: function(data){
            console.log(data);
        },
        columns: [
            {data: 'DT_RowIndex'},
            {data: 'feed_address'},
            {data: 'description'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
//   fallacy

$(function(){
 var table = $('.fallacy-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "/fallacie",
    initComplete: function(data)
    {
        console.log(data);
    },
    columns: [
        {data: "DT_RowIndex"},
        {data: "fallacy"},
        {data: "code"},
        {data: "description"},
        {
            data:'action',
            name:'action',
            orderable:true
        },
    ]
 });
});
//   Author

$(function(){
 var table = $('.author-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "/author/all",
    initComplete: function(data)
    {
        console.log(data);
    },
    columns: [
        {data: "id"},
        {data: "author_name"},
        {data: "nationality"},
        {
            data:'action',
            name:'action',
            orderable:true,
            searchable:true
        },
    ]
 });
});

// blocked ip

$(function(){
 var table = $('.blocked-ip').DataTable({
    processing: true,
    serverSide:true,
    ajax: "/blocked-ip",
    initComplete:function(data)
    {
        console.log(data);
    },
    columns: [
        {data: "DT_RowIndex"},
        {data: "ip"},
        {
            data: 'action',
            name: 'action',
            orderable:true,
            searchable:true
        },
    ]
 });
});

$(function(){
    var table = $('#art-fall').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/fallacie-article",
        initComplete:function(data){
            console.log(data);
        },
        columns: [
            {data: "DT_RowIndex"},
            {data:"article_id", name:"article_id"},
            {data:"fallacy_statement", name:"fallacy_statement"},
            {data:"users", name:"users"},
            {data:"fallacies", name:"fallacies"},
            {
                data:"confirmation", 
                name:"confirmation",
                orderable:true,
                searchable:true
            },
        ]
        
    });
});
