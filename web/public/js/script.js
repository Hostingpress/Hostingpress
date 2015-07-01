jQuery(document).ready(function($){
	var IntervalsNew = [], IntervalsDeleted = [];
	$('#dashboardGrid button[data-status="new"]').each(function(el){
		var site = $(this).data('site');
		IntervalsNew[el] = setInterval(function(){
			$.ajax({
				type: "POST",
				url: "/dashboard/"+site+"/check",
				success: function(data){
					if(data&&data.status){
						switch(data.status){
							case 'active':
								clearInterval(IntervalsNew[el]);
								$.pjax.reload({container:'#dashboardGrid'});
								break;
						}
					}
				},
				complete: function(){
				}
			});
		}, 5000);
	});
	$('#dashboardGrid button[data-status="deleted"]').each(function(el){
		var site = $(this).data('site');
		IntervalsDeleted[el] = setInterval(function(){
			$.ajax({
				type: "POST",
				url: "/dashboard/"+site+"/check",
				success: function(data){
					if(!data||!data.status){
						clearInterval(IntervalsDeleted[el]);
						$.pjax.reload({container:'#dashboardGrid'});
					}
				},
				complete: function(){
				}
			});
		}, 5000);
	});
});