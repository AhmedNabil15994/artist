"use strict";
var KTDatatablesAdvancedMultipleControls = function() {

	var init = function() {
		var table = $('#kt_datatable');

		// begin first table
		var DataTable = table.DataTable({
			// DOM Layout settings
			dom:'Bfrtip',
			dom:
				"<'row'<'col-xs-12 col-sm-6 col-md-6'l><'col-xs-12 col-sm-6 col-md-6 text-right'Bf>>" +
				"<'row'<'col-xs-6 col-sm-6 col-md-6'i><'col-xs-6 col-sm-6 col-md-6'p>> " +
				"<'row'<'col-sm-12 'tr>>" +
				"<'row'<'col-xs-4 col-sm-6 col-md-6 'l><'col-xs-8 col-sm-6 col-md-6  text-right'f>>" +
				"<'row'<'col-xs-6 col-sm-6 col-md-6 'i><'col-xs-6 col-sm-6 col-md-6 'p>>", // read more: https://datatables.net/examples/basic_init/dom.html
	        buttons: [
	            {
	                extend: 'colvis',
	                columns: ':not(.noVis)',
	                text: "<i class='fa fas fa-angle-down'></i> عرض الأعمدة",
	            },
	            {
	             	extend: 'print',
	             	customize: function (win) {
                       $(win.document.body).css('direction', 'rtl');     
                    },
 					'exportOptions': {
				    	columns: ':not(:last-child)',
				  	},
	         	},
	         	{
	             	extend: 'copy',
 					'exportOptions': {
				    	columns: ':not(:last-child)',
				  	},
	         	},
	         	{
	             	extend: 'excel',
 					'exportOptions': {
				    	columns: ':not(:last-child)',
				  	},
	         	},
	         	{
	             	extend: 'csv',
 					'exportOptions': {
				    	columns: ':not(:last-child)',
				  	},
	         	},
	         	{
	             	extend: 'pdf',
 					'exportOptions': {
				    	columns: ':not(:last-child)',
				  	},
	         	},
	        ],
	        oLanguage: {
				sSearch: "  البحث: ",
				sInfo: 'يتم العرض من  _START_ الي _END_ (العدد الكلي للسجلات _TOTAL_ )',
				sLengthMenu: 'عرض _MENU_ سجلات',
				sEmptyTable: "لا يوجد نتائج مسجلة",
				sProcessing: "جاري التحميل",
				sInfoEmpty: "لا يوجد نتائج مسجلة",
				select:{
					rows: {
                    	_: "لقد قمت باختيار %d عناصر",
	                    0: "",
	                    1: "لقد قمت باختيار عنصر واحد"
	                }
				}
			},
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: '/ATAdmin/userCards',
				type: 'GET',
				data:function(dtParms){
			       	dtParms.status = $('select[name="status"]').val();
			       	dtParms.membership_id = $('select[name="membership_id"]').val();
			       	dtParms.start_date = $('input[name="start_date"]').val();
			       	dtParms.end_date = $('input[name="end_date"]').val();
			        dtParms.columnsDef= [
						'id', 'code' ,'image','identity_image','identity_no','identity_end_date','deliver_no','membership_name','start_date','end_date','statusText'];
			        return dtParms
			    }
			},
			columns: [
				{data: 'id'},
				{data: 'code'},
				{data: 'image'},
				{data: 'identity_image'},
				{data: 'identity_no'},
				{data: 'identity_end_date'},
				{data: 'deliver_no'},
				{data: 'start_date'},
				{data: 'id', responsivePriority: -1},
			],
			
			columnDefs: [
				{
					targets:0,
					orderable: false,
				},
				{
					targets: 1,
					title: 'الكود',
					className: '',
					render: function(data, type, full, meta) {
						return '<a class="" data-col="code" data-id="'+full.id+'">'+data+'</a>';
					},
				},
				{
					targets: 2,
					title: 'الصورة الشخصية',
					render: function(data, type, full, meta) {
						var myElem= '<span class="label label-danger label-pill label-inline">لا يوجد</span>';
						if(data != ''){
							myElem = '<div class="my-gallery" itemscope="" itemtype="" data-pswp-uid="1">'+
                            		'<figure itemprop="associatedMedia" itemscope="" itemtype="">'+
                               			'<a href="'+data+'" itemprop="contentUrl" data-size="555x370">'+
                                    		'<img src="'+data+'" class="topics-img">'+
                                		'</a>'+
                                		'<img src="'+data+'" itemprop="thumbnail" style="display: none;">'+
                            		'</figure>'+
                        		'</div>';
						}
						return myElem;
					},
				},
				{
					targets: 3,
					title: 'صورة الهوية',
					render: function(data, type, full, meta) {
						var myElem= '<span class="label label-danger label-pill label-inline">لا يوجد</span>';
						if(data != ''){
							myElem = '<div class="my-gallery" itemscope="" itemtype="" data-pswp-uid="1">'+
                            		'<figure itemprop="associatedMedia" itemscope="" itemtype="">'+
                               			'<a href="'+data+'" itemprop="contentUrl" data-size="555x370">'+
                                    		'<img src="'+data+'" class="topics-img">'+
                                		'</a>'+
                                		'<img src="'+data+'" itemprop="thumbnail" style="display: none;">'+
                            		'</figure>'+
                        		'</div>';
						}
						return myElem;
					},
				},
				{
					targets: 4,
					title: 'رقم الهوية',
					className: 'edits',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="identity_no" data-id="'+full.id+'">'+data+'</a>';
					},
				},
				{
					targets: 5,
					title: 'تاريخ انتهاء الهوية',
					className: 'edits dates',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="identity_end_date" data-id="'+full.id+'">'+data+'</a>';
					},
				},
				{
					targets: 6,
					title: 'رقم الشحنة',
					className: 'edits',
					render: function(data, type, full, meta) {
						return '<a class="editable" data-col="deliver_no" data-id="'+full.id+'">'+data+'</a>';
					},
				},
				{
					targets: 7,
					title: 'الحالة',
					className: 'edits selects',
					render: function(data, type, full, meta) {
						var labelText = '';
						if(full.status == 0){
							labelText = 'dark';
						}else if(full.status == 1){
							labelText = 'success';
						}else if(full.status == 2){
							labelText = 'warning';
						}else if(full.status == 3){
							labelText = 'danger';
						}else{
							return '<a class="dis" data-col="" data-id="'+full.id+'"><label class="btn btn-wide btn-inline">'+data+'</label></a>';
						}
						return '<a class="editable" data-col="status" data-id="'+full.id+'"><label class="btn btn-wide btn-inline btn-'+labelText+'">'+data+'</label></a>';
					},
				},
				{
					targets: -1,
					title: 'الاجراءات',
					orderable: false,
					render: function(data, type, full, meta) {
						var deleteButton = '';
						var newMembButton = '';
						var editButton = '';

						if($('input[name="data-area"]').val() == 1){
							editButton = '<a href="/ATAdmin/userCards/edit/'+data+'" class="dropdown-item">'+
		                                    '<i class="m-nav__link-icon fa fa-pencil-alt"></i>'+
		                                    '<span class="m-nav__link-text">تعديل</span>'+
		                                '</a>';
						}

						if($('input[name="data-cols"]').val() == 1){
							deleteButton = '<a href="#" class="dropdown-item" onclick="deleteItem('+data+')">'+
		                                    '<i class="m-nav__link-icon fa fa-trash"></i>'+
		                                    '<span class="m-nav__link-text">حذف</span>'+
		                                '</a>';
						}
						if(full.status == 2){
							newMembButton = '<a href="#" class="dropdown-item newMemb" data-cols="'+full.order_id+'" data-image="'+full.image+'" data-identity_no="'+full.identity_no+'" data-identity_end_date="'+full.identity_end_date+'" data-identity_image="'+full.identity_image+'" >'+
		                                    '<i class="m-nav__link-icon far fa-credit-card"></i>'+
		                                    '<span class="m-nav__link-text">تصدير العضوية</span>'+
		                                '</a>';
						}
						return '<div class="main-menu dropdown dropdown-inline">'+
		                            '<button type="button" class="btn btn-light-primary btn-icon btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
		                                '<i class="ki ki-bold-more-hor"></i>'+
		                            '</button>'+
		                            '<div class="dropdown-menu" dropdown-toggle="hover">'+
		                                newMembButton+
		                                '<a href="/ATAdmin/userCards/'+full.id+'/viewCard" class="dropdown-item">'+
		                                    '<i class="m-nav__link-icon far fa-credit-card"></i>'+
		                                    '<span class="m-nav__link-text">طباعة العضوية</span>'+
		                                '</a>'+
		                                editButton+
		                                deleteButton+
		                            '</div>'+
		                        '</div>';
					},
				},
			],
		});

		if ($("#m_search")[0]) {
		    $("#m_search").on("click", function (t) {
		        t.preventDefault();
		        var e = {};
		        $(".m-input").each(function () {
		            var a = $(this).data("col-index");
		            e[a] ? e[a] += "|" + $(this).val() : e[a] = $(this).val();
		        }), $.each(e, function (t, e) {
		            DataTable.column(t).search(e || "", !1, !1);
		        }), DataTable.table().draw();
		    });
		}
		if ($("#m_reset")[0]) {
		    $("#m_reset").on("click", function (t) {
		        t.preventDefault(), $(".m-input").each(function () {
		            $(this).val(""), DataTable.column($(this).data("col-index")).search("", !1, !1);
		        }), DataTable.table().draw();
		    });
		}
	};

	return {
		//main function to initiate the module
		init: function() {
			init();
		}
	};

}();

