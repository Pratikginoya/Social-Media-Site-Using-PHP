	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="js/main.min.js"></script>
	<script src="js/strip.pkgd.min.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/map-init.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>

	<!-- ECharts -->
    <script src="js/echarts.min.js"></script>
    <script src="js/world.js"></script>
	<script src="js/custom.js"></script>

	<script type="text/javascript">


		var cmt="";

	function get_cmt(id)
	{
		 cmt = document.getElementsByClassName('cmt')[id].value;

			// alert(cmt);
	}

	function get_timeline_cmt(id)
	{
		 cmt = document.getElementsByClassName('timeline_cmt')[id].value;

			// alert(cmt);
	}
		
	$(document).ready(function(){

		$('.add_friend').click(function(){

			var id = $(this).attr('attr_id');

			// alert(id);
			$.ajax({

				type: 'get',
				url: 'ajax/add_friend.php',
				data: {'a_id':id},

				success:function(res)
				{
					$('#display_friend').html(res);
				}
			});
		});

		$('.cancel_request').click(function(){

			var id = $(this).attr('attr_id');

			$.ajax({

				type: 'get',
				url: 'ajax/add_friend.php',
				data: {'c_id':id},

				success:function(res)
				{
					$('#display_friend').html(res);
				}
			})
		});

		$('.delete_request').click(function(){

			var id = $(this).attr('attr_id');

			$.ajax({

				type: 'get',
				url: 'ajax/add_friend.php',
				data: {'d_id':id},

				success:function(res)
				{
					$('#display_friend').html(res);

					$('html,body').animate({scrollTop:280},'slow');
				}
			});
		});

		$('.confirm_request').click(function(){

			var id = $(this).attr('attr_id');

			$.ajax({

				type: 'get',
				url: 'ajax/add_friend.php',
				data: {'con_id':id},

				success:function(res)
				{
					$('#display_friend').html(res);

					$('html,body').animate({scrollTop:280},'slow');
				}
			});
		});

		$('.unfriend').click(function(){

			var id = $(this).attr('attr_id');

			$.ajax({

				type: 'get',
				url: 'ajax/add_friend.php',
				data: {'un_id':id},

				success:function(res)
				{
					$('#display_friend').html(res);

					$('html,body').animate({scrollTop:280},'slow');
				}
			});
		});

// Comments on home/new feeds-post
		$('.comment').click(function(){

			var post_id = $(this).attr('attr_id_post');
			var cmt_id = $(this).attr('attr_id_cmt');
	
			// alert(post_id);
			// alert(cmt_id);
			// alert(cmt);
		
			if(cmt!='')
			{
			$.ajax({

				url: 'ajax/comment_home.php',
				type: 'post',
				data: 'cmt='+cmt+'&post_id='+post_id+'&cmt_id='+cmt_id,

				success:function(res)
				{
					$('#display_post_comment').html(res);
				}
			});
			}
		});

		$('.delete_home_cmt').click(function(){

			var id = $(this).attr('attr_id');

			// alert(id);

			$.ajax({

				url: 'ajax/comment_home.php',
				type: 'get',
				data: {'cmt_id_d':id},

				success:function(res)
				{
					$('#display_post_comment').html(res);
				}
			});
		});

		$('.edit_home_cmt').click(function(){

			var id = $(this).attr('attr_id');

			// alert(id);

			$.ajax({

				url: 'ajax/comment_home_update.php',
				type: 'get',
				data: {'cmt_id_e':id},
				dataType: 'json',

				success:function(res)
				{
					// $('#display_post_comment').html(res);

					$('#update_cmt_data').val(res.cmt);
					$('#cmt_id').val(res.cmt_id);

					$("#exampleModal").modal("show");
				}
			});
		});

		$('.save_new_cmt').click(function(e){
			e.preventDefault();

			var edit = $('#edited_cmt').serialize();

			// alert(data);
			$.ajax({

				url: 'ajax/comment_home.php',
				type: 'post',
				data: edit,

				success:function(res)
				{
					$('#display_post_comment').html(res);

					$("#exampleModal").modal("hide");
				}
			});
		});

		$('.close_model').click(function(){
			$("#exampleModal").modal("hide");
		});


// Comments on Time-line
		$('.timeline_comment').click(function(){

			var post_id = $(this).attr('attr_id_post_t');
			var cmt_id = $(this).attr('attr_id_cmt_t');
	
			// alert(post_id);
			// alert(cmt_id);
			// alert(cmt);
		
			if(cmt!='')
			{
			$.ajax({

				url: 'ajax/comment_timeline.php',
				type: 'post',
				data: 'cmt='+cmt+'&post_id='+post_id+'&cmt_id='+cmt_id,

				success:function(res)
				{
					$('#display_post_timeline_comment').html(res);
				}
			});
			}
		});

		$('.delete_timeline_cmt').click(function(){

			var id = $(this).attr('attr_id');

			// alert(id);

			$.ajax({

				url: 'ajax/comment_timeline.php',
				type: 'get',
				data: {'cmt_id_d':id},

				success:function(res)
				{
					$('#display_post_timeline_comment').html(res);
				}
			});
		});

		$('.edit_timeline_cmt').click(function(){

			var id = $(this).attr('attr_id');

			// alert(id);

			$.ajax({

				url: 'ajax/comment_home_update.php',
				type: 'get',
				data: {'cmt_id_e':id},
				dataType: 'json',

				success:function(res)
				{
					// $('#display_post_comment').html(res);

					$('#update_cmt_data_t').val(res.cmt);
					$('#cmt_id_t').val(res.cmt_id);

					$("#exampleModal2").modal("show");
				}
			});
		});

		$('.save_new_cmt_t').click(function(e){
			e.preventDefault();

			var edited_data = $('#edited_cmt_timeline').serialize();

			$.ajax({

				url: 'ajax/comment_timeline.php',
				type: 'post',
				data: edited_data,

				success:function(res)
				{
					$('#display_post_timeline_comment').html(res);

					$("#exampleModal2").modal("hide");
				}
			});
		});


// Comments on Other's Time-line
		$('.timeline_comment_v').click(function(){

			var post_id = $(this).attr('attr_id_post_t');
			var cmt_id = $(this).attr('attr_id_cmt_t');
			var attr_id = $(this).attr('attr_id');
	
			// alert(post_id);
			// alert(cmt_id);
			// alert(cmt);
			// alert(attr_id);
		
			if(cmt!='')
			{
			$.ajax({

				url: 'ajax/comment_timeline.php',
				type: 'post',
				data: 'cmt='+cmt+'&post_id='+post_id+'&cmt_id='+cmt_id+'&v_id='+attr_id,

				success:function(res)
				{
					$('#display_post_timeline_comment').html(res);
				}
			});
			}
		});

		$('.delete_timeline_cmt_v').click(function(){

			var id = $(this).attr('attr_id');
			var id_v = $(this).attr('attr_id_v');

			// alert(id);
			// alert(id_v);

			$.ajax({

				url: 'ajax/comment_timeline.php',
				type: 'post',
				data: 'cmt_id_d='+id+'&v_id='+id_v,

				success:function(res)
				{
					$('#display_post_timeline_comment').html(res);
				}
			});
		});


		$('.edit_timeline_cmt_v').click(function(){

			var id = $(this).attr('attr_id');

			// alert(id);

			$.ajax({

				url: 'ajax/comment_home_update.php',
				type: 'get',
				data: {'cmt_id_e':id},
				dataType: 'json',

				success:function(res)
				{
					// $('#display_post_comment').html(res);

					$('#update_cmt_data_t').val(res.cmt);
					$('#cmt_id_t').val(res.cmt_id);

					$("#exampleModal2").modal("show");
				}
			});
		});

		$('.save_new_cmt_t').click(function(e){
			e.preventDefault();

			var edited_data = $('#edited_cmt_timeline').serialize();

			$.ajax({

				url: 'ajax/comment_timeline.php',
				type: 'post',
				data: edited_data,

				success:function(res)
				{
					$('#display_post_timeline_comment').html(res);

					$("#exampleModal2").modal("hide");
				}
			});
		});


// Add friend through other's timeline
		$('.add_friend_check').click(function(){

			var id = $(this).attr('attr_id');
			var id2 = $(this).attr('attr_id2');

			// alert(id);
			// alert(id2);
			$.ajax({

				type: 'get',
				url: 'ajax/add_friend_check.php',
				data: {'a_id':id,'v_id':id2},

				success:function(res)
				{
					$('#display_friend_check').html(res);
				}
			});
		});

// cancel request friend through other's timeline
		$('.cancel_request_check').click(function(){

			var id = $(this).attr('attr_id');
			var id2 = $(this).attr('attr_id2');

			$.ajax({

				type: 'get',
				url: 'ajax/add_friend_check.php',
				data: {'c_id':id,'v_id':id2},

				success:function(res)
				{
					$('#display_friend_check').html(res);
				}
			})
		});

		
// Message view
		$('.message_send').submit(function(e){
			e.preventDefault();

			var msg = $('.message_send').serialize();

			// alert(msg);

			$.ajax({

				type: 'post',
				url: 'ajax/message_view.php',
				data: msg,

				success:function(res)
				{
					$('#messages_data').html(res);
					// $('#messages_data').animate({scrollTop: 100000000000}, 'slow');
					$('#msg').val('');
				}
			});
		});
	});


	</script>
</body>	

</html>