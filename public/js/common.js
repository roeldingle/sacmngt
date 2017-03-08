/*
    onload events
*/

/********** check all checkbox in table**************/
$('input[name="checkall"]').bind('click',function () {
    $('input[type="checkbox"]').prop("checked", $(this).prop("checked"));
});

$('#delete-btn').bind('click',function (event) {
    event.preventDefault();
     var attr = {
        title: 'Confirmation',
        body: 'Are you sure you want to delete selected item(s)?',
        value: ['hidden',],
        button: 'delete-btn'
    };
    Common.modal(attr);
});


/*******Add task for team*******/
$('.create-task').bind('click',function (event) {
    event.preventDefault();

    var html_form = $('#add-task-form').html();

     var attr = {
        title: 'Add Task',
        body: html_form,
        value: ['hidden',],
    };
    Common.modal(attr);
});

/********** status selection on ticket view**************/
$('.status-selection').bind('click',function () {
    var selected = $(this);
    var selected_status = selected.attr('data-status');
    var selected_text = selected.text();

    switch(selected_status){
        case 1:
            var selected_class = 'btn-primary';
        case 2:
            var selected_class = 'btn-info';
        break;
        case 3:
            var selected_class = 'btn-default';
        break;
    }

    $('#status-dropdown').removeClass('btn-primary btn-info btn-default').addClass(selected_class);
    $("#status-dropdown .btn-status-text").text(selected_text);

    /*update ticket status*/
    Common.ajaxUpdateTicketStatus(selected_status);
    
});


/********** clone anothe file input for attachments**************/
$('.add-fileupload').bind('click', function(){
    var filehtml = '<input type="file" name="fileupload[]" class="fileupload" style="margin-bottom:5px" />';
    $('.fileupload-container').append(filehtml);
});



/********** ajax delete selected items**************/
$(document.body).on('click', '.delete-btn' ,function(){
    Common.ajaxDelete(this);
});


/*
    Common functions
*/
var Common = {

    js_redirect: function(url){
        window.location.href = url;
    },

    ajaxDelete: function(elem) {

            var token = $('input[name="_token"]').val();
            var ids = $(".check:checked").map(function() {return this.value;}).get();
            var route = $("#current_url").val();


            $.ajax({
                type: 'POST',
                data: {_token :token, id: ids,return_route: route},
                url: route+'/'+ids+'/destroy', //resource
                success: function(data) {
                    //if something was deleted, we redirect the user to the users page, and automatically the user that he deleted will disappear
                    if (data.affectedRows > 0) window.location = data.redirect;
                }
            });
    },

    ajaxUpdateTicketStatus: function(selected_status){

            var token = $('input[name="_token"]').val();
            var id = $("#status-dropdown").attr('data-ticket');
            var route = $("#current_url").val();

            $.ajax({
                type: 'POST',
                data: {_token :token, id: id,status: selected_status,return_route: route},
                url: route+'/ajaxupdatestatus', //resource
                success: function(data) {
                    console.log(data);
                    //if something was deleted, we redirect the user to the users page, and automatically the user that he deleted will disappear
                    if (data.updated == 1) window.location = data.redirect;
                }
            });
    },

    /*
        Create modal
    */
    modal: function(attr){

    	$(".modal").remove();

        var html = '';
        html += '<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
        html += '<div class="modal-dialog" role="document">';
        html += '<div class="modal-content">';

        html += '<div class="modal-header">';
        html += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
        html += '<span aria-hidden="true">&times;</span>';
        html += '</button>';
        html += '<strong class="modal-title" id="myModalLabel">';

        html += attr.title;

        html += '</strong>';
        html += '</div>';

        html += '<div class="modal-body">';
        html += attr.body;
        html += '</div>';

        html += '<div class="modal-footer">';
        html += '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>';

        if(attr.button){

            switch(attr.button){
                case "delete-btn":
                html += '<button type="button" class="btn btn-primary '+attr.button+'">Continue</button>';
                break;

                case "save-btn":
                html += '<button type="submit" class="btn btn-success '+attr.button+'">Save</button>';
                break;
            }
            
        }
        
        html += '</div>';

        html += '</div>';
        html += '</div>';
        html += '</div>';

        $("body").append(html);

        $('.modal').modal();

    },

    selectOnChange: function(elem){

        var token = $('[name^="_token"]').val();

        $.ajax({
            type: 'post',
            data: {_token :token, category: elem.name, id: elem.value},
            url: '/admin/employee/getData', //resource
            success: function(data) {

                var team_option_html = '';
                var job_option_html = '';
                var skill_option_html = '';
                var default_option = '<option value="">--select--</option>';

                /*create team options*/
                team_option_html += default_option;
                $.each(data.teams, function(key,val){
                    team_option_html += '<option value="'+val.id+'">';
                    team_option_html += val.name;
                    team_option_html += '</option>';
                });

                /*create job options*/
                job_option_html += default_option;
                $.each(data.jobs, function(key,val){
                    job_option_html += '<option value="'+val.id+'">';
                    job_option_html += val.name;
                    job_option_html += '</option>';
                });

                /*create job options*/
                $.each(data.skills, function(key,val){
                    skill_option_html += '<div class="checkbox">';
                    skill_option_html += '<label><input type="checkbox" name="skill[]" value="'+val.id+'">'+val.name+'</label>';
                    skill_option_html += '</div>';
                });

                
                $('select[name^="team"]').html(team_option_html);
                $('select[name^="job"]').html(job_option_html);
                $('.skill-container').html(skill_option_html);
            }
        });
    }


}

