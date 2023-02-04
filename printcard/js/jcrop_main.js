jQuery(document).ready(function(){


	jQuery('#postpreview').submit(function(){
	
		jQuery.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				alert('Crop Finished');
				
			}
		})
		return false;
	
	
	
	
	});
	
	
	
	
	
    // for sample 1
    jQuery('.cropaja').Jcrop({ // we linking Jcrop to our image with id=cropbox1
        aspectRatio: 0,
        onChange: updateCoords,
        onSelect: updateCoords
    });

    



   
    


});

function updateCoords(c) {
    jQuery('#x').val(c.x);
    jQuery('#y').val(c.y);
    jQuery('#w').val(c.w);
    jQuery('#h').val(c.h);

   jQuery('#x2').val(c.x2);
    jQuery('#y2').val(c.y2);


    var rx = 56.692913386 / c.w; // 200 - preview box size
    var ry = 75.590551181 / c.h;

    jQuery('#previewphoto').css({
        width: Math.round(rx * 240) + 'px',
        height: Math.round(ry * 240) + 'px',
        marginLeft: '-' + Math.round(rx * c.x) + 'px',
        marginTop: '-' + Math.round(ry * c.y) + 'px'
    });
};



function checkCoords() {

    if (parseInt(jQuery('#w').val())){
	return true;
	}else{
    alert('Please select a crop region then press submit.');
    return false;
	}
};

function printCoords(){

	jQuery("#layoutcard").printElement({printBodyOptions:{
				styleToAdd:'padding:0px;margin:0px;float:left;clear:both;',
				classNameToAdd : 'thisWillBeTheClassUsedAsWell'
				},printMode:'popup',pageTitle:'', overrideElementCSS:[
			'css/printcardnormal.css',
			{ href:'css/printcardprint.css',media:'print'}],
	leaveOpen:true});


};