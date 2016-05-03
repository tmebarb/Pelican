<style>
    label {
        width: 100%;
    }
</style>
<script>
    $.validator.setDefaults({
        errorClass: 'invalid',
        validClass: "valid",
        errorPlacement: function (error, element) {
            $(element)
                .closest("form")
                .find("label[for='" + element.attr("id") + "']")
                .attr('data-error', error.text());
        }
    });
    $().ready(function () {
        $("#form").validate({
            rules: {
                password: {
                    required: true,

                } ,

                repassword: {
                    equalTo: "#password6",
                }
            },
            messages:{
                password: {
                    required:"the password is required"
                },
            }

        });
    });
</script>

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Add an Advisor</h5>
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a>
                    </li>
                    <li><a href="<?php echo base_url() ?>staff_member/ListAdvisors">Advisors</a>
                    </li>
                    <li class="active">Add an Advisor</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs end-->
<!--start container-->
<div class="container">
    <div class="section">
        <!-- START CONTENT -->


        <!--Form Advance-->
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card-panel">
                    <h4 class="header2">Advisor Details</h4>

                    <?php echo validation_errors(); ?>
                    <?php echo $this->session->flashdata('success_msg') ?>
                    <?php echo $this->session->flashdata('error_msg') ?>

                    <div class="row">
                        <?php $attributes = array('id' => 'form');?>
                        <?php echo form_open('Staff_member/addAdvisor', $attributes); ?>
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="user_fullname" name="user_fullname" type="text" required=""
                                       aria-required="true">
                                <label for="user_fullname" data-error="wrong" data-success="right">Full Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="user_name" name="user_name" type="text" required="" aria-required="true">
                                <label for="user_name" data-error="wrong" data-success="right">User Name</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <input id="CWID" name="CWID" type="text" required="" aria-required="true">
                                <label for="CWID" data-error="wrong" data-success="right">CWID</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="email5" name="email5" type="email" required="" aria-required="true">
                                <label for="email" data-error="wrong" data-success="right">Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <input id="phone" name="phone" type="text" required="" aria-required="true">
                                <label for="phone" data-error="wrong" data-success="right">Phone Number</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="office" name="office" type="text" required="" aria-required="true">
                                <label for="phone" data-error="wrong" data-success="right">Office Location</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <input id="password6" type="password" name="password" required="" aria-required="true">
                                <label for="password" data-error="wrong" data-success="right">Password</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="repassword6" type="password" name="repassword" required=""
                                       aria-required="true">
                                <label for="repassword6" data-error="wrong" data-success="right">Confirm
                                    Password</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s6">
                                <select name="major" required="" aria-required="true">
                                    <option value="" disabled selected>Choose Advisor's Major</option>
                                    <option value="CSCI">Computer Science</option>
                                    <option value="BUSN">Business</option>
                                    <option value="CINS">Computer Information Systems</option>
                                </select>
                                <label data-error="wrong" data-success="right">Major</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn cyan waves-effect waves-light right" type="submit" name="action"
                                            style="z-index: 0">Save
                                        <i class="mdi-content-send right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- END CONTENT -->