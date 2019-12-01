	<form id="selectQtype" name="selectQtype" action="http://54.198.147.202/quizManagement/create/createTextMCQuestion.php" method="get">
            <select name="question_type" id="question_type" onChange="chgAction()">
              <option value="textMC">Multiple Choice (text)</option>
              <option value="textSATA">Select All (text)</option>
	      <option value = "textFR">Free Response (text)</option>
            <input type='submit' value='Add Question'>
            </select>
        </form>

<script>

function chgAction(){
  var form = document.getElementById('selectQtype');

  console.log('chgAction()');
  console.log(form.question_type.selectedIndex);

  switch (form.question_type.selectedIndex) {
    case 0:
       form.setAttribute('action',"http://54.198.147.202/quizManagement/create/createTextSATAQuestion.php");
    case 1:
      form.setAttribute('action',"http://54.198.147.202/quizManagement/create/createTextSATAQuestion.php");
      break;
    case 2:
      form.setAttribute('action',"http://54.198.147.202/quizManagement/create/createTextFRQuestion.php");
      break;
  }
}
</script>

