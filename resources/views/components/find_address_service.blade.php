<div class="modal" id="exampleModalCenterAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Choose your address</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div id="post_address_blk">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function find_address($val) {
        $("#address_lookup_mode").val($val);

        if ($val == 'own') {
            var error = false;
            var post_code = $("#uk_postal_code").val();

            if (post_code != "") {
                $("#postal_code").val(post_code);
                error = false;

            } else {
                alert('Please enter post code');
                error = true;
            }
            if (error == false) {
                $('#own_find_address_btn').html('Please Wait...');
                $.ajax({
                    url: "{!! route('find-address') !!}",
                    type: 'GET',
                    data: {
                        post_code: post_code
                    },
                    success: function(result) {
                        $('#own_find_address_btn').html('Find Address');
                        $("#exampleModalCenterAddress").show();
                        $("#post_address_blk").html(result);
                    },
                    error: function(result) {
                        $('#own_find_address_btn').html('Find Address');
                        alert('Unable to get details from this pincode')
                    }
                });
            }
        } else {
            var invoice_error = false;
            var post_code = $("#invoice_uk_postal_code").val();

            if (post_code != "") {
                $("#invoice_postal_code").val(post_code);
                invoice_error = false;

            } else {
                alert('Please enter post code');
                invoice_error = true;
            }
            if (invoice_error == false) {
                $('#invoice_find_address_btn').html('Please Wait...');
                $.ajax({
                    url: "{!! route('find-address') !!}",
                    type: 'GET',
                    data: {
                        post_code: post_code
                    },
                    success: function(result) {
                        $('#invoice_find_address_btn').html('Find Address');
                        $("#exampleModalCenterAddress").show();
                        $("#post_address_blk").html(result);
                    },
                    error: function(result) {
                        $('#invoice_find_address_btn').html('Find Address');
                        alert('Unable to get details from this pincode')
                    }
                });
            }
        }


    }

    function selectPostalAddrApp(val) {
        var value = val.split(',');
        if ($("#address_lookup_mode").val() == "own") {
            $("#house_no").val(value[0]);
            $("#street").val(value[1]);
            $("#town").val(value[2]);
            $("#county").val(value[3]);
            $("#exampleModalCenterAddress").hide();
        } else {
            $("#invoice_house_no").val(value[0]);
            $("#invoice_street").val(value[1]);
            $("#invoice_town").val(value[2]);
            $("#invoice_county").val(value[3]);
            $("#exampleModalCenterAddress").hide();
        }
    }

    $(".btn-close").click(function() {
        $("#exampleModalCenterAddress").hide();
    })
</script>
