	
			<!-- Delete Leave Modal -->
			<div class="modal custom-modal fade" id="delete_approve" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Eliminar Participante</h3>
								<p>Esta seguro de eliminar el participante?</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-6">
                                       
									<a  v-on:click="Confirdelet()" type="submit" class="btn btn-primary continue-btn" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
										 
									</div>
									<div class="col-6">
										<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>