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
                        <h1><?php echo lang('edit_user_heading'); ?></h1>
                        <div id="infoMessage"><?php echo $message; ?></div>
                  </div>
                  <div class="card-body">

                        <div id="infoMessage"><?php echo $message; ?></div>

                        <?php echo form_open(uri_string()); ?>

                        <div class="row">
                              <div class="col-sm-4">
                                    <div class="form-group">
                                          <?php echo lang('edit_user_fname_label', 'first_name'); ?> <br />
                                          <?php echo form_input($first_name, '', 'class="form-control" id="first_name"'); ?>
                                    </div>
                              </div>
                              <div class="col-sm-4">
                                    <div class="form-group">
                                          <?php echo lang('edit_user_lname_label', 'last_name'); ?> <br />
                                          <?php echo form_input($last_name, '', 'class="form-control" id="last_name"'); ?>
                                    </div>
                              </div>
                              <div class="col-sm-4">
                                    <div class="form-group">
                                          <?php echo lang('edit_user_company_label', 'company'); ?> <br />
                                          <?php echo form_input($company, '', 'class="form-control" id="company"'); ?>
                                    </div>
                              </div>
                              <div class="col-sm-4">
                                    <div class="form-group">
                                          <?php echo lang('edit_user_phone_label', 'phone'); ?> <br />
                                          <?php echo form_input($phone, '', 'class="form-control" id="phone"'); ?>
                                    </div>
                              </div>
                              <div class="col-sm-4">
                                    <div class="form-group">
                                          <?php echo lang('edit_user_password_label', 'password'); ?> <br />
                                          <?php echo form_input($password, '', 'class="form-control" id="password"'); ?>
                                    </div>
                              </div>
                              <div class="col-sm-4">
                                    <div class="form-group">
                                          <?php echo lang('edit_user_password_confirm_label', 'password_confirm'); ?><br />
                                          <?php echo form_input($password_confirm, '', 'class="form-control" id="password_confirm"'); ?>
                                    </div>
                              </div>
                              <div class="col-sm-4">
                                    <?php if ($this->ion_auth->is_admin()) : ?>
                                          <h3><?php echo lang('edit_user_groups_heading'); ?></h3>
                                          <?php foreach ($groups as $group) : ?>
                                                <label class="checkbox">
                                                      <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
                                                      <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                                </label>
                                          <?php endforeach ?>
                                    <?php endif ?>
                              </div>
                        </div>
                        <?php echo form_hidden('id', $user->id); ?>
                        <?php echo form_hidden($csrf); ?>
                        <div class="row mt-4">
                              <p><?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary"'); ?></p>
                        </div>
                        <?php echo form_close(); ?>

                  </div>
            </div>

      </section>
</div>