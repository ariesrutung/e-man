<div class="main-content container-fluid">
      <div class="page-title">
            <div class="row">
                  <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Users</h3>
                        <p class="text-subtitle text-muted">We use 'simple-datatables' made by @fiduswriter. You can check the full documentation <a href="https://github.com/fiduswriter/Simple-DataTables/wiki">here</a>.</p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class='breadcrumb-header'>
                              <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                              </ol>
                        </nav>
                  </div>
            </div>
      </div>
      <section class="section">
            <div class="card">
                  <div class="card-header">
                        <h1><?php echo lang('create_user_heading'); ?></h1>
                        <div id="infoMessage"><?php echo $message; ?></div>
                  </div>
                  <div class="card-body">
                        <div id="infoMessage" class="col-md-12"><?php echo $message; ?></div>

                        <?php echo form_open("auth/create_user"); ?>

                        <div class="row">
                              <div class="col-md-4">
                                    <?php echo lang('create_user_fname_label', 'first_name'); ?> <br />
                                    <div class="form-group">
                                          <?php echo form_input($first_name, '', 'class="form-control" id="first_name" placeholder="Enter first name"'); ?>
                                    </div>
                              </div>

                              <div class="col-md-4">
                                    <?php echo lang('create_user_lname_label', 'last_name'); ?> <br />
                                    <div class="form-group">
                                          <?php echo form_input($last_name, '', 'class="form-control" id="last_name" placeholder="Enter last name"'); ?>
                                    </div>
                              </div>

                              <!-- <div class="col-md-4">
                                    <?php
                                    if ($identity_column !== 'email') {
                                          ?>
                                          <?php echo lang('create_user_identity_label', 'identity'); ?> <br />
                                          <div class="form-group">
                                                <?php echo form_input($identity, '', 'class="form-control" id="identity" placeholder="Enter identity"'); ?>
                                          </div>
                                    <?php
                                    } ?>
                              </div> -->
                              <div class="col-md-4">
                                    <?php echo lang('create_user_identity_label', 'identity'); ?> <br />
                                    <div class="form-group">
                                          <?php echo form_input($identity, '', 'class="form-control" id="identity" placeholder="Enter identity"'); ?>
                                    </div>
                              </div>

                              <div class="col-md-4">
                                    <?php echo lang('create_user_company_label', 'company'); ?> <br />
                                    <div class="form-group">
                                          <?php echo form_input($company, '', 'class="form-control" id="company" placeholder="Enter company"'); ?>
                                    </div>
                              </div>

                              <div class="col-md-4">
                                    <?php echo lang('create_user_email_label', 'email'); ?> <br />
                                    <div class="form-group">
                                          <?php echo form_input($email, '', 'class="form-control" id="email" placeholder="Enter email"'); ?>
                                    </div>
                              </div>

                              <div class="col-md-4">
                                    <?php echo lang('create_user_phone_label', 'phone'); ?> <br />
                                    <div class="form-group">
                                          <?php echo form_input($phone, '', 'class="form-control" id="phone" placeholder="Enter phone"'); ?>
                                    </div>
                              </div>

                              <div class="col-md-4">
                                    <?php echo lang('create_user_password_label', 'password'); ?> <br />
                                    <div class="form-group">
                                          <?php echo form_input($password, '', 'class="form-control" id="password" placeholder="Enter password"'); ?>
                                    </div>
                              </div>

                              <div class="col-md-4">
                                    <?php echo lang('create_user_password_confirm_label', 'password_confirm'); ?> <br />
                                    <div class="form-group">
                                          <?php echo form_input($password_confirm, '', 'class="form-control" id="password_confirm" placeholder="Confirm password"'); ?>
                                    </div>
                              </div>

                              <div class="col-md-12">
                                    <p><?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-primary"'); ?></p>
                              </div>

                        </div>
                        <?php echo form_close(); ?>
                  </div>

            </div>
      </section>
</div>