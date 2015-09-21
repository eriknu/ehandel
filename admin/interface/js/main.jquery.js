$(function(){

	$('#upload-field').change(function(e){
		console.log('fired');
		
	});
	
	$('.delete-img').on('click', function(e){
		e.preventDefault();
		var image = $(this).data('image');
		var postID = $(this).data('post');
		var $button = $(this)
		
		$.post('actions/deleteImage.php', {image: image, postID: postID}, function(data){
			if(data.success){
				$($button).siblings('.featured-image').remove();
				$($button).parents('.image-upload').append('<input name="image" size="30" type="file" id="upload-field" /> ');
				$($button).remove();
			}
			
		});
	});
	

});