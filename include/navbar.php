        <nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="http://lhconsultoriatecnologia.com.br">
					<img src="./img/lhcons.png" alt="" srcset="" width="215" height="">
        		</a>

				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a data-bs-target="#tikets" data-bs-toggle="collapse" class="sidebar-link collapsed">
              				<i class="align-middle" data-feather="menu"></i> <span class="align-middle">EmrsDesk</span>
            			</a>
						<ul id="tikets" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
							<li class="sidebar-item <?php selecionadoMenu('tikets'); ?>"><a  class="sidebar-link" href="<?php echo INCLUDE_PATH ?>tikets" >Ticket</a></li>
							<li <?php verificaPermissaoMenu(1) ?> class="sidebar-item <?php selecionadoMenu('gerenciar-tikets'); ?>"><a class="sidebar-link" href="<?php echo INCLUDE_PATH ?>gerenciar-tikets">Tikets tecnico</a></li>
						</ul>
					</li>
				</ul>

				<ul <?php verificaPermissaoMenu(1) ?> class="sidebar-nav">
					<li class="sidebar-item">
						<a data-bs-target="#user" data-bs-toggle="collapse" class="sidebar-link collapsed">
              				<i class="align-middle" data-feather="settings"></i> <span class="align-middle">Sistema</span>
            			</a>
						<ul  id="user" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
							<li <?php verificaPermissaoMenu(2) ?> class="sidebar-item <?php selecionadoMenu('ativos'); ?>"><a class="sidebar-link" href="<?php echo INCLUDE_PATH ?>ativos">Ativos</a></li>
							<li <?php verificaPermissaoMenu(2) ?> class="sidebar-item <?php selecionadoMenu('gerenciar-usuarios'); ?>"><a class="sidebar-link" href="<?php echo INCLUDE_PATH ?>gerenciar-usuarios">usuarios</a></li>
							<li <?php verificaPermissaoMenu(1) ?> class="sidebar-item <?php selecionadoMenu('relatorios'); ?>"><a class="sidebar-link" href="<?php echo INCLUDE_PATH ?>relatorios">Relatorios</a></li>
						</ul>
					</li>
				</ul>

				
			</div>
		</nav>