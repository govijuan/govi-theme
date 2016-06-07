jQuery(document).ready(function($){
	
	// Logo
	$("input[id='upload_image_logo_button']").click(function(e){
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('_button', '');
		wp.media.editor.send.attachment = function(props, attachment){
		 $('#our-logo-upload').val(attachment.url);
		 wp.media.editor.send.attachment = send_attachment_bkp;
		};
		
		wp.media.editor.open(button);
		return false;
	});
	
	// Favicon
	$("input[id='upload_favicon_button']").click(function(e){
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('_button', '');
		wp.media.editor.send.attachment = function(props, attachment){
			$("#our-favicon-upload").val(attachment.url);
			wp.media.editor.send.attachment = send_attachment_bkp;
		};
		
		wp.media.editor.open(button);
		return false;
	});
	// Favicon
	$("input[id='upload_f_bg_image_button']").click(function(e){
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('_button', '');
		wp.media.editor.send.attachment = function(props, attachment){
			$("#our-featured-bg-img").val(attachment.url);
			wp.media.editor.send.attachment = send_attachment_bkp;
		};
		
		wp.media.editor.open(button);
		return false;
	});
});