$(document).ready(function() {

	/// Start Ajax Requests
	/// Start Ajax Requests
	/// Start Ajax Requests
	{
		var ajaxResult;
		function updateResult (data) {
			ajaxResult = data;
		}
		
		
		//function f() for getting all schools for supporter take parameter id of supporter
		function f1(id) {
			$.ajax({
				type: "get",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				// url:"{{route('getmyschools')}}",
				url:"http://127.0.0.1:8000/getmyschools",
				data: {// change data to this object
					_token : $('meta[name="csrf-token"]').attr('content'),
					data:id
				},
				success: function(response) {
					// console.log(response)
					updateResult(response);
				},
				fail: function(xhr, textStatus, errorThrown){
					alert(errorThrown.toString());
				}

			});
		}

		//function f() for getting all schools for governorate take parameter governoate name
		function f2(govern) {
			$.ajax({
				type: "get",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:"{{route('getgovernschools')}}",
				data: {// change data to this object
					_token : $('meta[name="csrf-token"]').attr('content'),
					data:govern
				},
				success: function(response) {
					updateResult(response)
					return true;
				},
				fail: function(xhr, textStatus, errorThrown){
					alert(errorThrown.toString());
				}
			});
		}
	
		// Ajax request in create new user form 
		// Selecting the schools related to the invistors for the technichal-user
		$('.get-investor-schools').clearQueue().change(function() {
			var investor_id = $(this).val();
			var targeted_element = $(this).data('target');
			var element_type = $(this).data('type');
			
			console.log(targeted_element)
			
			f1(investor_id);
			
			if(element_type == 'table') {
				$('.onfly').remove();
				for(var i=0; i < ajaxResult.length; i++){
					console.log(ajaxResult[i]);
					$(targeted_element).append('<tr class="onfly"> <td class="text-right">'+ajaxResult[i]['id']+'</td> <td class="text-right">'+ajaxResult[i]['name']+'</td> <td class="text-right">'+ajaxResult[i]['governorate']+'</td> <td class="text-right"><input type="checkbox" name="schools[]" value="'+ajaxResult[i]['id']+'" data-checkbox-children="school-lists"></td> </tr>');
				}
			}
			
			
			
		});
	}
	/// End Ajax Requests
	/// End Ajax Requests
	/// End Ajax Requests


	
	
	/// Start Customized Admin
	/// Start Customized Admin
	/// Start Customized Admin
	{
		/**
			This jQuery is for Create Customized admin Account
		**/
		// Show other inputes fields related to the category
		$('#flag-investor').change(function() {
			if($('#flag-investor  option:selected').data('name') == 'investor-client') {
				$('.investors-options').fadeIn(500);
				$('.technichal-support-options').fadeIn(500);
			} else {
				$('.investors-options').fadeOut();
				$('.technichal-support-options').fadeOut(500);
			}

			if($('#flag-investor  option:selected').data('school-option') == 'chosse-schools') {
				$('.select-schools-option').fadeIn(500);
			} else {
				$('.select-schools-option').fadeOut();
			}
		});
		{
			if($('#flag-investor  option:selected').data('name') == 'investor-client') {
				$('.investors-options').fadeIn(500);
				$('.technichal-support-options').fadeIn(500);
			} else {
				$('.investors-options').fadeOut();
				$('.technichal-support-options').fadeOut(500);
			}

			if($('#flag-investor  option:selected').data('school-option') == 'chosse-schools') {
				$('.select-schools-option').fadeIn(500);
			} else {
				$('.select-schools-option').fadeOut();
			}
		}// end :: #flag-investor



		/**
			This jQuery is for Technichal Users profiles
		**/

		/*
		 * # The technichal-user fast search form
		 * show and hide the form based on the select box category
		 * if the value of the selecte box is 'all' the search field and button is hidden
		 */
		$('.user-profile-search-select').change(function() {
			var select_box_val = $(this).val();
			if(select_box_val == 'governorate') {
				$('.user-profile-search-box label').text('حدد الادارة/المحافظة');
				$('.user-profile-search-box input').attr('placeholder', 'حدد الادارة/المحافظة');
				$('.user-profile-search-box').fadeIn();
				$('.user-profile-search .submit-btn').fadeIn();
			} else if(select_box_val == 'rate') {
				$('.user-profile-search-box label').text('حدد التقيم');
				$('.user-profile-search-box input').attr('placeholder', 'حدد الادارة/المحافظة');
				$('.user-profile-search-box').fadeIn();
				$('.user-profile-search .submit-btn').fadeIn();
			} else {
				$('.user-profile-search-box').fadeOut();
				$('.user-profile-search .submit-btn').fadeOut();
			}
		});
		{
			var select_box_val = $('.user-profile-search-select').val();
			if(select_box_val == 'governorate') {
				$('.user-profile-search-box label').text('حدد الادارة/المحافظة');
				$('.user-profile-search-box input').attr('placeholder', 'حدد الادارة/المحافظة');
				$('.user-profile-search-box').fadeIn();
				$('.user-profile-search .submit-btn').fadeIn();
			} else if(select_box_val == 'rate') {
				$('.user-profile-search-box label').text('حدد التقيم');
				$('.user-profile-search-box input').attr('placeholder', 'حدد الادارة/المحافظة');
				$('.user-profile-search-box').fadeIn();
				$('.user-profile-search .submit-btn').fadeIn();
			} else {
				$('.user-profile-search-box').fadeOut();
				$('.user-profile-search .submit-btn').fadeOut();
			}
		}// end :: .user-profile-search-select
	}
	/// End Customized Admin
	/// End Customized Admin
	/// End Customized Admin




	/// Start School
	/// Start School
	/// Start School
	{
		/**
			This jQuery is for creating_new_school Page
		**/
		$('input[name=created_way_option]').click(function() {
			var tmp = $(this).val();
			if(tmp == 'option1') {
				$('.created_way_select_options').hide(500).attr('name', '');
				$('.created_way_option1').show(500).attr('name', 'created_way');
			} else if (tmp == 'option2') {
				$('.created_way_select_options').hide(500).attr('name', '');
				$('.created_way_option2').show(500).attr('name', 'created_way');
			} else if (tmp == 'option3') {
				$('.created_way_select_options').hide(500).attr('name', '');
				$('.created_way_option3').attr('name', 'created_way');
			} else if (tmp == 'option4') {
				$('.created_way_select_options').hide(500).attr('name', '');
				$('.created_way_option4').show(500).attr('name', 'created_way')
			}
		});
		{
			var tmp = $('input[name=created_way_option]:checked').val()
			if(tmp == 'option1') {
				$('.created_way_select_options').hide(500).attr('name', '');
				$('.created_way_option1').show(500).attr('name', 'created_way');
			} else if (tmp == 'option2') {
				$('.created_way_select_options').hide(500).attr('name', '');
				$('.created_way_option2').show(500).attr('name', 'created_way');
			} else if (tmp == 'option3') {
				$('.created_way_select_options').hide(500).attr('name', '');
				$('.created_way_option3').attr('name', 'created_way');
			} else if (tmp == 'option4') {
				$('.created_way_select_options').hide(500).attr('name', '');
				$('.created_way_option4').show(500).attr('name', 'created_way');
				$('.created_way_option4').attr('name', 'created_way');
			}
		}// end :: input[name=created_way_option]

		/**
			This jQuery is for school_profile
		**/
		// school-books managment system
		// id & inputs form sharing
		// This code used in the library management system the update form
		// It uses a special class and data attributes to find book row, then edit the update form
		// it fills the update form with the book data and replace the book id in the action url
		$('.school-book-action').click(function() {
			var book_action_model = $(this).data('target');
			var book_id = $(this).data('book-id');
			var form_action = $(book_action_model + ' form').attr('action');

			lastindex = form_action.lastIndexOf('/');
			new_form_action = form_action.slice(0, lastindex+1) + book_id;
			$(book_action_model + ' form').attr('action', new_form_action);

			console.log(new_form_action);

			// Put the book data into the fields of forms edit
			$(book_action_model + ' input[name=id]').val(book_id)
			$(book_action_model + ' input[name=name]').val($(this).data('name'))
			$(book_action_model + ' input[name=category]').val($(this).data('category'))
			$(book_action_model + ' input[name=supplier]').val($(this).data('supplier'))

		});// end :: .school-book-action


		/**
			New Lines 11/30/2018
		**/
		/**
			This jQuery is for school_profile
		**/
		$('.book-borrow-action').click(function() {
			var book_id = $(this).data('book-id')
			var book_action_model = $(this).data('target');
			$(book_action_model + " input[type=hidden]").val(book_id);
		});


		/**
			New Lines 11/28/2018
		**/
		/**
			This jQuer is for the school profile (Request table)
		**/
		// Takes the request data from a data attributes stored in
		// the button and fill it in the content model fields.
		$('.content-request-action').click(function() {
			var this_contant = $(this).data('request-content');
			var this_type   = $(this).data('request-type');
			var this_title   = $(this).data('request-title');
			$('.content-request-model textarea').val(this_contant);
			$('.content-request-model .type').val(this_type);
			$('.content-request-model .title').val(this_title);
			console.log(this_contant);
		});//end :: .content-request-action

		
		/**
			This jQuery is for the toggle works with (attendance, matrials) school table table in the school profile
		**/
		$('.btn-toggle-action').click(function() {
			var target_table = $(this).data('target');
			$(this).addClass('active').siblings().removeClass('active');
			$('.genaric-toggle-table').slideUp(500);
			$(target_table).slideDown(500);
		});

		

		/**
			This jQuer is used for the edit (assets || support) form action
		**/
		{
			$('.btn-support-edit-action').click(function() {
				var this_id = $(this).data('id');
				var this_name = $(this).data('name');
				var this_category = $(this).data('category');
				var this_sub_category = $(this).data('sub-category');
				var this_quantity = $(this).data('quantity');
				var this_investor = $(this).data('investor');
				var this_date_recived = $(this).data('date-recived');
				var this_date_expied = $(this).data('date-expied');
				var this_state= $(this).data('state');
				
				console.log(this_date_expied, this_date_recived)
				
				$('.edit-support-model #investor').val(this_investor);
				if (this_category=='اصول'){
					$('.edit-support-model #category').val('option1');
					$('.asset-category').hide(500);
					$('.asset-category select').attr('name', '');
					$('.assets-type').show(500);
					$('.assets-type select').attr('name', 'sub_category');
				} else if(this_category=='صيانة') {
					$('.edit-support-model #category').val('option2');
					$('.asset-category').hide(500);
					$('.asset-category select').attr('name', '');
					$('.maintenance-type').show(500);
					$('.maintenance-type select').attr('name', 'sub_category');
				} else if (this_category== 'طلاب') {
					$('.edit-support-model #category').val('option3');
					$('.asset-category').hide(500);
					$('.asset-category select').attr('name', '');
					$('.students-support').show(500);
					$('.students-support select').attr('name', 'sub_category');
				}
				
				$('.edit-support-model select[name="sub-category"]').val(this_sub_category);
				$('.edit-support-model #name').val(this_name);
				$('.edit-support-model #quantity').val(this_quantity);
				$('.edit-support-model #state').val(this_state);
				$('.edit-support-model #date-recived').val(this_date_recived);
				$('.edit-support-model #date-expied').val(this_date_expied);
			});// end :: .btn-support-edit-action

			/**
				This jQuery is for school assets edit option
			**/
			$('.btn-asset-edit-action').click(function () {
				var this_id = $(this).data('id');
				var this_name = $(this).data('name');
				var this_sub_category = $(this).data('sub-category');
				var this_quantity = $(this).data('quantity');
				var this_investor = $(this).data('investor');
				var this_date_recived = $(this).data('date-recived');
				var this_date_expied = $(this).data('date-expied');
				var this_state= $(this).data('state');
				
				$('.edit-asset-model #category').val(this_sub_category);
				$('.edit-asset-model #name').val(this_name);
				$('.edit-asset-model #state').val(this_state);
				$('.edit-asset-model #investor').val(this_investor);
			});

		
			$('.asset-category-Generic-action select').change(function() {
				select_category_value = $(this).val();
				if(select_category_value == 'option1') {
					$('.asset-category').hide(500);
					$('.asset-category select').attr('name', '');
					$('.assets-type').show(500);
					$('.assets-type select').attr('name', 'sub_category');
					console.log('testing 1');
				} else if(select_category_value == 'option2') {
					$('.asset-category').hide(500);
					$('.asset-category select').attr('name', '');
					$('.maintenance-type').show(500);
					$('.maintenance-type select').attr('name', 'sub_category');
					console.log('testing 2');
				} else if(select_category_value == 'option3') {
					$('.asset-category').hide(500);
					$('.asset-category select').attr('name', '');
					$('.students-support').show(500);
					$('.students-support select').attr('name', 'sub_category');
					console.log('testing 3');
				} else {
					console.log('testing 4');
				}
			});
			{
				var select_category_value = $('.asset-category-Generic-action select').val();
				if(select_category_value == 'option1') {
					$('.asset-category').hide(500);
					$('.asset-category select').attr('name', '');
					$('.assets-type').show(500);
					$('.assets-type select').attr('name', 'sub_category');
				} else if(select_category_value == 'option2') {
					$('.asset-category').hide(500);
					$('.asset-category select').attr('name', '');
					$('#maintenance-type').show(500);
					$('.maintenance-type select').attr('name', 'sub_category');
				} else if(select_category_value == 'option3') {
					$('.asset-category').hide(500);
					$('.asset-category select').attr('name', '');
					$('.students-support').show(500);
					$('.students-support select').attr('name', 'sub_category');
				}
			}// end :: .asset-category-action select
		}
		
	}
	/// End School
	/// End School
	/// End School




	/// Start Teachers
	/// Start Teachers
	/// Start Teachers
	{
		/**
			This jQuery is for creating_new_teacher Page
		**/
		$('.teacher_payrole').change(function() {
			if ($(this).val() == 'investor') {
				$('.teacher_payrole_investor').show(500);
			} else {
				$('.teacher_payrole_investor').hide(500);
			}
		});
		if ($('.teacher_payrole').val() == 'investor') {
			$('.teacher_payrole_investor').show(500);
		}// end :: .teacher_payrole
	}
	/// End Teachers
	/// End Teachers
	/// End Teachers




	/// Start Student
	/// Start Student
	/// Start Student
	{
		/**
			This Jquery is for creating_new_student
		**/
		$('.child_state_options').change(function() {
			if($(this).val() == 'يتيم الاب'){
				$('.child-family-state').show(500);
			} else if($(this).val() == 'يتيم الوالدين'){
				$('.child-family-state').show(500);
			} else {
				$('.child-family-state').hide(500);
			}
		});
		{
			if($('.child_state_options').val() == 'يتيم الاب'){
				$('.child-family-state').show(500);
			} else if($('.child_state_options').val() == 'يتيم الوالدين'){
				$('.child-family-state').show(500);
			} else {
				$('.child-family-state').hide(500);
			}
		}// end :: .child_state_options
	}
	/// End Student
	/// End Student
	/// End Student




	/// Start Assets || Support
	/// Start Assets || Support
	/// Start Assets || Support
	{
		// Support page type selector
		$('.asset-category-action select').change(function() {
			console.log('testing');
			select_category_value = $(this).val();
			if(select_category_value == 'option1') {
				$('.asset-category').hide(500);
				$('.asset-category select').attr('name', '');
				$('#assets-type').show(500);
				$('#assets-type select').attr('name', 'sub_category');
				console.log('testing 1');
			} else if(select_category_value == 'option2') {
				$('.asset-category').hide(500);
				$('.asset-category select').attr('name', '');
				$('#maintenance-type').show(500);
				$('#maintenance-type select').attr('name', 'sub_category');
				console.log('testing 2');
			} else if(select_category_value == 'option3') {
				$('.asset-category').hide(500);
				$('.asset-category select').attr('name', '');
				$('#students-support').show(500);
				$('#students-support select').attr('name', 'sub_category');
				console.log('testing 3');
			} else {
				console.log('testing 4');
			}
		});
		{
			var select_category_value = $('.asset-category-action select').val();
			if(select_category_value == 'option1') {
				$('.asset-category').hide(500);
				$('.asset-category select').attr('name', '');
				$('#assets-type').show(500);
				$('#assets-type select').attr('name', 'sub_category');
			} else if(select_category_value == 'option2') {
				$('.asset-category').hide(500);
				$('.asset-category select').attr('name', '');
				$('#maintenance-type').show(500);
				$('#maintenance-type select').attr('name', 'sub_category');
			} else if(select_category_value == 'option3') {
				$('.asset-category').hide(500);
				$('.asset-category select').attr('name', '');
				$('#students-support').show(500);
				$('#students-support select').attr('name', 'sub_category');
			}
		}// end :: .asset-category-action select
	}
	/// End Assets || Support
	/// End Assets || Support
	/// End Assets || Support




	/// Start Generic jQuery
	/// Start Generic jQuery
	/// Start Generic jQuery
	{
		// # Birth date calneder plugin
		// This plugin with 'birth-date-input-field' class used for any date field required
		$('.birth-date-input-field').datepicker({});

		// # Time selector plugin
		$('.timepicker').wickedpicker();


		/*
		 * # Confirm delete
		 * _ Confirm delete prompt the user before deleting an item from the data base
		 * add a confirm-delete class to the selected element; when the user clicks the element
		 * the browser promet prompt the user before deleting the item.
		 * _ By adding a data-confirm-name and storing the item name,
		 * the prompt shows the user the item name before deleteing.
		 */
		 $('.confirm-delete').click(function(e) {
			 e.preventDefault();
			 var item_name = $(this).data('confirm-name');
			 var confirm_code = prompt('هل انت متئكد انك تريد حذف  (' + item_name + ')  للحذف اكتب "موافق"');
			 if(confirm_code == 'موافق') {
				 $(this).parent().submit();
			 } else {
				 console.log(item_name);
			 }
		 });

		/*
		* # button-click-slide-action
		* _ Used to give a button the functionality of showing hidden sections, with a slide show effect
		* _ The button need to have 'button-click-slide-action' class and a data attribute 'button-click-slide-target'
		* that contains class used to target the element we want to show.
		* _ Notice that the element shold be hidden using 'button-click-slide-target', any other shown element haveing 'button-click-slide-target'
		* class will be hidden.
		*/
		$('.button-click-slide-action').click(function() {
			if (!$(this).hasClass('active')) {

				$(this).addClass('active').siblings().removeClass('active');
				var target = $(this).data('button-click-slide-target');

				$('html, body').animate({'scrollTop': 0},500);
				$('.button-click-slide-target').clearQueue().hide();
				$(target).show();
				$('html, body').delay(100).animate({'scrollTop': 750},500);
			}
		});


		/*
		* # list-group-click-action
		* _ Used to active a slide when clicking on a link in the list-group.
		* _ When the uses clicks on a list group link wraped with list-group-slide-controller class
		* this function search for a data atribute list-group-target and show the element it holds it's class
		* then hide all elements with list-group-slide-target class=
		*/
		$('.list-group-slide-controller a').click(function() {
			if (!$(this).hasClass('active')) {
				$(this).addClass('active').siblings().removeClass('active');
				var target = $(this).data('list-group-target');

				$('.list-group-slide-target').clearQueue().slideUp(500, function() {});
				$('.'+target).slideDown(500);
			}
		});


		/*
		* # User-Controle page sellect all effect
		* This jQuery is used for the, select all check box effect, which used in the create_user_page
		*/
		$('#select-all').on('click', function(event) {
			var checkbox_identifier = $(this).data('checkbox-parent');
			if ($(this).is(":checked")) {
				$('[type="checkbox"]').each(function() {
					if (checkbox_identifier == $(this).data('checkbox-children')) {
						$(this).prop('checked', true);
					}
				});
			} else {
				// Iterate each checkbox
				$('[type="checkbox"]').each(function() {
					if (checkbox_identifier == $(this).data('checkbox-children')) {
						$(this).prop('checked', false);
					}
				});
			}
		});
		$('[type="checkbox"]').click(function() {
			var checkbox_identifier = $(this).data('checkbox-children');
			if (!$(this).is(":checked")) {
				$('[data-checkbox-parent='+checkbox_identifier+']').prop('checked', false);
			}
		});
		// User-Controle page sellect all effect

		// Hide placeholder on focuse
		$('input, textarea').focus(function() {
			var tmp_placeholder_value = $(this).attr('placeholder');
			$(this).data('tmp-placeholder-holder', tmp_placeholder_value);
			$(this).attr('placeholder', '');
		});
		$('input, textarea').blur(function() {
			var tmp_placeholder_value = $(this).data('tmp-placeholder-holder');
			$(this).attr('placeholder', tmp_placeholder_value);
			$(this).data('tmp-placeholder-holder', '');
		});

		// All multieSelect action
		$('#talent-multie-select').multiselect();
		
		
		$('.min-toggle-action').click(function() {
			if(!$(this).hasClass('mine-nav-active')) {
				var target_table = $(this).data('target');
				$(this).addClass('mine-nav-active').siblings().removeClass('mine-nav-active');
				$('.genaric-toggle-table').slideUp(500);
				$(target_table).slideDown(500);
			}
		});// end :: min-toggle-action
		{
			$('.min-toggle-action').each(function() {
				if($(this).hasClass('mine-nav-active')) {
					var target_table = $(this).data('target');
					$(this).addClass('mine-nav-active').siblings().removeClass('mine-nav-active');
					$('.genaric-toggle-table').slideUp(500);
					$(target_table).slideDown(500);
				}
			});
		}
		
		// add the id to the action attribute in the edit form
		$('.url-genaric-target-action').click(function() {
			var target_form = $(this).data('target');
			var id = $(this).data('id');
			var form_action = $(target_form + ' form').attr('action');

			lastindex = form_action.lastIndexOf('/');
			new_form_action = form_action.slice(0, lastindex+1) + id;
			$(target_form + ' form').attr('action', new_form_action);

		});// end :: .url-genaric-target-action
		
		// send data-value to targeted-model
		$('.show-content').click(function() {
			var content_value = $(this).data('value');
			var model_target = $(this).data('target');
			$(model_target + ' img').attr('src', content_value);
		});
	}
	/// End Generic jQuery
	/// End Generic jQuery
	/// End Generic jQuery



	/// Start Attendance
	/// Start Attendance
	/// Start Attendance
	{
		/**
			New Lines 11/27/2018
		**/
		/**
			This jQuery is for the Attendance Management
		**/
		// Teachers Attendance
		// This jQuery is for the Attendance managment systme navbar toggle effect
		$('.attendance-navbar li').click(function() {
			if(!$(this).hasClass('attendance-nav-active')){
				$(this).siblings().removeClass('attendance-nav-active');
				$(this).addClass('attendance-nav-active');

				var toggle_target = $(this).data('attendance-target');
				$('.attendance-toggle').hide(500);
				$(toggle_target).show(500);
			}
		});
		{
			$('.attendance-navbar li').each(function () {
				if($(this).hasClass('attendance-nav-active')){
					var toggle_target = $(this).data('attendance-target');
					$('.attendance-toggle').hide(500);
					$(toggle_target).show(500);
				}
			});
		}//end :: .attendance-navbar li

		// This jQuery is for Adding Vication
		// Used for the vication type and sub-required field debinding on the selection
		$('.vication-radio-selector').click(function() {
			var radioButtonValue = $(this).val();
			if(radioButtonValue == 'option1') {
				$('.vication-category').show(500);
				$('.vication-center').hide(500);
				$('.vication-viliage').hide(500);
				$('.vication-viliage input[type="checkbox"]').attr('required', false);
			} else if(radioButtonValue == 'option2') {
				$('.vication-category').show(500);
				$('.vication-center').show(500);
				$('.vication-viliage').hide(500);
				$('.vication-viliage input[type="checkbox"]').attr('required', false);
			} else if(radioButtonValue == 'option3') {
				$('.vication-category').show(500);
				$('.vication-center').show(500);
				$('.vication-viliage').show(500);
				$('.vication-viliage input[type="checkbox"]').attr('required', true);
			}
		});
		{
			var radioButtonValue = $('.vication-radio-selector:checked').val();
			if(radioButtonValue == 'option1') {
				$('.vication-category').show(500);
				$('.vication-center').hide(500);
				$('.vication-viliage').hide(500);
				$('.vication-viliage input[type="checkbox"]').attr('required', false);
			} else if(radioButtonValue == 'option2') {
				$('.vication-category').show(500);
				$('.vication-center').show(500);
				$('.vication-viliage').hide(500);
				$('.vication-viliage input[type="checkbox"]').attr('required', false);
			} else if(radioButtonValue == 'option3') {
				$('.vication-category').show(500);
				$('.vication-center').show(500);
				$('.vication-viliage').show(500);
				$('.vication-viliage input[type="checkbox"]').attr('required', true);
			}
		}// end :: .vication-radio-selector



		/**
			This jQuer is for the attendance form for the teachers
		**/
		// Check the radioButtton values, and related to the value
		// the file hidden field appears or disaper
		$('.cheack-file-required input').click(function() {
			var fileRequierdState = $(this).val();
			if(fileRequierdState == 'option1' || fileRequierdState == 'option3') {
				$('.file-require-field').show(500);
				$('.file-require-field input[type="file"]').attr('required', true);
			} else {
				$('.file-require-field').hide();
				$('.file-require-field input[type="file"]').attr('required', false);
			}
		});
		{
			var fileRequierdState = $('.cheack-file-required input').val();
			if(fileRequierdState == 'option1' || fileRequierdState == 'option3') {
				$('.file-require-field').show(500);
				$('.file-require-field input[type="file"]').attr('required', true);
			} else {
				$('.file-require-field').hide();
				$('.file-require-field input[type="file"]').attr('required', false);
			}
		}//end :: .cheack-file-required input
		
		// add the id to the action attribute in the edit form
		$('.url-target-action').click(function() {
			var attendance_action_model = $(this).data('target');
			var attendance_id = $(this).data('attendance-id');
			var form_action = $(attendance_action_model + ' form').attr('action');

			lastindex = form_action.lastIndexOf('/');
			new_form_action = form_action.slice(0, lastindex+1) + attendance_id;
			$(attendance_action_model + ' form').attr('action', new_form_action);

		});// end :: .url-target-action
	
		// edit forms for attendance
		$('.edit-attendance-form-action').click(function() {
			var data_target = $(this).data('target');
			var name = $(this).data('name');
			var date_absent = $(this).data('absent-time');
			var date_return = $(this).data('return-time');
			
			$(data_target + ' #full-name').val(name);
			$(data_target + ' #start-date').val(date_absent);
			$(data_target + ' #end-date').val(date_return);
		});
	}
	/// End Attendance
	/// End Attendance
	/// End Attendance



	/// Start Smart Search
	/// Start Smart Search
	/// Start Smart Search
	{
		/// checkSimilarty :: return true if string_1 in string_2
		function checkSimilarty (string_1, string_2) {
			// if the string_1 length less then or equal string_2
			// if not then string_1 in not in string_2
			if(typeof string_2 != typeof 'string') {
				string_1 = string_1.toString();
				string_2 = string_2.toString();
				console.log('test don');
			}
			if (string_1.length <= string_2.length) {
				// loops through the string_1 and check each char in the string_2
				// else return false
				for(var i=0;i<string_1.length;i++) {
					if(string_1[i] != string_2[i]) {
						return false;
					}
				}
				return true;
			}
			return false;
		}

		/// this code used for fast search option in the management system
		$('.fast-search').on('keyup', function() {
			// console.log('Start fast search');

			var search_value  = $(this).val();
			var search_target = $(this).data('search-target');
			var search_target_coulmn = $(this).data('target-coulmn');

			// console.log(search_value, ' ', search_target, ' ',search_target_coulmn);

			$(search_target).each(function() {
				if(!checkSimilarty(search_value, $(this).data(search_target_coulmn))) {
					$(this).parent().css('display', 'none');
				} else {
					$(this).parent().css('display', '');
				}
			});

			if(search_value == '') {
				$('tr').css('display', '');
			}
		});// end :: .fast-search

		$('.fast-search-select').change(function() {
			// console.log('Start fast search');

			var search_select_value = $(this).val();
			var search_target = $(this).data('search-target');
			var search_target_coulmn = $(this).data('target-coulmn');
				
			
			
			$(search_target).each(function() {
				if($(this).data(search_target_coulmn) != search_select_value) {
					$(this).parent().css('display', 'none');
				} else {
					$(this).parent().css('display', '');
				}
				
				console.log(search_select_value, ' ', $(this).data(search_target_coulmn));
			});

			if(search_select_value == 'all') {
				$('tr').css('display', '');
			}

		});// end :: .fast-search-select
		
		$('.fast-search-interval').change(function() {
			
			var error_message = $(this).data('error-message');
			var interval_val_1 = $('.fast-search-interval-1').val();
			var interval_val_2 = $('.fast-search-interval-2').val();
		
			console.log(interval_val_1,interval_val_2);
			
			var search_target_coulmn_1 = $(this).data('target-coulmn-1');
			var search_target_coulmn_2 = $(this).data('target-coulmn-2');
			var search_target = $(this).data('search-target');
			
				
			if(interval_val_1 == '' || interval_val_2 == '') {
				$(search_target).each(function() {
					$(this).parent().css('display', '');
					$('.date-message-error').hide(500);
				});
			} else {
			
				var date_1 = interval_val_1.split('/');
				var date_2 = interval_val_2.split('/');
				
				
				$('.date-message-error').hide(500);
				
				if(parseInt(date_2[2]) < parseInt(date_1[2])) {
					$('.date-message-error p').text('اختر تاريخ مناسب');
					$('.date-message-error').show(500);
				} else if(parseInt(date_2[2]) == parseInt(date_1[2]) && ( (parseInt(date_2[0]) < parseInt(date_1[0])) || (parseInt(date_2[0]) == parseInt(date_1[0]) && parseInt(date_2[1]) < parseInt(date_1[1])) ) ) {
					$('.date-message-error p').text('اختر تاريخ مناسب');
					$('.date-message-error').show(500);
				} else {
					var flag = true;
					
					$('.date-message-error').hide(500);
					
					$(search_target).each(function() {
						// console.log('first-test', $(this).data(search_target_coulmn_1));
						var tmp_date_1 = $(this).data(search_target_coulmn_1).split('/');
						var tmp_date_2 = $(this).data(search_target_coulmn_2).split('/');
						
						$(this).parent().css('display', 'none');
						
						if(tmp_date_1[2] >= date_1[2] && !tmp_date_2[2] <= date_2[2]) {
							if( (tmp_date_1[0] > date_1[0] && tmp_date_2[0] < date_2[0])) {
								flag = false;
								$(this).parent().css('display', '');
							} else if ((tmp_date_1[0] == date_1[0] && tmp_date_1[1] >= date_1[1])  && (tmp_date_2[0] == date_2[0] && tmp_date_2[1] <= date_2[1])) {
								flag = false;
								$(this).parent().css('display', '');	
							}
						}
					});
					
					if(flag) {
						$('.date-message-error p').text('لا يوجد غياب بهذا التاريخ !!');
						$('.date-message-error').show(500);
					}
				}// end :: if(parseInt(date_2[2]) < parseInt(date_1[2]))
			}// end :: if(interval_val_1 == 'null' || interval_val_2 == 'null')
		});// end :: .fast-search-interval
	
		$('.clear-field').click(function(e) {
			e.preventDefault();
			$('.fast-search-interval-1').val('');
			$('.fast-search-interval-2').val('');
			$('.find-attendance').each(function() {
					$(this).parent().css('display', '');
					$('.date-message-error').hide(500);
			});
		});
	}
	/// End Smart Search
	/// End Smart Search
	/// End Smart Search



	/// Start Teachers Matrials
	/// Start Teachers Matrials
	/// Start Teachers Matrials
	{
		/**
			Matrials mine navbar toggle effect
		**/
		$('.matrials-nav-toggle li').click(function () {
			var target_element = $(this).data('matrials-target');

			$(this).addClass('matrials-nav-active').siblings().removeClass('matrials-nav-active');

			if(target_element == '.matrials-add-new') {
				$('.matrials-search').addClass('matrials-search-hidden').hide(500);
			} else if ($('.matrials-search').hasClass('matrials-search-hidden')) {
				$('.matrials-search').show(500);
			}

			$('.matrials-toggle').hide(500);
			$(target_element).show(500);
		});
		{
			$('.matrials-nav-toggle li').each(function() {
				if ($(this).hasClass('matrials-nav-active')) {
					var target_element = $(this).data('matrials-target');
					$(target_element).slideDown(500);
				}
			});
		}// end :: .matrials-nav-toggle li

		/**
			Matrial source type selector
		**/
		$('.matrial-file-sorce-type').click(function() {
			var file_source_target = $(this).data('target');
			$('.file-source').hide(500);
			$(file_source_target).show(500);
		});
		{
			$('.matrial-file-sorce-type').each(function() {
				if($(this).is(':checked')) {
					var file_source_target = $(this).data('target');
					$('.file-source').hide(500);
					$(file_source_target).show(500);
				}
			});
		}
		
		// matrial edit form action, 
		// getting the fata from the data-attributes to the edit form
		$('.matrials-edit-action').click(function() {
			var form_target = $(this).data('target');
			
			var file_name = $(this).data('file-name');
			var file_subject = $(this).data('subject');
			var file_semester = $(this).data('semester');
			var file_level = $(this).data('level');
			var file_unit = $(this).data('unit');
			
			$(form_target + ' #file-name').val(file_name);
			$(form_target + ' #semester').val(file_semester);
			$(form_target + ' #level').val(file_level);
			$(form_target + ' #unit').val(file_unit);
			$(form_target + ' ').val();
		});
	}
	/// End Teachers Matrials
	/// End Teachers Matrials
	/// End Teachers Matrials


	
	/// Start Reports Genarators
	/// Start Reports Genarators
	/// Start Reports Genarators
	{
		
	}
	/// End Reports Genarators
	/// End Reports Genarators
	/// End Reports Genarators
	
	
	
	/// Start Attendance 
	/// Start Attendance 
	/// Start Attendance 
	{

	}
	/// End Attendance 
	/// End Attendance 
	/// End Attendance 
	
	
	
	/// Start New Lines
	/// Start New Lines
	/// Start New Lines
	{	
				
		function drawChart(element_val, type_val, labels_val, label_val, data_val, backgroundColor_val, borderColor_val) {
			var myChart1 = new Chart(element_val, {
				type: type_val,
				data: {
					labels: labels_val,
					datasets: [{
						label: label_val,
						data: data_val,
						backgroundColor: backgroundColor_val,
						borderColor: borderColor_val,
						borderWidth: 1
					}]
				},options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true
							}
						}]
					}
				}
			});
		}
		
		var ctx1 = document.getElementById("myChart1").getContext('2d');
		var ctx2 = document.getElementById("myChart2").getContext('2d');
		
		var type = 'pie';
		var labels = ["اناث", "ذكور"];
		var label = 'علي مستوي المراكز';
		var data = [0, 0];
		var backgroundColor = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'];
		var borderColor = ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)'];
		
		drawChart(ctx1, type, labels, label, data, backgroundColor, borderColor);
		
		var type = 'bar';
		var labels = ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"];
		var label = 'علي مستوي المراكز';
		var data = [0, 0, 0, 0, 0, 0];
		var backgroundColor = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'];	
		var borderColor =  ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'];
		
		drawChart(ctx2, type, labels, label, data, backgroundColor, borderColor);
		
		$('.chart-test').click(function(e) {
			e.preventDefault()
			console.log('testing');
			var type = 'bar';
			var labels = ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"];
			var label = 'علي مستوي المراكز';
			var data = [5, 5, 5, 5, 5, 5];
			var backgroundColor = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'];	
			var borderColor =  ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'];
	
			drawChart(ctx2, type, labels, label, data, backgroundColor, borderColor);
			
			var type = 'pie';
			var labels = ["اناث", "ذكور"];
			var label = 'علي مستوي المراكز';
			var data = [10, 7];
			var backgroundColor = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'];
			var borderColor = ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)'];
			
			drawChart(ctx1, type, labels, label, data, backgroundColor, borderColor);
		});
	}
	/// End New Lines
	/// End New Lines
	/// End New Lines


});
