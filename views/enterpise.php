<?php require_one VIEW_PATH . 'navbar.php' ?>

<?php var_dump ($this->enterpriseList[0]) ?>
<div class="container d-flex justify-content-center">
	<div class ="row">
		
		<div class="col-12 d-flex flex-column justify-content-center">
			<div class="row my-5">
				<div class="col-8">
					
					<form action="search.php" method="post">
						
						<input type="text" name="name" id="searchEnterprise" class="form-control" oninput="search(this.value)">
					</form>
				</div>
				<div class="col-4">
					
					<?php if($student->getRol() == 'ROLE_ADMIN') { ?>
						<a class="btn btn-success" href="<?php echo FRONT_ROOT ?>enterprise/showAddEnterprise">Agregar</a>
					<?php } ?>

				</div>

			</div>

			<table class="table">
				<thead>
					
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Nombre</th>
					</tr>

				</thead>
				<tbody>
					<?php foreach($this->enterpriseList as $empresa){ ?>
						<tr>
							<td><?php echo $empresa->getId();?></td>
							<td><?php echo $empresa->getFirstName();?></td>
						</tr>
					<?php } ?>

				</tbody>

			</table>


		</div>



	</div>