jQuery(document).ready(function() {
	KTDatatablesAdvancedMultipleControls.init();

	$(document).on('click','.newMemb',function(e){
		e.preventDefault();
		e.stopPropagation();
		var id = $(this).data('cols');
		var image = $(this).data('image');
		var identity_no = $(this).data('identity_no');
		var identity_end_date = $(this).data('identity_end_date');
		var identity_image = $(this).data('identity_image');
		$('#newMemberModal').modal('toggle');
		$('#newMemberModal img.image').attr('src',image);
		$('#newMemberModal input.identity_no').val(identity_no);
		$('#newMemberModal input.identity_end_date').val(identity_end_date);
		$('#newMemberModal img.identity_image').attr('src',identity_image);
		$('#newMemberModal .btn-success').data('cols',id);
	});

	$('#newMemberModal .btn-success').on('click',function(e){
		e.preventDefault();
		e.stopPropagation();
		var id = $(this).data('cols');
		var deliver_no = $('#newMemberModal input.deliver_no').val();
		if(deliver_no){
			$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
	        $.ajax({
	            type: 'POST',
	            url: myURL+'/newMember',
	            data:{
	                '_token': $('meta[name="csrf-token"]').attr('content'),
	                'id': id,
	                'deliver_no': deliver_no,
	            },
	            success:function(data){
	                if(data.status.status == 1){
	                    successNotification(data.status.message);
	                    setTimeout(function(){
	                    	$('#newMemberModal').modal('hide');
	                    	location.reload();
	                    },2500)
	                }else{
	                    errorNotification(data.status.message);
	                }
	            },
	        });
		}
	})

});
