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
				<h1><?php echo lang('index_heading'); ?></h1>
				<div id="infoMessage"><?php echo $message; ?></div>
				<a class="btn btn-primary text-white" href="<?= base_url() ?>auth/create_user">Buat User Baru</a>
			</div>
			<div class="card-body">
				<table class='table table-striped' id="table1">
					<thead>
						<tr>
							<th>Nama Depan</th>
							<th>Nama Belakang</th>
							<th>Email</th>
							<th>Group</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($users as $user) : ?>
							<tr>
								<td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
								<td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
								<td>
									<?php foreach ($user->groups as $group) : ?>
										<?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?><br />
									<?php endforeach ?>
								</td>
								<td>
									<?php if ($user->active) : ?>
										<span class="badge bg-success"><?php echo anchor("auth/deactivate/" . $user->id, lang('index_active_link')); ?></span>
									<?php else : ?>
										<span class="badge bg-danger"><?php echo anchor("auth/activate/" . $user->id, lang('index_inactive_link')); ?></span>
									<?php endif; ?>
								</td>
								<td>
									<button class="btn btn-primary btn-sm"><?php echo anchor("auth/edit_user/" . $user->id, 'Edit'); ?></button>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

	</section>
</div>