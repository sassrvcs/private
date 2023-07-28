<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.32/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        $('.toolTip').tooltip('toggle');
    });

    $(function() {
        $('.custom-control-input').change(function() {

            const status = $(this).prop('checked') == true ? 1 : 0;

            Swal.fire({
                title: 'Are you sure?',
                text: "This will change status of the agent.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!',
                width: '400px',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {

                    var user_id = $(this).data('id');
                    const route = $(this).attr('data-route');
                    const user = $(this).attr('data-user');

                    axios.put(route, {
                        'status': status,
                        'user_id': user_id,
                        'action': 'activate/deactivate'
                    })
                    .then(res => {
                        console.log(res);
                        if (res.data === 1) {
                            $("#" + user_id + "").children('span').removeClass(
                                "bg-danger");
                            $("#" + user_id + "").children('span').addClass(
                                "bg-success");
                            $("#" + user_id + "").children('span').html("Active");
                            toastr.success(user + 'Activated Successfully!');
                        } else if (res.body == 404) {
                            $("#" + user_id + "").children('span').removeClass(
                                "bg-success");
                            $("#" + user_id + "").children('span').addClass(
                            "bg-danger");
                            $("#" + user_id + "").children('span').html("Inactive");
                            toastr.warning(user + 'Not Found!');
                        } else if (res.body == 400) {
                            $("#" + user_id + "").children('span').removeClass(
                                "bg-success");
                            $("#" + user_id + "").children('span').addClass(
                            "bg-danger");
                            $("#" + user_id + "").children('span').html("Inactive");
                            toastr.warning(user + 'Nomination Pending!');
                        } else if (res.data == 0) {
                            $("#" + user_id + "").children('span').removeClass(
                                "bg-success");
                            $("#" + user_id + "").children('span').addClass(
                            "bg-danger");
                            $("#" + user_id + "").children('span').html("Inactive");
                            toastr.warning(user + 'Deactivated SuccessFully!');
                        }
                    })
                    .catch(err => {
                        toastr.error('Something went wrong!', 'Oops!');
                        console.error(err);
                    });

                } else if (result.isDismissed) {
                    if (status == 1) {
                        $(this).prop('checked', false);
                    } else {
                        $(this).prop('checked', true);
                    }
                }
            });
        });
    });

    // Delete agent with dynamic
    $(function() {
        $('.delete-user').click(function() {

            // alert('dfjsf');

            Swal.fire({
                title: 'Are you sure?',
                text: "This will delete the package.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!',
                width: '400px',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {

                    var user_id = $(this).data('id');
                    const route = $(this).attr('data-route');
                    const user = $(this).attr('data-user');

                    axios.delete(route, {
                        'status': status,
                        'user_id': user_id,
                        'action': 'activate/deactivate'
                    })
                    .then(res => {
                        console.log(res);
                        if (res.data === 1) {
                            $("#" + user_id + "").children('span').removeClass(
                                "bg-danger");
                            $("#" + user_id + "").children('span').addClass(
                                "bg-success");
                            $("#" + user_id + "").children('span').html("Active");
                            toastr.success(user + 'Deleted Successfully!');

                            // Reload after 450ms and load new view
                            setTimeout(function(){
                                window.location.reload();
                            }, 450);
                        } else if (res.body == 404) {
                            $("#" + user_id + "").children('span').removeClass(
                                "bg-success");
                            $("#" + user_id + "").children('span').addClass(
                            "bg-danger");
                            $("#" + user_id + "").children('span').html("Inactive");
                            toastr.warning(user + 'Not Found!');
                        } else if (res.body == 400) {
                            $("#" + user_id + "").children('span').removeClass(
                                "bg-success");
                            $("#" + user_id + "").children('span').addClass(
                            "bg-danger");
                            $("#" + user_id + "").children('span').html("Inactive");
                            toastr.warning(user + 'Nomination Pending!');
                        }
                    })
                    .catch(err => {
                        toastr.error('Something went wrong!', 'Oops!');
                        console.error(err);
                    });

                } else if (result.isDismissed) {
                    if (status == 1) {
                        $(this).prop('checked', false);
                    } else {
                        $(this).prop('checked', true);
                    }
                }
            });
        });
    });

    /**@abstract
     * deletion of category
     * Wait...
     */
    $(function() {
        $('.delete-category').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "This will delete the category.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Do it!',
                width: '400px',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {

                    var user_id = $(this).data('id');
                    const route = $(this).attr('data-route');
                    const user = $(this).attr('data-user');

                    axios.delete(route, {
                        'status': status,
                        'user_id': user_id,
                        'action': 'delete'
                    })
                    .then(res => {
                        console.log(res);
                        if (res.data === 1) {
                            $("#" + user_id + "").children('span').removeClass(
                                "bg-danger");
                            $("#" + user_id + "").children('span').addClass(
                                "bg-success");
                            $("#" + user_id + "").children('span').html("Active");
                            toastr.success(user + 'Deleted Successfully!');

                            // Reload after 450ms and load new view
                            setTimeout(function(){
                                window.location.reload();
                            }, 450);
                        } else if (res.body == 404) {
                            $("#" + user_id + "").children('span').removeClass(
                                "bg-success");
                            $("#" + user_id + "").children('span').addClass(
                            "bg-danger");
                            $("#" + user_id + "").children('span').html("Inactive");
                            toastr.warning(user + 'Not Found!');
                        } else if (res.body == 400) {
                            $("#" + user_id + "").children('span').removeClass(
                                "bg-success");
                            $("#" + user_id + "").children('span').addClass(
                            "bg-danger");
                            $("#" + user_id + "").children('span').html("Inactive");
                            toastr.warning(user + 'Nomination Pending!');
                        }
                    })
                    .catch(err => {
                        toastr.error('Something went wrong!', 'Oops!');
                        console.error(err);
                    });

                } else if (result.isDismissed) {
                    if (status == 1) {
                        $(this).prop('checked', false);
                    } else {
                        $(this).prop('checked', true);
                    }
                }
            });
        });
    });
</script>
