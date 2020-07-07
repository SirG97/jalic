    
document.addEventListener('DOMContentLoaded', (event) => {
    const hamburger = document.getElementById('hamburger');
    const main = document.getElementById('main');
    const sidebar = document.querySelector('.nav-sidebar');
    const profile = document.querySelector('.header-nav-item');
    const ndropdown = document.querySelector('.nav-dropdown');

    hamburger.addEventListener('click', () =>{
        sidebar.classList.toggle('nav-sidebar-open');
    });
    profile.addEventListener('click', () => {
        ndropdown.classList.toggle('active');
    });
    main.addEventListener('click', () =>{
            sidebar.classList.remove('nav-sidebar-open');
    });

    $('#myTab a').on('click', function (e) {
        e.preventDefault()
        console.log('hie');
        $(this).tab('show')
    })

    // Show search dropdown
    const search = $('#search_order');
    const search_result = $('.search-result');
    search.on('input', ()=>{
        search.addClass('no-bottom-borders');
        $('.search-result').css('display','block');
        let terms = search.val();
        const url = `/orders/${terms}/search`;
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function(){
                search_result.html('loading...');
            },
            success: function (response) {
                let data = JSON.parse(response);
                console.log(JSON.parse(response))
                let ul = '<ul class="list-group list-group-flush">';
                $.each(data, (key, value) => {
                    $.each(value, (index, item)=>{
                        console.log(item);
                        ul += `<li class="list-group list-group-item">
                                   <a href="/order/${item.order_no}">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6>${item.parcel_name}  by ${item.fullname}</h6>
                                        <small>${item.order_no}</small>
                                    </div>
                                    <p class="mb-1">${item.email}</p> 
                                    </a>
                                </li>`;
                    });
                });
                ul += '</ul>';
                $('.search-result').html(ul);
            },
            error: function(request, error){
                let errors = JSON.parse(request.responseText);
                $('#search-result-list').html('No r');
            }
        });
    });
    // ul += '<li class="list-group list-group-item"><div class="d-flex w-100 justify-content-between"><h6>' + item.firstname + ' ' + item.surname + '</h6><small>'+ item.phone +'</small></div><p class="mb-1">'+ item.email +'</p></li>';
    search.on('blur', ()=>{
        $('#search').removeClass('no-bottom-borders');
        // $('.search-result').css('display','none');
    });

    const search_contribution = $('#search-contribution');
    const search_contribution_result = $('.search-contribution-result');
    search_contribution.on('input', ()=>{
        search_contribution.addClass('no-bottom-borders');
        $('.search-result').css('display','block');
        let terms = search_contribution.val();
        const url = `/contributions/${terms}/search`;
        $.ajax({
            url: url,
            type: 'GET',
            beforeSend: function(){
                search_result.html('<div class="d-flex justify-content-center pt-1 pb-1"><i class="fa fa-spinner fa-spin"></i> &nbsp; Searching...</div>');
            },
            success: function (response) {
                let data = JSON.parse(response);
                console.log(JSON.parse(response))
                let ul = '<ul class="list-group list-group-flush">';

                if(data !== undefined){
                    $.each(data, (key, value) => {
                        $.each(value, (index, item)=>{
                            ul += `<li class="list-group list-group-item">
                         
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6>${item.phone} </h6>
                                        <small>${item.updated_at}</small>
                                    </div>
                                    <p class="mb-1">${item.pin}</p> 
                                    
                                </li>`;
                        });
                    });
                    ul += '</ul>';
                }else{
                    ul += `<li class="list-group list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                                <p>No result found</p>
                        </div>
                    </li>`;
                    ul += '</ul>';
                }

                $('.search-result').html(ul);
            },
            error: function(request, error){
                let errors = JSON.parse(request.responseText);
                $('#search-result-list').html('No result for this query');
            }
        });
    });
    // ul += '<li class="list-group list-group-item"><div class="d-flex w-100 justify-content-between"><h6>' + item.firstname + ' ' + item.surname + '</h6><small>'+ item.phone +'</small></div><p class="mb-1">'+ item.email +'</p></li>';
    search_contribution.on('blur', ()=>{
        $('#search_contribution').removeClass('no-bottom-borders');
        $('.search-result').css('display','none');
    });

    // Show the edit modal and populate the fields for customer edit
    $('#editModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); // Button that triggered the modal
        let route_id = button.data('route_id'); // Extract info from data-* attributes
        let district = button.data('district'); // Extract info from data-* attributes
        let district_id = button.data('district_id'); // Extract info from data-* attributes

        let name = button.data('name'); // Extract info from data-* attributes

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        let modal = $(this);

        modal.find('#route_id').val(route_id);
        modal.find('#district').val(district);
        modal.find('#district_id').val(district_id);
        modal.find('#name').val(name);

    });

    $('#editBtn').on('click', (e)=>{
        e.preventDefault();
        let route_id = $('#route_id').val();
        const url = `/route/${route_id}/edit`;
        const data = {
            token : $('#token').val(),
            district : $('#district').val(),
            district_id : $('#district_id').val(),
            name : $('#name').val(),
        };
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            beforeSend: function(){
                $('#editBtn').html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
            },
            success: function (response) {
                let data = JSON.parse(response);
                console.log(JSON.parse(response));
                let message = data.success;
                msg.innerHTML = alertMessage('success', message);
                $('#editBtn').html('Save');
                //interval(5000);
                window.location.reload()
            },
            error: function(request, error){

                let errors = JSON.parse(request.responseText);
                console.log(errors);
                let ul = '';
                $.each(errors, (key, value) => {
                    $.each(value, (index, item)=>{
                        console.log(item);
                        ul += `${item} <br>`;
                    });

                });

                msg.innerHTML = alertMessage('danger', ul);
                $('#editBtn').html('Save');
                interval(5000);
            }
        });
    });

    // show the delete confirmation modal
    $('#deleteModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); // Button that triggered the modal
        let route_id = button.data('route_id'); // Extract info from data-* attributes
        let form_action = `/route/${route_id}/delete`;

        let modal = $(this);
        modal.find('#routeDeleteForm').attr("action", form_action);
    });

    $('#deleteRouteBtn').on('click', (e)=>{
        e.preventDefault();
        $("#routeDeleteForm").submit();
    });

    // Edit order modal
    $('#editCustomerModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); // Button that triggered the modal
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        let modal = $(this);
        modal.find('#customer_id').val(button.data('customer_id')); // Extract info from data-* attributes
        modal.find('#name').val( button.data('name')); // Extract info from data-* attributes
        modal.find('#title').val(button.data('title')); // Extract info from data-* attributes
        modal.find('#marital_status').val(button.data('marital_status')); // Extract info from data-* attributes
        modal.find('#dob').val(button.data('dob')); // Extract info from data-* attributes
        modal.find('#email').val(button.data('email')); // Extract info from data-* attributes
        modal.find('#address').val(button.data('address')); // Extract info from data-* attributes
        modal.find('#phone').val(button.data('phone')); // Extract info from data-* attributes
        modal.find('#sex').val(button.data('sex')); // Extract info from data-* attributes
        modal.find('#office').val(button.data('office')); // Extract info from data-* attributes
        modal.find('#occupation').val(button.data('occupation')); // Extract info from data-* attributes
        modal.find('#saving_period').val(button.data('saving_period')); // Extract info from data-* attributes
        modal.find('#amount').val(button.data('amount')); // Extract info from data-* attributes
        modal.find('#purpose').val(button.data('purpose')); // Extract info from data-* attributes
        modal.find('#kin_name').val(button.data('kin_name')); // Extract info from data-* attributes
        modal.find('#kin_phone').val(button.data('kin_phone')); // Extract info from data-* attributes
        modal.find('#kin_address').val(button.data('kin_address')); // Extract info from data-* attributes
        modal.find('#kin_relationship').val(button.data('kin_relationship')); // Extract info from data-* attributes

    });

    $('#editCustomerBtn').on('click', (e)=>{
        e.preventDefault();
        let customer_id = $('#customer_id').val();
        const url = `/customer/${customer_id}/edit`;
        const data = {
            token : $('#token').val(),
            name : $('#name').val(),
            title : $('#title').val(),
            marital_status : $('#marital_status').val(),
            dob : $('#dob').val(),
            email : $('#email').val(),
            phone : $('#phone').val(),
            address : $('#address').val(),
            sex : $('#sex').val(),
            office : $('#office').val(),
            occupation : $('#occupation').val(),
            saving_period : $('#saving_period').val(),
            amount : $('#amount').val(),
            purpose : $('#purpose').val(),
            kin_name : $('#kin_name').val(),
            kin_phone : $('#kin_phone').val(),
            kin_address : $('#kin_address').val(),
            kin_relationship : $('#kin_relationship').val(),
        };
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            beforeSend: function(){
                $('#editCustomerBtn').html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
            },
            success: function (response) {
                let data = JSON.parse(response);
                console.log(JSON.parse(response));
                let message = data.success;
                msg.innerHTML = alertMessage('success', message);
                $('#editBtn').html('Save');
                //interval(5000);
                window.location.reload()
            },
            error: function(request, error){
                let errors = JSON.parse(request.responseText);
                console.log(errors);
                let ul = '';
                $.each(errors, (key, value) => {
                    $.each(value, (index, item)=>{
                        console.log(item);
                        ul += `${item} <br>`;
                    });
                });

                msg.innerHTML = alertMessage('danger', ul);
                $('#editBtn').html('Save');
                interval(5000);
            }
        });
    });

    // show the delete confirmation modal for an order
    $('#deleteCustomerModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); // Button that triggered the modal
        let customer_id = button.data('customer_id'); // Extract info from data-* attributes
        let form_action = `/customer/${customer_id}/delete`;

        let modal = $(this);
        modal.find('#customerDeleteForm').attr("action", form_action);
    });

    $('#deleteCustomerBtn').on('click', (e)=>{
        e.preventDefault();
        $("#customerDeleteForm").submit();
    });

    // Edit staff modal
    $('#editStaffModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); // Button that triggered the modal
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        let modal = $(this);
        modal.find('#user_id').val( button.data('user_id')); // Extract info from data-* attributes

        modal.find('#email').val(button.data('email')); // Extract info from data-* attributes
        modal.find('#password').val(button.data('password')); // Extract info from data-* attributes
        modal.find('#firstname').val(button.data('firstname')); // Extract info from data-* attributes
        modal.find('#lastname').val(button.data('lastname')); // Extract info from data-* attributes
        modal.find('#address').val(button.data('address')); // Extract info from data-* attributes
        modal.find('#phone').val(button.data('phone')); // Extract info from data-* attributes
        modal.find('#branch').val(button.data('branch')); // Extract info from data-* attributes
        modal.find('#unit_manager').val(button.data('unit_manager')); // Extract info from data-* attributes
        modal.find('#admin_right').val(button.data('admin_right')); // Extract info from data-* attributes
        modal.find('#job_title').val(button.data('job_title')); // Extract info from data-* attributes
        modal.find('#job_description').val(button.data('job_description')); // Extract info from data-* attributes
    });

    $('#editStaffBtn').on('click', (e)=>{
        e.preventDefault();
        let user_id = $('#user_id').val();
        const url = `/staff/${user_id}/edit`;

        let d = new FormData();
        d.append('token', $('#token').val());

        d.append('firstname', $('#firstname').val());
        d.append('lastname', $('#lastname').val());
        d.append('email', $('#email').val());
        d.append('password', $('#password').val());
        d.append('phone', $('#phone').val());
        d.append('address', $('#address').val());
        d.append('branch', $('#branch').val());
        d.append('unit_manager', $('#unit_manager').val());
        d.append('admin_right', $('#admin_right').val());
        d.append('job_title', $('#job_title').val());
        d.append('job_description', $('#job_description').val());
        d.append('profile_pics', $("#profile_pics").prop("files")[0]);


        $.ajax({
            url: url,
            type: 'POST',
            processData: false,
            contentType: false,
            cache: false,
            data: d,
            beforeSend: function(){
                $('#editStaffBtn').html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
            },
            success: function (response) {
                let data = JSON.parse(response);
                console.log(JSON.parse(response));
                let message = data.success;
                msg.innerHTML = alertMessage('success', message);
                $('#editStaffBtn').html('Save');
                //interval(5000);
                window.location.reload()
            },
            error: function(request, error){
                let errors = JSON.parse(request.responseText);
                console.log(errors);
                let ul = '';
                $.each(errors, (key, value) => {
                    $.each(value, (index, item)=>{
                        console.log(item);
                        ul += `${item} <br>`;
                    });
                });

                msg.innerHTML = alertMessage('danger', ul);
                $('#editStaffBtn').html('Save');
                interval(5000);
            }
        });
    });

    // show the delete confirmation modal for staff
    $('#deleteStaffModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget); // Button that triggered the modal
        let user_id = button.data('user_id'); // Extract info from data-* attributes
        let form_action = `/staff/${user_id}/delete`;

        let modal = $(this);
        modal.find('#staffDeleteForm').attr("action", form_action);
    });

    $('#deleteStaffBtn').on('click', (e)=>{
        e.preventDefault();
        $("#staffDeleteForm").submit();
    });

    $("#request_type").on('change', () => {
        let request = $("#request_type").val();
        if(request === 'collection'){
            $("#delivery_address, #delivery_landmark").prop('readonly', true).val('').css('cursor', 'not-allowed');
            // $("").prop('readonly', true);
            $("#pick_up_address, #pick_up_landmark").prop('readonly', false).css('cursor', 'text');
            // $("").prop('readonly', false);
        }else if(request === 'delivery'){
            $("#pick_up_address, #pick_up_landmark").prop('readonly', true).val('').css('cursor', 'not-allowed');
            // $("").prop('readonly', true);
            $("#delivery_address, #delivery_landmark").prop('readonly', false).css('cursor', 'text');
            // $("").prop('disabled', false);
        }else if(request === 'combo' || request === 'swap'){
            $("#pick_up_address,#pick_up_landmark").prop('readonly', false).css('cursor', 'text');
            // $("").prop('disabled', false);
            $("#delivery_address, #delivery_landmark").prop('readonly', false).css('cursor', 'text');
            // $("").prop('disabled', false);
        }
    });

    $('#district').on('change', ()=>{
        // let district = $("#district" + " option:selected").val();
        let district = $("#district").val();
        const data = {
            district: district
        };
        $.ajax({
            url: `/routes/${district}`,
            type: 'GET',
            data: data,
            beforeSend: function(){
                $('#route').html('`<option value="">loading</option>`');
            },
            success: function (response) {
                $('#route').html(``);
                let routes = JSON.parse(response);
                console.log(JSON.parse(response));
                if(routes.length){
                    $.each(routes, (key, value)=>{
                        $("#route").append(`<option value="${value.route_id}">${value.name}</option>`);
                    })
                }else{
                    $("#route").append(`<option value="">No routes for district</option>`);
                }

            },
            error: function(request, error){
                let errors = JSON.parse(request.responseText);
                console.log(errors);
                let ul = '';
                $.each(errors, (key, value) => {
                    $.each(value, (index, item)=>{
                        console.log(item);
                        ul += `${item} <br>`;
                    });
                });

            }
        });

    });

    function alertMessage(status, message){
        return `<div class="alert alert-${status} m-t-20 alert-dismissible fade show" role="alert">
                    ${message}
                </div>`;
    }

    function interval(duration){
        setTimeout(()=>{
            $(".alert").alert('close');
        }, duration);
    }

});