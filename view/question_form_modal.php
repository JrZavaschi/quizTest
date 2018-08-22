<div class="modal fade" id="questionFormModal" tabindex="-1" role="dialog" aria-labelledby="questionFormModalTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form action="" method="post" id="quiz_question_form" class="form-horizontal" role="form" novalidate>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Include Question</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			
			</div>
			<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-3">
								<label for="type_question">Type <font color="red">*</font></label>
								<select name="type_question" id="type_question" class="form-control" required>
									<option value=""></option>
									<option value="Unique">Unique</option>
									<option value="Multiple">Multiple</option>
								</select>
							</div>
							<div class="col-sm-7">
								<label for="name_question">Name <font color="red">*</font></label>
								<input type="text" name="name_question" id="name_question" class="form-control" required>
							</div>
							<div class="col-sm-2">
								<label for="name_question">QUIZ</label>
								<input type="text" name="quiz_question_visible" id="quiz_question_visible" class="form-control" disabled>
								<input type="text" name="quiz_question" id="quiz_question" class="form-control" hidden="true">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<h4>Answers</h4>
							</div>
							<div class="col-sm-10">
								<label for="name_answer">Name <font color="red">*</font></label>
								<input type="text" name="name_answer[]" class="form-control" required>
							</div>
							<div class="col-sm-1">
								<label for="is_correct_answer">Is Correct</label>
								<input type="checkbox" name="is_correct_answer[]"  class="form-control is_correct_answer" value="S" disabled>
							</div>
							<div class="col-sm-1">
								<label for="is_correct_answer">Add Answer</label>
								<button type="button" class="btn btn-default quiz_add_answer" disabled><i class="fa fa-plus"></button></i>
							</div>
						</div>
						<div id="question_include_answer" class="row"></div>
						
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success" name="quiz_question_save" id="quiz_question_save">Save</button>
			</div>
			</form>
		</div>
	</div>
</div>